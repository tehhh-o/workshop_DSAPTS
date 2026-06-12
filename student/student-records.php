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

      <div class="table-wrapper">
      <div class="record-table-container">
        <div class="search-container">
          <img src="../assets/icons/search.png" alt="Search" class="search-icon">
          <input type="text" placeholder="Search Courses" class="search-input">
        </div>
        <div class="student-name-header">
          <strong>Name: Ahmad bin Ali</strong>
        </div>
          <table class="student-record-table">
            <thead>
              <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Credit</th>
                <th>Grade</th>
              </tr>
                
            </thead>
                <tbody>
                 <tr>
                  <td>DITP1113</td>
                    <td>Programming Technique</td>
                    <td class="text-right">3</td>
                    <td>A</td>
                </tr>
                <tr>
                  <td>DITS1213</td>
                  <td>Database Fundamentals</td>
                  <td class="text-right">3</td>
                  <td>A-</td>
                </tr>
                <tr>
                  <td>DITM1313</td>
                  <td>Web Application Dev</td>
                  <td class="text-right">3</td>
                  <td>B+</td>
                </tr>
                <tr>
                  <td>DITI1113</td>
                  <td>Discrete Mathematics</td>
                  <td class="text-right">3</td>
                  <td>B</td>
                </tr>
                <tr>
                <td>DLHL1012</td>
                <td>English for Academic</td>
                <td class="text-right">2</td>
                <td>A</td>
                </tr>
                <tr>
                  <td>DLHW1762</td>
                  <td>Co-Curriculum</td>
                  <td class="text-right">2</td>
                <td>A</td>
                </tr>
                </tbody>
            </table>
      </div>
      </div>
    </main>
</body>
</html>
