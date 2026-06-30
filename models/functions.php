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
// - getAllAlerts($conn)                                   //add user
// - searchAlertByName($conn, $keyword)                    //edit user
// - filterAdvisorStudents


// Incomplete Functions
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
    if ($table === 'student') {
    $conn->query("DELETE FROM student_subject WHERE user_id = '$user_id'");
    }

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

function filterAdvisorStudents($conn, $advisorId, $keyword, $muet, $cgpa, $plan_degree, $degree_field)
{
    $sql = "
        SELECT student.*, user.*
        FROM student
        INNER JOIN user ON student.user_id = user.user_id
        WHERE student.advisor_id = '$advisorId'
    ";

    if (!empty($keyword)) {
        $sql .= " AND user.name LIKE '%$keyword%'";
    }

    if (!empty($muet)) {
        $sql .= " AND student.muet_status = '$muet'";
    }

    if (!empty($plan_degree)) {
        $sql .= " AND student.plan_to_degree = '$plan_degree'";
    }

if (!empty($degree_field)) {
    if ($degree_field === 'N/A') {
        $sql .= " AND (student.preferred_degree_field IS NULL OR student.preferred_degree_field = '')";
    } else {
        $sql .= " AND student.preferred_degree_field = '$degree_field'";
    }
}

    if ($cgpa == 'excellent') {
        $sql .= " AND student.CGPA >= 3.50";
    } elseif ($cgpa == 'average') {
        $sql .= " AND student.CGPA >= 2.00 AND student.CGPA < 3.50";
    } elseif ($cgpa == 'risk') {
        $sql .= " AND student.CGPA < 2.00";
    }

    $sql .= " ORDER BY user.name";

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
        INNER JOIN semester ON student_subject.semester_id = semester.semester_id
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
        INNER JOIN semester ON student_subject.semester_id = semester.semester_id
        WHERE student_subject.user_id = '$userId'
        AND student_subject.semester_id = '$semId'
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

function getAdvisorByStudentId($conn, $advisor_id) // get advisor details from student's advisor_id
{
    $result = $conn->query("
        SELECT advisor.*, user.name, user.email, user.phone_number
        FROM advisor
        INNER JOIN user ON advisor.user_id = user.user_id
        WHERE advisor.user_id = '$advisor_id'
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
        SET phone_number = '$phone',
            email = '$email',
            address = '$address'
        WHERE user_id = '$userId'
    ";

    return $conn->query($sql);
}


function getRecentAlerts($conn)
{
    $sql = "
        SELECT alert.*, user.name
        FROM alert
        INNER JOIN user ON alert.user_id = user.user_id
        ORDER BY alert_id DESC
        LIMIT 3
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

function searchsubject($conn, $table, $keyword) // to search subject using subject name or id (student)
{
    $sql = "
        SELECT $table.*, subject.*
        FROM $table
        INNER JOIN subject ON $table.subject_id = subject.subject_id
        WHERE subject.subject_name LIKE '%$keyword%'
        OR subject.subject_id LIKE '%$keyword%'
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

function addAdvisor($conn, $name, $email, $phone, $password, $department) {
    if (empty($name) || empty($email) || empty($phone) || empty($password) || empty($department)) {
        return ['success' => false, 'message' => 'Please fill in all fields.'];
    }

    $result = $conn->query("SELECT login_id FROM user INNER JOIN advisor ON user.user_id = advisor.user_id ORDER BY user.user_id DESC LIMIT 1");

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastId = $row['login_id'];
    } else {
        $lastId = 'M1113560';
    }

    $num = (int)substr($lastId, -1) + 1;
    $login_id = 'M111356' . $num;

    $stmt = $conn->prepare("INSERT INTO user (login_id, name, email, password, phone_number) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $login_id, $name, $email, $password, $phone);

    if ($stmt->execute()) {
        $new_user_id = $conn->insert_id;

        $stmt2 = $conn->prepare("INSERT INTO advisor (user_id, department) VALUES (?, ?)");
        $stmt2->bind_param('is', $new_user_id, $department);
        $stmt2->execute();
        $stmt2->close();
        $stmt->close();

        return ['success' => true, 'message' => 'Advisor added successfully! Login ID: ' . $login_id];
    } else {
        $stmt->close();
        return ['success' => false, 'message' => 'Error occured. Please redo the process'];
    }
}

function addAdmin($conn, $name, $email, $phone, $password) {
    if (empty($name) || empty($email) || empty($phone) || empty($password)) {
        return ['success' => false, 'message' => 'Please fill in all fields.'];
    }

    $result = $conn->query("SELECT login_id FROM user INNER JOIN admin ON user.user_id = admin.user_id ORDER BY user.user_id DESC LIMIT 1");

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastId = $row['login_id'];
    } else {
        $lastId = 'A03241010';
    }

    $num = (int)substr($lastId, -2) + 1;
    $login_id = 'A0324101' . str_pad($num, 1, '0', STR_PAD_LEFT);

    $stmt = $conn->prepare("INSERT INTO user (login_id, name, email, password, phone_number) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $login_id, $name, $email, $password, $phone);

    if ($stmt->execute()) {
        $new_user_id = $conn->insert_id;

        $stmt2 = $conn->prepare("INSERT INTO admin (user_id) VALUES (?)");
        $stmt2->bind_param('i', $new_user_id);
        $stmt2->execute();
        $stmt2->close();
        $stmt->close();

        return ['success' => true, 'message' => 'Admin added successfully! Login ID: ' . $login_id];
    } else {
        $stmt->close();
        return ['success' => false, 'message' => 'Error occured. Please redo the process'];
    }
}

function addStudent($conn, $name, $email, $phone, $password, $advisor_id) {

    if (empty($name) || empty($email) || empty($phone) || empty($password) || empty($advisor_id)) {
        return array('success' => false, 'message' => 'Please fill in all fields.');
    }

    $result = $conn->query("SELECT login_id FROM user INNER JOIN student ON user.user_id = student.user_id WHERE user.login_id LIKE 'D%' ORDER BY CAST(SUBSTRING(user.login_id, 2) AS UNSIGNED) DESC LIMIT 1");

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastId = $row['login_id'];
    } else {
        $lastId = 'D32155319';
    }

    $num = (int)substr($lastId, 1) + 1;
    $login_id = 'D' . $num;

    $stmt = $conn->prepare("INSERT INTO user (login_id, name, email, password, phone_number) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $login_id, $name, $email, $password, $phone);

    if ($stmt->execute()) {
        $new_user_id = $conn->insert_id;
        $program_id = 1;

        $preferred_degree_field = 'None';
        $stmt2 = $conn->prepare("INSERT INTO student (user_id, program_id, advisor_id, CGPA, muet_status, total_credit_taken, plan_to_degree, preferred_degree_field) VALUES (?, ?, ?, 0.00, 'Not Taken', 0, 'No', ?)");
        $stmt2->bind_param('iiis', $new_user_id, $program_id, $advisor_id, $preferred_degree_field);
        $stmt2->execute();
        $stmt2->close();
        $stmt->close();

        return array('success' => true, 'message' => 'Student added successfully! Login ID: ' . $login_id);
    } else {
        $stmt->close();
        return array('success' => false, 'message' => 'Error occured. Please redo the process');
    }
}

function editAdmin($conn, $user_id, $field, $value) {
    $allowed_fields = ['name', 'email', 'phone_number', 'login_id'];
    if (!in_array($field, $allowed_fields) || $value === '') {
        return ['success' => false, 'message' => 'Invalid input.'];
    }
    $result = updateUserField($conn, $user_id, $field, $value);
    if ($result) {
        return ['success' => true, 'message' => 'Updated successfully!'];
    } else {
        return ['success' => false, 'message' => 'Something went wrong, please try again.'];
    }
}

function editAdvisor($conn, $user_id, $field, $value) {
    $allowed_fields = ['name', 'email', 'phone_number', 'login_id', 'department'];
    if (!in_array($field, $allowed_fields) || $value == '') {
        return ['success' => false, 'message' => 'Invalid input.'];
    }
    if ($field == 'department') {
        $stmt = $conn->prepare("UPDATE advisor SET department = ? WHERE user_id = ?");
        $stmt->bind_param('si', $value, $user_id);
        $stmt->execute();
        $stmt->close();
    } else {
        updateUserField($conn, $user_id, $field, $value);
    }
    return ['success' => true, 'message' => 'Updated successfully!'];
}

function editStudent($conn, $user_id, $field, $value) {
    $allowed_fields = ['name', 'email', 'phone_number', 'login_id'];
    if (in_array($field, $allowed_fields) || $value == '') {
        return ['success' => false, 'message' => 'Invalid input.'];
    }
}