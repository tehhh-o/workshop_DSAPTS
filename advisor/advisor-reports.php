<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title> <!-- change this title -->
  <link rel="stylesheet" href="../style/layout.css">
  <link rel="stylesheet" href="../style/advisor.css">
  <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
  <?php
  $activePage = 'reports';
  include("components/sidebar-advisor.php")
  ?>

  <main class="main-content main-rounded">
    <h1 class="content-title">Reports</h1>

    <div class="table-wrapper">
      <div class="report-table-container">
        <div class="search-container-report">
          <img src="../assets/icons/search.png" alt="Search" class="search-icon">
          <input type="text" placeholder="Search Students" class="search-input">
        </div>
        <div class="report-buttons-container">
          <div class="report-buttons">
            <select class="dropdown-select">
              <option>Semester 1</option>
              <option>Semester 2</option>
              <option>Semester 3</option>
              <option>Semester 4</option>
              <option>Semester 5</option>
            </select>
          </div>
          <div class="report-buttons">
            <p>All Students</p>
          </div>
          <div class="report-buttons">
            <p>Overall Report</p>
          </div>
        </div>
        <div class="profile-card" style="flex-direction: column;">
          <h2 class="report-title">Detailed Report - Ahmad Bin Ali, Overall Report</h2>
          <div class="chart-container">
            <canvas id="gpaChart"></canvas>
          </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="../js/script.js"></script>
        <script>
          makeGraph({
            id: "gpaChart",
            type: "bar",
            title: "Student GPA Trend",
            xLabel: "Semester",
            yLabel: "GPA",
            xValues: ["Sem 1/1", "Sem 1/2", "Sem 2/1", "Sem 2/2", "Sem 3/1", "Sem 3/2"],
            yValues: [3.7, 3.2, 3.4, 3.6, 3.4, 3.95],
            label: "GPA"
          });
        </script>
  </main>
</body>

</html>