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
    include("../models/functions.php"); // also opens $conn via database/connection.php

    $studentId = isset($_GET['id']) ? (int) $_GET['id'] : 0;

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

        <div class="edit-columns">

          <div class="edit-box">
            <h2 class="edit-box-title">Information</h2>
            <div class="edit-wrapper">
              <div class="edit-list">
                <div class="edit-row">
                  <span>Name -</span>
                  <button class="icon-btn">✎</button>
                </div>
                <div class="edit-row">
                  <span>Email -</span>
                  <button class="icon-btn">✎</button>
                </div>
                <div class="edit-row">
                  <span>Phone Number -</span>
                  <button class="icon-btn">✎</button>
                </div>
                <div class="edit-row">
                  <span>User ID -</span>
                  <button class="icon-btn">✎</button>
                </div>
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