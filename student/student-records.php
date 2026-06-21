
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Records</title>
  <link rel="stylesheet" href="../style/layout.css">
  <link rel="stylesheet" href="../style/student.css">
  <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
  <?php
  session_start();
  if (!isset($_SESSION['uid'])) {
      header("Location: ../index.php");
      exit();
  }
  $activePage = 'records';
  include("components/sidebar-student.php");
  include("../models/functions.php");

  $loginId = $_SESSION['uid'];
  $student = getStudentByLoginId($conn, $loginId);

  if (!$student) {
      echo "<p style='color:red;'>Student record not found.</p>";
      exit();
  }

  $userId = $student['user_id'];
  $keyword  = '';
  $subjects = [];

  if (isset($_GET['search']) && $_GET['search'] !== '') {
    $keyword  = $_GET['search'];
    $subjects = searchsubject($conn, 'student_subject', $keyword);
    $subjects = array_filter($subjects, fn($s) => $s['user_id'] == $userId);
  } else {
    $subjects = getStudentSubjects($conn, $userId);
  }
  ?>

  <main class="main-content main-rounded">
    <h1 class="content-title">Records</h1>

    <div class="toolbar">
      <form method="GET" action="student-records.php" style="display: contents;">
        <div class="search">
          <span>☰</span>
          <input name="search" placeholder="Search Course" value="<?php echo htmlspecialchars($keyword); ?>">
          <button type="submit" style="background: none; border: none; cursor: pointer; padding: 0;">
            <img src="../assets/icons/search.png" alt="" style="height: 16px;">
          </button>
        </div>
      </form>
    </div>

    <table>
      <thead>
        <tr>
          <th colspan="5" style="text-align: start;">
            Name: <?php echo htmlspecialchars($student['name']); ?>
          </th>
        </tr>
        <tr>
          <th>Course Code</th>
          <th>Course Name</th>
          <th>Credit</th>
          <th>Grade</th>
          <th>Semester</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($subjects)): ?>
          <tr>
            <td colspan="5" style="text-align: center;">No records found.</td>
          </tr>
        <?php else: ?>
          <?php foreach ($subjects as $subj): ?>
            <tr>
              <td><?php echo htmlspecialchars($subj['subject_id']); ?></td>
              <td><?php echo htmlspecialchars($subj['subject_name']); ?></td>
              <td><?php echo htmlspecialchars($subj['credit_hours']); ?></td>
              <td><?php echo htmlspecialchars($subj['grade']); ?></td>
              <td><?php echo htmlspecialchars($subj['semester_name']); ?></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </main>
</body>

</html>
