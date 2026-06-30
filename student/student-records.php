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

  $userId     = $student['user_id'];
  $keyword = isset($_GET['search']) ? trim($_GET['search']) : '';
  $keyword = str_replace([';', "'", '"'], '', $keyword);
  $semester   = $_GET['semester'] ?? '';
  $gpa_filter = $_GET['gpa_filter'] ?? '';

  $subjects = getStudentFilteredRecords($conn, $userId, $keyword, $semester, $gpa_filter);
  ?>

  <main class="main-content main-rounded">
    <h1 class="content-title">Records</h1>

    <div class="toolbar">
      <form method="GET" action="student-records.php" style="display: contents;">
        <div class="search">
          <input name="search" placeholder="Search Course" value="<?php echo htmlspecialchars($keyword); ?>">
          <button type="submit" style="background: none; border: none; cursor: pointer; padding: 0;">
            <img src="../assets/icons/search.png" alt="" style="height: 16px;">
          </button>
        </div>
        <div class="filters" style="display: flex; align-items: center; gap: 10px;">
        <span class="filter-label">Filter:</span>

        <select name="semester" class="filter-select">
            <option value="">All Semesters</option>
            <option value="1-2024/2025" <?= $semester === '1-2024/2025' ? 'selected' : '' ?>>1-2024/2025</option>
            <option value="2-2024/2025" <?= $semester === '2-2024/2025' ? 'selected' : '' ?>>2-2024/2025</option>
        </select>

        <select name="gpa_filter" class="filter-select">
            <option value="">Course Grade</option>
            <option value="excellent" <?= $gpa_filter === 'excellent' ? 'selected' : '' ?>>Excellent (A/B+)</option>
            <option value="average" <?= $gpa_filter === 'average' ? 'selected' : '' ?>>Average (B-/C)</option>
            <option value="risk" <?= $gpa_filter === 'risk' ? 'selected' : '' ?>>At Risk (C- & below)</option>
        </select>

        <button type="submit" class="filter-btn">
            Apply
        </button>
        
        <a href="student-records.php" class="clear-btn" style="text-decoration: none; font-size: 14px; color: #666;">Clear All</a>
        </div>
      </form>
    </div>

    

    <table>
      <thead>
        <tr>
          <th colspan="7" style="text-align: start;">
            Name: <?php echo htmlspecialchars($student['name']); ?>
          </th>
        </tr>
        <tr>
          <th>Course Code</th>
          <th>Course Name</th>
          <th>Credit</th>
          <th>Grade</th>
          <th>GPA</th>
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
              <td><?php echo htmlspecialchars($subj['subject_code']); ?></td>
              <td><?php echo htmlspecialchars($subj['subject_name']); ?></td>
              <td><?php echo htmlspecialchars($subj['credit_hours']); ?></td>
              <td><?php echo htmlspecialchars($subj['grade']); ?></td>
              <td><?php echo htmlspecialchars(gradeToPoint($subj['grade'])); ?></td>
              <td><?php echo htmlspecialchars($subj['semester_name']); ?></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </main>
</body>

</html>