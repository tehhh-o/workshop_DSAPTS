<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reports</title> <!-- change this title -->
  <link rel="stylesheet" href="../style/layout.css">
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
  include("components/sidebar-advisor.php");
  include("../models/functions.php");

  //search 
  $keyword = $_GET['search'] ?? '';
  $userId = $_GET['user_id'] ?? null;

  $students = [];
  $subjects = [];

  if ($userId) {
    $subjects = getStudentSubjects($conn, $userId);
  } elseif ($keyword) {
    $students = searchAdvisorStudents($conn, $_SESSION['user_id'], $keyword);
  }
  $studentName = '';

  if ($userId) {
    $student = getUserById($conn, "student", "student.user_id", $userId);
    $studentName = $student['name'] ?? '';
  }

  //report

  $loginId = $_SESSION['uid'];
  $semesters = getAllSemesters($conn);

  $selectedSemId = isset($_GET['sem_id']) ? (int)$_GET['sem_id'] : ($semesters[0]['semester_id'] ?? 1);
  $isOverall     = isset($_GET['overall']);
  $isAll         = isset($_GET['all']);

  $allSubjects = getStudentSubjects($conn, $userId);
  $semSubjects = getStudentSubjectsBySemester($conn, $userId, $selectedSemId);

  $selectedGPA = calculateGPA($semSubjects);
  $cgpa        = calculateGPA($allSubjects);

  $selectedSemName = '';
  foreach ($semesters as $s) {
    if ($s['semester_id'] == $selectedSemId) {
      $selectedSemName = $s['semester_name'];
      break;
    }
  }

  $subjectsBySem = [];
  foreach ($allSubjects as $subj) {
    $subjectsBySem[$subj['semester_name']][] = $subj;
  }

  if ($isOverall) {
    $semLabels = [];
    $semGPAs   = [];
    foreach ($subjectsBySem as $semName => $subjects) {
      $semLabels[] = $semName;
      $semGPAs[]   = calculateGPA($subjects);
    }
    $semLabelsJson = json_encode($semLabels);
    $semGPAsJson   = json_encode($semGPAs);
  } elseif ($isAll) {
    $students = getAdvisorStudents($conn, $_SESSION['user_id']);
    $cgpaBuckets = [
      '3.5 - 4.0'  => 0,
      '3.0 - 3.49' => 0,
      '2.5 - 2.99' => 0,
      '2.0 - 2.49' => 0,
      '0.0 - 1.99' => 0,
    ];
    $muetBucket = [
      'Pass' => 0,
      'Not Taken' => 0,
    ];

    foreach ($students as $student) {
      $cgpa = (float) $student['CGPA'];
      if ($cgpa >= 3.5) {
        $cgpaBuckets['3.5 - 4.0']++;
      } elseif ($cgpa >= 3.0) {
        $cgpaBuckets['3.0 - 3.49']++;
      } elseif ($cgpa >= 2.5) {
        $cgpaBuckets['2.5 - 2.99']++;
      } elseif ($cgpa >= 2.0) {
        $cgpaBuckets['2.0 - 2.49']++;
      } else {
        $cgpaBuckets['0.0 - 1.99']++;
      }

      if ($student['muet_status'] == "Pass") {
        $muetBucket['Pass']++;
      } else {
        $muetBucket['Not Taken']++;
      }
    }
    $cgpaLabelsJson = json_encode(array_keys($cgpaBuckets));
    $cgpaCountsJson = json_encode(array_values($cgpaBuckets));

    $muetLabelsJson = json_encode(array_keys($muetBucket));
    $muetCountsJson = json_encode(array_values($muetBucket));
  } else {
    $subjectCodes = [];
    $subjectGPAs  = [];
    foreach ($semSubjects as $subject) {
      $point = gradeToPoint($subject['grade']);
      if ($point === null) {
        continue;
      }
      $subjectCodes[] = $subject['subject_code'];
      $subjectGPAs[]  = $point;
    }
    $subjectCodesJson = json_encode($subjectCodes);
    $subjectGPAsJson  = json_encode($subjectGPAs);
  }
  ?>

  <main class="main-content main-rounded">
    <h1 class="content-title">Reports</h1>

    <div class="toolbar">
      <div class="search-wrapper">
        <form class="search" method="GET" action="">
          <span>☰</span>

          <input
            type="text"
            name="search"
            placeholder="Search student name"
            value="<?= $keyword ?>">

          <button type="submit" style="background:none;border:none;cursor:pointer;">
            <img src="../assets/icons/search.png" alt="" style="height: 16px;">
          </button>
        </form>

        <div class="search-results">
          <?php if ($keyword && !$userId): ?>
            <h3>Search Results</h3>

            <ul>
              <?php foreach ($students as $s): ?>
                <li>
                  <a href="?user_id=<?= $s['user_id'] ?>">
                    <?= $s['name'] ?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="report-buttons-container">

      <form method="GET" action="advisor-reports.php" style="display: contents;">
        <input type="hidden" name="user_id" value="<?= htmlspecialchars($userId ?? '') ?>">
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
        <button class="report-buttons" type="submit" name="all" value="1">All Student Report</button>
      </form>
    </div>

    <?php if ($isAll): ?>

      <div class="profile-card" style="flex-direction: column;">
        <h2 class="report-title">All Student Report - <?php echo htmlspecialchars($_SESSION['name']); ?></h2>
        <div style="display: flex; width: 100%">
          <div class="chart-container">
            <canvas id="cgpaChart"></canvas>
          </div>
          <div class="chart-container">
            <canvas id="muetChart"></canvas>
          </div>
        </div>
      </div>

    <?php elseif (!$userId): ?>
      <tr>
        <td colspan="4" style="text-align:center;">
          Search and select a student
        </td>
      </tr>

    <?php elseif (empty($subjects)): ?>
      <tr>
        <td colspan="4" style="text-align:center;">
          No records found
        </td>
      </tr>

    <?php elseif ($isOverall): ?>

      <div class="profile-card" style="flex-direction: column;">
        <h2 class="report-title">Overall Report - <?php echo htmlspecialchars($student['name']); ?></h2>
        <p>CGPA: <strong><?php echo number_format($cgpa, 2); ?></strong></p>
        <div class="chart-container">
          <canvas id="gpaChart"></canvas>
        </div>
      </div>

    <?php else: ?>

      <div class="profile-card" style="flex-direction: column;">
        <h2 class="report-title">
          Detailed Report - <?php echo htmlspecialchars($student['name']); ?>,
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

        <div class="chart-container" style="margin-top: 24px;">
          <canvas id="subjectChart"></canvas>
        </div>
      </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../js/script.js"></script>
    <script>
      <?php if ($isOverall): ?>
        makeGraph({
          id: "gpaChart",
          type: "bar",
          title: "GPA Trend",
          xLabel: "Semester",
          yLabel: "GPA",
          xValues: <?php echo $semLabelsJson; ?>,
          yValues: <?php echo $semGPAsJson; ?>,
          label: "GPA"
        });
      <?php elseif ($isAll): ?>
        makeGraph({
          id: "cgpaChart",
          type: "pie",
          title: "CGPA Distribution - All Students",
          xLabel: "CGPA Range",
          yLabel: "Number of Students",
          xValues: <?php echo $cgpaLabelsJson; ?>,
          yValues: <?php echo $cgpaCountsJson; ?>,
          label: "Students"
        });
        makeGraph({
          id: "muetChart",
          type: "pie",
          title: "Muet Status - All Students",
          xLabel: "",
          yLabel: "",
          xValues: <?php echo $muetLabelsJson; ?>,
          yValues: <?php echo $muetCountsJson; ?>,
          label: "Students"
        });
      <?php elseif ($userId && !empty($subjects)): ?>
        makeGraph({
          id: "subjectChart",
          type: "bar",
          title: "Subject GPA - <?php echo addslashes($selectedSemName); ?>",
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