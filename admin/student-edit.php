<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Student - UTeM</title>
  <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/admin.css">
  <link rel="stylesheet" href="../style/styles.css">
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
    }

    function renderSubjectRows($conn)
{
    $subjects = getAll($conn, 'subject');

    if (empty($subjects)) {
        echo '<p class="empty-state">No subjects available.</p>';
        return;
    }

    foreach ($subjects as $subject) {
        $subjectPk = (int) $subject['subject_id'];
        $code      = htmlspecialchars($subject['subject_code']);
        $name      = htmlspecialchars($subject['subject_name']);
        ?>
        <div class="edit-row" data-subject-id="<?= $subjectPk ?>">
          <span><?= $code ?> - <?= $name ?></span>
          <div class="edit-row-actions">
            <button class="icon-btn" type="button">✎</button>
            <button class="icon-btn" type="button">🗑</button>
          </div>
        </div>
        <?php
    }
}
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Edit Student</h1>

        <?php if ($success): ?>
            <p style="color: green; margin-bottom: 10px;"><?= $success ?></p>
        <?php endif; ?>

        <?php if ($error): ?>
            <p style="color: red; margin-bottom: 10px;"><?= $error ?></p>
        <?php endif; ?>

        <div class="edit-columns">

          <div class="edit-box">
            <h2 class="edit-box-title">Information</h2>
            <div class="edit-wrapper">
              <div class="edit-list">

                <form method="POST" action="student-edit.php?id=<?= $studentId ?>">
                  <div class="edit-row">
                    <span>Name</span>
                    <input type="hidden" name="field" value="name">
                    <input class="edit-design" type="text" name="value" value="<?= $student['name'] ?>">
                    <button type="submit" class="icon-btn">Save</button>
                  </div>
                </form>

                <form method="POST" action="student-edit.php?id=<?= $studentId ?>">
                  <div class="edit-row">
                    <span>Email</span>
                    <input type="hidden" name="field" value="email">
                    <input class="edit-design" type="text" name="value" value="<?= $student['email'] ?>">
                    <button type="submit" class="icon-btn">Save</button>
                  </div>
                </form>

                <form method="POST" action="student-edit.php?id=<?= $studentId ?>">
                  <div class="edit-row">
                    <span>Phone Number</span>
                    <input type="hidden" name="field" value="phone_number">
                    <input class="edit-design" type="text" name="value" value="<?= $student['phone_number'] ?>">
                    <button type="submit" class="icon-btn">Save</button>
                  </div>
                </form>

                <form method="POST" action="student-edit.php?id=<?= $studentId ?>">
                  <div class="edit-row">
                    <span>User ID</span>
                    <input type="hidden" name="field" value="login_id">
                    <input class="edit-design" type="text" name="value" value="<?= $student['login_id'] ?>">
                    <button type="submit" class="icon-btn">Save</button>
                  </div>
                </form>

              </div>
            </div>
          </div>

          <div class="edit-box">
            <h2 class="edit-box-title">Subjects</h2>
            <div class="edit-wrapper">
              <div class="edit-list">
                <?php renderSubjectRows($conn, $studentId); 
                ?>
              </div>
            </div>
          </div>

        </div>
    </main>
</body>

</html>