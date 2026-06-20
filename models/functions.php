<?php
include("../database/connection.php");

// All Completed Functions 
// - getCount($conn, $table)                               // for admin dashboard count
// - getAll($conn, $table)                                 // to get all data from a table except user(admin,advisor,student) and student_subject as these require JOIN
// - getUserById($conn, $table, $idColumn, $user_id)       // for user profile 
// - updateUserField($conn, $userId, $field, $value)       // to update a single user profile detail (phone,address,email)
// - deleteUser($conn, $table, $user_id)                   // to delete a user(admin,advisor,student)
// - searchUserByName($conn, $table, $keyword)             // to search user (admin, advisor, student)
// - getAllUser($conn, $table)                             // to get all personal detail for all user
// - getStudentSubjects($conn, $userId)                    // get all subject for a student for all sem
// - getStudentSubjectsBySemester($conn, $userId, $semId)  // get all subject for a student for a specific sem
// - calculateGPA($subjects)                               // to calculate the gpa for a sem or cgpa for all sem, pass $subjects based on type of getStudentSubject called
// - getAllAlerts($conn)                    //
// - searchAlertByName($conn, $keyword)                    //


// Incomplete Functions
// - all edit
// - all add
// - subject related stuff (probably add in student add btn on admin->student.php page) (manage student subject)
// - alert related trigger logic (main muet, secondary gpa,cgpa)
// - phpmailer (otp, pseudo auto alert(send mail every 1pm monday) orrr manual alert(add a "send alert to student" btn for advisor)) (manual easier to demo)
// - hash password on add new user(add advisor,admin,student) as now plaintext
// - login to hash entered password to compare hashed db password
// - logout to clear session (code already at top of dashboard_admin)


function getCount($conn, $table)  // for admin dashboard count
{
    $result = $conn->query("SELECT COUNT(*) AS total FROM $table");
    $row = $result->fetch_assoc();

    return $row['total'];
}

function getAll($conn, $table)  // to get all data from a table except user(admin,advisor,student) as user require JOIN
{
    $result = $conn->query("SELECT * FROM $table");
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function getUserById($conn, $table, $idColumn, $user_id) // for user profile 
{
    $result = $conn->query("
    SELECT $table.*, user.*
    FROM $table
    INNER JOIN user ON $table.user_id = user.user_id
    WHERE $idColumn = '$user_id' LIMIT 1");
    return $result->fetch_assoc();
}

function updateUserField($conn, $userId, $field, $value) // to update a single user profile detail (phone,address,email)
{
    $sql = "
        UPDATE user
        SET $field = '$value'
        WHERE user_id = '$userId'
    ";

    return $conn->query($sql);
}

function deleteUser($conn, $table, $user_id) // to delete a user(admin,advisor,student)
{
    $childDeleted = $conn->query("
        DELETE FROM $table
        WHERE user_id = '$user_id'
    ");

    $userDeleted = $conn->query("
        DELETE FROM user
        WHERE user_id = '$user_id'
    ");

    return $childDeleted && $userDeleted;
}

function searchUserByName($conn, $table, $keyword) // to search user (admin, advisor, student)
{
    $sql = "
        SELECT $table.*, user.*
        FROM $table
        INNER JOIN user ON $table.user_id = user.user_id
        WHERE name LIKE '%$keyword%'
    ";
    $result = $conn->query($sql);
    $data = [];

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

function getAllUser($conn, $table) // to get all personal detail for all user
{
    $sql = " 
        SELECT $table.*, user.*
        FROM $table
        INNER JOIN user ON $table.user_id = user.user_id
    ";
    $result = $conn->query($sql);
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function getStudentSubjects($conn, $userId) // get all subject for a student for all sem
{
    $sql = "
        SELECT student_subject.*, subject.*, semester.*
        FROM student_subject
        INNER JOIN subject ON student_subject.subject_id = subject.subject_id
        INNER JOIN semester ON student_subject.sem_id = semester.sem_id
        WHERE student_subject.user_id = '$userId'
    ";

    $result = $conn->query($sql);
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function getStudentSubjectsBySemester($conn, $userId, $semId) // get all subject for a student for a specific sem
{
    $sql = "
        SELECT student_subject.*, subject.*, semester.*
        FROM student_subject
        INNER JOIN subject ON student_subject.subject_id = subject.subject_id
        INNER JOIN semester ON student_subject.sem_id = semester.sem_id
        WHERE student_subject.user_id = '$userId'
        AND student_subject.sem_id = '$semId'
    ";

    $result = $conn->query($sql);
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function calculateGPA($subjects)  // to calculate the gpa for a sem or cgpa for all sem, pass $subjects based on type of getStudentSubject called
{
    $totalPoints = 0;
    $totalCredits = 0;
    foreach ($subjects as $subject) {
        $point = gradeToPoint($subject['grade']);
        if ($point === null) {
            continue;
        }
        $credits = $subject['credit_hours'];
        $totalPoints += $point * $credits;
        $totalCredits += $credits;
    }
    if ($totalCredits == 0) {
        return 0;
    }
    return round($totalPoints / $totalCredits, 2);
}

function getAllAlerts($conn) // get all alerts with student name
{
    $sql = "
        SELECT alert.*, user.name
        FROM alert
        INNER JOIN user ON alert.user_id = user.user_id
    ";

    $result = $conn->query($sql);
    $data = [];

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

function getStudentByLoginId($conn, $login_id) // get student full profile by session login_id
{
    $result = $conn->query("
        SELECT student.*, user.*
        FROM student
        INNER JOIN user ON student.user_id = user.user_id
        WHERE user.login_id = '$login_id'
        LIMIT 1
    ");
    return $result ? $result->fetch_assoc() : null;
}

function getAdvisorByLoginId($conn, $login_id)
{
    $result = $conn->query("
        SELECT advisor.*, user.*
        FROM advisor
        INNER JOIN user ON advisor.user_id = user.user_id
        WHERE user.login_id = '$login_id'
        LIMIT 1
    ");

    return $result ? $result->fetch_assoc() : null;
}


function getAllSemesters($conn) // get all semesters for dropdown
{
    $result = $conn->query("SELECT * FROM semester ORDER BY semester_id ASC");
    $data = [];
 
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function searchAlertByName($conn, $keyword) // search alerts by student name
{
    $sql = "
        SELECT alert.*, user.name
        FROM alert
        INNER JOIN user ON alert.user_id = user.user_id
        WHERE user.name LIKE '%$keyword%'
    ";

    $result = $conn->query($sql);
    $data = [];
 
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

function getAdvisorAlerts($conn, $advisorId)
{
    $sql = "
        SELECT
            alert.*,
            user.name AS name
        FROM alert
        INNER JOIN student ON alert.user_id = student.user_id
        INNER JOIN user ON student.user_id = user.user_id
        WHERE student.advisor_id = '$advisorId'
        ORDER BY alert.date_sent DESC
    ";

    $result = $conn->query($sql);
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}


function getAdvisorStudents($conn, $advisorId)
{
    $sql = "
        SELECT
            student.*,
            user.name,
            user.login_id,
            user.email
        FROM student
        INNER JOIN user ON student.user_id = user.user_id
        WHERE student.advisor_id = '$advisorId'
        ORDER BY user.name
    ";

    $result = $conn->query($sql);
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function searchAdvisorStudents($conn, $advisorId, $keyword)
{
    $sql = "
        SELECT student.*, user.*
        FROM student
        INNER JOIN user ON student.user_id = user.user_id
        WHERE student.advisor_id = '$advisorId'
        AND user.name LIKE '%$keyword%'
    ";

    $result = $conn->query($sql);
    $data = [];

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

function gradeToPoint($grade)
{
    $gradePoints = [
        'A'  => 4.0,
        'A-' => 3.7,
        'B+' => 3.3,
        'B'  => 3.0,
        'B-' => 2.7,
        'C+' => 2.3,
        'C'  => 2.0,
        'C-' => 1.7,
        'D+' => 1.3,
        'D'  => 1.0,
        'E'  => 0.0
    ];
    $grade = strtoupper(trim($grade));
    return $gradePoints[$grade] ?? null;
}

function updateUserProfile($conn, $userId, $phone, $email, $address)
{
    $sql = "
        UPDATE user
        SET phone = '$phone',
            email = '$email',
            address = '$address'
        WHERE user_id = '$userId'
    ";

    return $conn->query($sql);
}