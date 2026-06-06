<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Academic Records - UTeM Student</title>
  <link rel="stylesheet" href="../style/styles.css">
  <style>
    .sel {
      padding: 4px 8px;
      border: 1px solid #999;
      background: #fff;
    }

    .rec-tbl {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
    }

    .rec-tbl th,
    .rec-tbl td {
      border: 1px solid #999;
      padding: 8px;
      font-size: 13px;
      text-align: left;
    }
  </style>
</head>

<body>
  <div class="app">
    <?php
    $activePage = 'records';
    include("components/sidebar-student.php");
    ?>

    <?php
    $pageTitle = 'Academic Records';
    include("components/topbar-student.php");
    ?>

    <main class="content">
      <div style="background: #d9d9d9; border: 1px solid #999; border-radius: 6px; padding: 24px;">
        <div style="display: flex; justify-content: space-between; margin-bottom: 12px; font-size: 14px;">
          <div>
            <b>Student Name:</b> Ahmad Bin Ali
          </div>
          <div>
            <b>CGPA:</b> 3.65 &nbsp;&nbsp; <b>MUET:</b> Band 4
          </div>
        </div>
        <div style="text-align: right; margin-bottom: 8px;">
          <select class="sel">
            <option>Semester 1</option>
            <option>Semester 2</option>
            <option>Semester 3</option>
          </select>
          &nbsp; <b>GPA:</b> 3.75
        </div>
        <table class="rec-tbl">
          <thead>
            <tr>
              <th>Course Name</th>
              <th>Course Code</th>
              <th>Credit</th>
              <th>Grade</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Course Name 1</td>
              <td>DITP3001</td>
              <td>3</td>
              <td>B+</td>
            </tr>
            <tr>
              <td>Course Name 2</td>
              <td>DITP3002</td>
              <td>3</td>
              <td>A-</td>
            </tr>
            <tr>
              <td>Course Name 3</td>
              <td>DITP3003</td>
              <td>3</td>
              <td>B</td>
            </tr>
            <tr>
              <td>Course Name 4</td>
              <td>DITP3004</td>
              <td>3</td>
              <td>A</td>
            </tr>
            <tr>
              <td>Course Name 5</td>
              <td>DITP3005</td>
              <td>3</td>
              <td>A</td>
            </tr>
            <tr>
              <td>Course Name 6</td>
              <td>DITP3006</td>
              <td>3</td>
              <td>B+</td>
            </tr>
            <tr>
              <td>Course Name 7</td>
              <td>DITP3007</td>
              <td>3</td>
              <td>A-</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>

</html>