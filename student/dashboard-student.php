<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../style/layout.css">
  <link rel="stylesheet" href="../style/student.css">
  <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
  <?php
  $activePage = 'dashboard';
  include("components/sidebar-student.php")
  ?>

  <main class="main-content main-rounded">
    <h1 class="content-title">Dashboard</h1>
    <h3 class="content-welcome">Welcome, Ahmad Bin Ali</h3>

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
        xValues: ["Sem 1/1", "Sem 1/2", "Sem 2/1", "Sem 2/2", "Sem 3/1", "Sem 3/2"],
        yValues: [3.7, 3.2, 3.4, 3.6, 3.4, 3.95],
        label: "GPA"
      });
    </script>
</body>

</html>