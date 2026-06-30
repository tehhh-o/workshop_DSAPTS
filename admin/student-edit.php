<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Student - UTeM</title>
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/admin.css">
</head>

<body class="page-body main-gradient-bg">
    <?php
    $activePage = 'student';
    include("components/sidebar-admin.php");
    include("../models/functions.php");

    session_start();
    $studentId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    if (!$studentId) {
        header("Location: student.php");
        exit();
    }

    $student = getUserById($conn, "student", "student.user_id", $studentId);
    if (!$student) {
        header("Location: student.php");
        exit();
    }

    $success = "";
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $action = $_POST['action'] ?? 'edit_field';

        if ($action === 'edit_field') {
            $result = editAdmin(
                $conn,
                $studentId,
                $_POST['field'],
                trim($_POST['value'])
            );
            if ($result['success']) {
                $success = $result['message'];
                $student = getUserById($conn, "student", "student.user_id", $studentId);
            } else {
                $error = $result['message'];
            }
        } elseif ($action === 'save_subjects') {
            $semesterId = (int) $_POST['semester_id'];
            $grades = $_POST['grades'] ?? [];
            $result = saveSemesterGrades($conn, $studentId, $semesterId, $grades);
            $success = $result['success'] ? $result['message'] : '';
            $error = $result['success'] ? '' : $result['message'];
        }
    }

    $allSemesters  = getAllSemesters($conn); // ordered by semester_id ASC
    $selectedSemId = isset($_GET['sem_id']) ? (int) $_GET['sem_id'] : ($allSemesters[0]['semester_id'] ?? 0);
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Edit Student</h1>

        <?php if ($success): ?>
            <p style="color: green; margin-bottom: 10px;"><?= htmlspecialchars($success) ?></p>
        <?php endif; ?>

        <?php if ($error): ?>
            <p style="color: red; margin-bottom: 10px;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <div class="edit-columns">

            <div class="edit-box">
                <h2 class="edit-box-title">Information</h2>
                <div class="edit-wrapper">
                    <div class="edit-list">

                        <form method="POST" action="student-edit.php?id=<?= $studentId ?>">
                            <input type="hidden" name="action" value="edit_field">
                            <div class="edit-row">
                                <span>Name</span>
                                <input type="hidden" name="field" value="name">
                                <input class="edit-design" type="text" name="value" value="<?= htmlspecialchars($student['name']) ?>">
                                <button type="submit" class="icon-btn">Save</button>
                            </div>
                        </form>

                        <form method="POST" action="student-edit.php?id=<?= $studentId ?>">
                            <input type="hidden" name="action" value="edit_field">
                            <div class="edit-row">
                                <span>Email</span>
                                <input type="hidden" name="field" value="email">
                                <input class="edit-design" type="text" name="value" value="<?= htmlspecialchars($student['email']) ?>">
                                <button type="submit" class="icon-btn">Save</button>
                            </div>
                        </form>

                        <form method="POST" action="student-edit.php?id=<?= $studentId ?>">
                            <input type="hidden" name="action" value="edit_field">
                            <div class="edit-row">
                                <span>Phone Number</span>
                                <input type="hidden" name="field" value="phone_number">
                                <input class="edit-design" type="text" name="value" value="<?= htmlspecialchars($student['phone_number']) ?>">
                                <button type="submit" class="icon-btn">Save</button>
                            </div>
                        </form>

                        <form method="POST" action="student-edit.php?id=<?= $studentId ?>">
                            <input type="hidden" name="action" value="edit_field">
                            <div class="edit-row">
                                <span>User ID</span>
                                <input type="hidden" name="field" value="login_id">
                                <input class="edit-design" type="text" name="value" value="<?= htmlspecialchars($student['login_id']) ?>">
                                <button type="submit" class="icon-btn">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="edit-box" id="edit-subjects">
                <h2 class="edit-box-title">Subjects</h2>
                <div class="edit-wrapper">

                    <!-- Semester picker - updates immediately on change -->
                    <form method="GET" action="student-edit.php#edit-subjects" id="semForm">
                        <input type="hidden" name="id" value="<?= $studentId ?>">
                        <div class="report-buttons" style="background: rgba(255,255,255,0.25);">
                            <select class="dropdown-select" name="sem_id" onchange="document.getElementById('semForm').submit()">
                                <?php foreach ($allSemesters as $s): ?>
                                    <option value="<?= (int) $s['semester_id'] ?>" <?= ((int) $s['semester_id'] === $selectedSemId) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($s['semester_name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </form>

                    <?php
                    if (empty($allSemesters)) {
                        echo '<p class="empty-state">No semesters configured.</p>';
                    } else {
                        $isUnlocked = isSemesterUnlocked($conn, $studentId, $selectedSemId, $allSemesters);
                        $subjects   = getSubjectsBySemester($conn, $selectedSemId);

                        if (!$isUnlocked) {
                            echo '<p class="lock-note">This semester is locked. The student must pass every subject from the previous semester (no fail/E grades left) before this one can be opened.</p>';
                        }
                    ?>
                        <form method="POST" action="student-edit.php?id=<?= $studentId ?>&sem_id=<?= $selectedSemId ?>#edit-subjects" <?= $isUnlocked ? '' : 'style="opacity:0.55; pointer-events:none;"' ?>>
                            <input type="hidden" name="action" value="save_subjects">
                            <input type="hidden" name="semester_id" value="<?= $selectedSemId ?>">

                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Course Code</th>
                                        <th>Course Name</th>
                                        <th>Grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($subjects)): ?>
                                        <tr>
                                            <td colspan="3" style="text-align:center;">No subjects in this semester.</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($subjects as $subject):
                                            $subjectId = (int) $subject['subject_id'];
                                            $code      = htmlspecialchars($subject['subject_code']);
                                            $name      = htmlspecialchars($subject['subject_name']);
                                            $row       = getSubjectGrade($conn, $studentId, $subjectId, $selectedSemId);
                                            $grade     = $row['grade'] ?? null;
                                            $class     = classifyGrade($grade); // pass | conditional | fail | none
                                            $rowClass  = $isUnlocked ? 'grade-' . $class : 'grade-locked';
                                        ?>
                                            <tr class="<?= $rowClass ?>">
                                                <td style="width: 15%;"><?= $code ?></td>
                                                <td><?= $name ?></td>
                                                <td style="width: 15%;">
                                                    <?php if ($isUnlocked && $class === 'pass'): ?>
                                                        <?= htmlspecialchars($grade) ?>
                                                    <?php else: ?>
                                                        <div class="report-buttons" style="margin: 0px; padding: 0px; width:fit-content">
                                                            <select class="dropdown-select" name="grades[<?= $subjectId ?>]" <?= $isUnlocked ? '' : 'disabled' ?>>
                                                                <?php
                                                                $options = ['' => '-', 'A' => 'A', 'A-' => 'A-', 'B+' => 'B+', 'B' => 'B', 'B-' => 'B-', 'C+' => 'C+', 'C' => 'C', 'C-' => 'C-', 'D+' => 'D+', 'D' => 'D', 'E' => 'E'];
                                                                foreach ($options as $val => $label):
                                                                    $selected = ($grade === $val) ? 'selected' : '';
                                                                ?>
                                                                    <option value="<?= $val ?>" <?= $selected ?>><?= $label ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>

                            <?php if ($isUnlocked): ?>
                                <div style="display: flex; justify-content: center; margin-top: 12px;">
                                    <button type="submit" class="report-buttons">Save</button>
                                </div>
                            <?php endif; ?>
                        </form>
                    <?php
                    }
                    ?>

                </div>
            </div>

        </div>
    </main>
</body>

</html>