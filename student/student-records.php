<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Records</title> <!-- change this title -->
  <link rel="stylesheet" href="../style/layout.css">
  <link rel="stylesheet" href="../style/student.css">
  <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
  <?php
  $activePage = 'records';
  include("components/sidebar-student.php")
  ?>

  <main class="main-content main-rounded">
    <h1 class="content-title">Records</h1>

    <div class="toolbar">
      <div class="search">
        <span>☰</span>
        <input placeholder="Search Course">
        <img src="../assets/icons/search.png" alt="" style="height: 16px;">
      </div>
    </div>

    <table>
      <thead>
        <tr>
          <th class="" colspan="4" style="text-align: start;">Name: Ahmad Bin Ali</th>
        </tr>
        <tr>
          <th class="">Course Code</th>
          <th class="">Course Name</th>
          <th class="">Credit</th>
          <th class="">Grade</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>DITP1113</td>
          <td>Programming Technique</td>
          <td>3</td>
          <td>A</td>
        </tr>
        <tr>
          <td>DITS1213</td>
          <td>Database Fundamentals</td>
          <td>3</td>
          <td>A-</td>
        </tr>
        <tr>
          <td>DITM1313</td>
          <td>Web Application Dev</td>
          <td>3</td>
          <td>B+</td>
        </tr>
        <tr>
          <td>DITI1113</td>
          <td>Discrete Mathematics</td>
          <td>3</td>
          <td>B</td>
        </tr>
        <tr>
          <td>DLHL1012</td>
          <td>English for Academic</td>
          <td>2</td>
          <td>A</td>
        </tr>
        <tr>
          <td>DLHW1762</td>
          <td>Co-Curriculum</td>
          <td>2</td>
          <td>A</td>
        </tr>
      </tbody>
    </table>
  </main>
</body>

</html>