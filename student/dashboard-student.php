
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../style/layout.css">
  <link rel="stylesheet" href="../style/student.css">
  <link rel="stylesheet" href="../style/styles.css">
  <link rel="stylesheet" href="../style/advisor.css">
</head>

<body class="page-body main-gradient-bg">
  <?php
  session_start();
  if (!isset($_SESSION['uid'])) {
      header("Location: ../index.php");
      exit();
  }
  $activePage = 'dashboard';
  include("components/sidebar-student.php");
  include("../models/functions.php");

  $students = getAdvisorStudents($conn, $_SESSION['user_id']);
  $totalSupervised = count($students);
  $loginId = $_SESSION['uid'];
  $student = getStudentByLoginId($conn, $loginId);

  if (!$student) {
      echo "<p style='color:red;'>Student record not found.</p>";
      exit();
  }

  $userId  = $student['user_id'];
  $allSubjects = getStudentSubjects($conn, $userId);
  $subjectsBySem = [];
  
  foreach ($allSubjects as $subj) {
    $semName = $subj['semester_name'];
    $subjectsBySem[$semName][] = $subj;
  }
  $semLabels = [];
  $semGPAs   = [];
  foreach ($subjectsBySem as $semName => $subjects) {
    $semLabels[] = $semName;
    $semGPAs[]   = calculateGPA($subjects);
  }
  $semLabelsJson = json_encode($semLabels);
  $semGPAsJson   = json_encode($semGPAs);
  ?>

    <main class="main-content main-rounded">
    <h1 class="content-title">Dashboard</h1>
    <h3 class="content-welcome">Welcome, <?php echo htmlspecialchars($student['name']); ?></h3>
    <div class="dashboard-summary-cards">
            <div class="stat-card" style="border-left: 5px solid #007bff;">
                <div class="card-text-head">Current CGPA</div>
                <div class="card-text-body"  style="color: #212529;"><?= number_format($student['CGPA'], 2) ?></div>
            </div>

            <div class="stat-card" style="border-left: 5px solid #7b00ff;">
                <div class="card-text-head">Muet Status</div>
                <div class="card-text-body"  style="color: #212529;"><?=  $student['muet_status'] ?></div>
            </div>

        </div>
    
    <div class="chart-container">
      <canvas id="gpaChart"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../js/script.js"></script>

    <script>
      makeGraph({
        id: "gpaChart",
        type: "line",
        title: "Student GPA Trend",
        xLabel: "Semester",
        yLabel: "GPA",
        xValues: <?php echo $semLabelsJson; ?>,
        yValues: <?php echo $semGPAsJson; ?>,
        label: "GPA"
      });
    </script>
</body>

</html>
