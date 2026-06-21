<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reports</title>
  <link rel="stylesheet" href="../style/layout.css">
  <link rel="stylesheet" href="../style/student.css">
  <link rel="stylesheet" href="../style/advisor.css">
  <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
  <?php
  session_start();
  if (!isset($_SESSION['uid'])) {
    header("Location: ../index.php");
    exit();
  }
  $activePage = 'reports';
  include("components/sidebar-student.php");
  include("../models/functions.php");

  $loginId = $_SESSION['uid'];
  $student = getStudentByLoginId($conn, $loginId);

  if (!$student) {
    echo "<p style='color:red;'>Student record not found.</p>";
    exit();
  }

  $userId = $student['user_id'];
  $semesters     = getAllSemesters($conn);
  $selectedSemId = isset($_GET['sem_id']) ? (int)$_GET['sem_id'] : ($semesters[0]['semester_id'] ?? 1);
  $isOverall     = isset($_GET['overall']);
  $allSubjects = getStudentSubjects($conn, $userId);
  $semSubjects = getStudentSubjectsBySemester($conn, $userId, $selectedSemId);
  $selectedSemName = '';

  foreach ($semesters as $s) {
    if ($s['semester_id'] == $selectedSemId) {
      $selectedSemName = $s['semester_name'];
      break;
    }
  }
  $selectedGPA = calculateGPA($semSubjects);
  $cgpa        = calculateGPA($allSubjects);

  if ($isOverall) {

    $subjectsBySem = [];
    foreach ($allSubjects as $subj) {
      $subjectsBySem[$subj['semester_name']][] = $subj;
    }
    $semLabels = [];
    $semGPAs   = [];
    foreach ($subjectsBySem as $semName => $subjects) {
      $semLabels[] = $semName;
      $semGPAs[]   = calculateGPA($subjects);
    }
    $semLabelsJson = json_encode($semLabels);
    $semGPAsJson   = json_encode($semGPAs);
  } else {

    $subjectCodes = [];
    $subjectGPAs  = [];
    foreach ($semSubjects as $subj) {
      $point = gradeToPoint($subj['grade']);
      if ($point === null) continue;
      $subjectCodes[] = $subj['subject_code'] ?? $subj['subject_id'];
      $subjectGPAs[]  = $point;
    }
    $subjectCodesJson = json_encode($subjectCodes);
    $subjectGPAsJson  = json_encode($subjectGPAs);
  }

  ?>
  <main class="main-content main-rounded">
    <h1 class="content-title">Reports</h1>
    <div class="report-buttons-container">
      <form method="GET" action="student-reports.php" style="display: contents;">
        <div class="report-buttons">
          <select class="dropdown-select" name="sem_id">
            <?php foreach ($semesters as $s): ?>
              <option value="<?php echo $s['semester_id']; ?>"
                <?php echo $s['semester_id'] == $selectedSemId ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($s['semester_name']); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <button class="report-buttons" type="submit">View Report</button>
        <button class="report-buttons" type="submit" name="overall" value="1">Overall Report</button>
      </form>
    </div>

    <?php if ($isOverall): ?>
      <div class="profile-card" style="flex-direction: column;">
        <h2 class="report-title">Overall Report — <?php echo htmlspecialchars($student['name']); ?></h2>
        <p>CGPA: <strong><?php echo number_format($cgpa, 2); ?></strong></p>
        <div class="chart-container">
          <canvas id="gpaChart"></canvas>
        </div>
      </div>

    <?php else: ?>

      <div class="profile-card" style="flex-direction: column;">
        <h2 class="report-title">
          Detailed Report — <?php echo htmlspecialchars($student['name']); ?>,
          <?php echo htmlspecialchars($selectedSemName); ?>
        </h2>
        <p>GPA: <strong><?php echo number_format($selectedGPA, 2); ?></strong></p>

        <table style="width:100%; margin-top: 12px;">
          <thead>
            <tr>
              <th>Course Name</th>
              <th>Credit</th>
              <th>Grade</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($semSubjects)): ?>
              <tr>
                <td colspan="3" style="text-align:center;">No subjects found for this semester.</td>
              </tr>
            <?php else: ?>
              <?php foreach ($semSubjects as $subj): ?>
                <tr>
                  <td><?php echo htmlspecialchars($subj['subject_name']); ?></td>
                  <td><?php echo htmlspecialchars($subj['credit_hours']); ?></td>
                  <td><?php echo htmlspecialchars($subj['grade']); ?></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>

        <?php if (!empty($semSubjects)): ?>
          <div class="chart-container" style="margin-top: 24px;">
            <canvas id="subjectChart"></canvas>
          </div>
        <?php endif; ?>
      </div>

    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../js/script.js"></script>
    <script>
      <?php if ($isOverall): ?>
        makeGraph({
          id: "gpaChart",
          type: "bar",
          title: "GPA Trend by Semester",
          xLabel: "Semester",
          yLabel: "GPA",
          xValues: <?php echo $semLabelsJson; ?>,
          yValues: <?php echo $semGPAsJson; ?>,
          label: "GPA"
        });
      <?php elseif (!empty($semSubjects)): ?>
        makeGraph({
          id: "subjectChart",
          type: "bar",
          title: "Subject GPA — <?php echo addslashes($selectedSemName); ?>",
          xLabel: "Subject",
          yLabel: "GPA",
          xValues: <?php echo $subjectCodesJson; ?>,
          yValues: <?php echo $subjectGPAsJson; ?>,
          label: "GPA"
        });
      <?php endif; ?>
    </script>

  </main>
</body>

</html>
