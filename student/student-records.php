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
<script>
  function toggleFilters() {
    const panel = document.getElementById('filterPanel');
    if (panel.style.display === 'none' || panel.style.display === '') {
      panel.style.display = 'flex';
    } else {
      panel.style.display = 'none';
    }
  }
</script>

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
  $semesters     = getAllSemesters($conn);

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
      <form class="toolbar-form" method="GET" action="student-records.php" style="display: flex; flex-direction: column; gap: 15px;">

        <div style="display: flex; align-items: center; gap: 12px;">

          <div class="search" style="display: flex; max-width: 350px;">
            <input type="text" name="search" placeholder="Search Course" value="<?= htmlspecialchars($keyword ?? '') ?>"

              <button type="submit" style="background: none; border: none; cursor: pointer; padding: 0; display: flex; align-items: center; justify-content: center; padding-right: 10px;">
            <img src="../assets/icons/search.png" alt="" style="height: 16px;">
            </button>
          </div>

          <button type="button" onclick="toggleFilters()" class="filter-btn">
            <img src="../assets/icons/filter.png" alt="" style="height: 25px; width: auto; display: block;">
            Filters
          </button>

        </div>

        <?php
        $hasActiveFilters = (!empty($semester) || !empty($gpa_filter));
        ?>

        <div id="filterPanel" style="display: <?= $hasActiveFilters ? 'flex' : 'none' ?>; flex-wrap: wrap; align-items: center; gap: 10px; background-color: #f8fafc; border: 1px solid #e2e8f0; padding: 15px; border-radius: 8px;">

          <select name="semester" class="filter-select">
            <option value="">All Semesters</option>
            <?php foreach ($semesters as $s): ?>
              <option value="<?php echo $s['semester_name']; ?>"
                <?php echo $s['semester_name'] == $semester ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($s['semester_name']); ?>
              </option>
            <?php endforeach; ?>
          </select>

          <select name="gpa_filter" class="filter-select">
            <option value="">Course Grade</option>
            <option value="excellent" <?= ($gpa_filter ?? '') === 'excellent' ? 'selected' : '' ?>>Excellent (A/B+)</option>
            <option value="average" <?= ($gpa_filter ?? '') === 'average' ? 'selected' : '' ?>>Average (B-/C)</option>
            <option value="risk" <?= ($gpa_filter ?? '') === 'risk' ? 'selected' : '' ?>>At Risk (C- & below)</option>
          </select>

          <button type="submit" class="filter-btn">Apply</button>
          <a href="student-records.php" class="clear-btn" style="text-decoration: none; font-family: sans-serif; font-size: 14px; color: #64748b;">Clear All</a>
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
            <td colspan="8" style="text-align: center;">No records found.</td>
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