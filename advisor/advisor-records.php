<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Academic Records - UTeM Advisor</title>
  <link rel="stylesheet" href="../style/styles.css">
  <style>
    .rec-top {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 12px;
      gap: 20px;
      flex-wrap: wrap;
    }

    .rec-info {
      display: flex;
      gap: 24px;
      font-size: 14px;
      align-items: center;
    }

    .rec-info select {
      padding: 4px 8px;
    }

    .student-bar {
      background: #b89090;
      color: #fff;
      padding: 10px 16px;
      margin-bottom: 0;
      font-weight: bold;
    }

    .rec-table th {
      background: #eee;
    }

    .rec-table td {
      height: 36px;
    }
  </style>
</head>

<body>
  <div class="app">
    <?php
    $activePage = 'records';
    include("components/sidebar-advisor.php");
    ?>

    <?php
    $pageTitle = 'Academic Records';
    include("components/topbar-advisor.php");
    ?>

    <main class="content">
      <div class="rec-top">
        <div class="search">
          <span>≡</span>
          <input placeholder="Search student">
          <span>🔍</span>
        </div>
        <div class="rec-info">
          <span><strong>CGPA:</strong> 3.42</span>
          <span><strong>MUET:</strong> Band 4</span>
          <span>Semester:
            <select>
              <option>Semester 1</option>
              <option>Semester 2</option>
              <option>Semester 3</option>
            </select>
          </span>
          <span><strong>GPA:</strong> 3.55</span>
        </div>
      </div>
      <div class="student-bar">Student Name: Ahmad Bin Ali</div>
      <table class="rec-table">
        <thead>
          <tr>
            <th>Course Code</th>
            <th>Course Name</th>
            <th>Section</th>
            <th>Credit</th>
            <th>Grade</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>DITP1113</td>
            <td>Programming Technique</td>
            <td>01</td>
            <td>3</td>
            <td>A</td>
          </tr>
          <tr>
            <td>DITS1213</td>
            <td>Database Fundamentals</td>
            <td>02</td>
            <td>3</td>
            <td>A-</td>
          </tr>
          <tr>
            <td>DITM1313</td>
            <td>Web Application Dev</td>
            <td>01</td>
            <td>3</td>
            <td>B+</td>
          </tr>
          <tr>
            <td>DITI1113</td>
            <td>Discrete Mathematics</td>
            <td>03</td>
            <td>3</td>
            <td>B</td>
          </tr>
          <tr>
            <td>DLHL1012</td>
            <td>English for Academic</td>
            <td>02</td>
            <td>2</td>
            <td>A</td>
          </tr>
          <tr>
            <td>DLHW1762</td>
            <td>Co-Curriculum</td>
            <td>01</td>
            <td>2</td>
            <td>A</td>
          </tr>
        </tbody>
      </table>
    </main>
  </div>
</body>

</html>