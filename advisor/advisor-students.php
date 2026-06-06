<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student List - UTeM Advisor</title>
  <link rel="stylesheet" href="../style/styles.css">
  <style>
    .stu-toolbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 16px;
    }

    .add-btn .plus {
      font-size: 14px;
    }

    .muet-ok {
      color: #1a8a3a;
      font-weight: bold;
      font-size: 18px;
    }

    .stu-table th {
      background: #eee;
    }
  </style>
</head>

<body>
  <div class="app">
    <?php
    $activePage = 'students';
    include("components/sidebar-advisor.php");
    ?>

    <?php
    $pageTitle = 'Student List';
    include("components/topbar-advisor.php");
    ?>

    <main class="content">
      <div class="stu-toolbar">
        <div class="search">
          <span>≡</span>
          <input placeholder="Search student">
          <span>🔍</span>
        </div>
        <button class="add-btn">
          <span>🎓</span>Student <span class="plus">+</span>
        </button>
      </div>
      <table class="stu-table">
        <thead>
          <tr>
            <th>Student Name</th>
            <th style="width: 140px;">MUET Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Albu</td>
            <td style="text-align: center;">
              <span class="muet-ok">✓</span>
            </td>
          </tr>
          <tr>
            <td>Kamal</td>
            <td style="text-align: center;">
              <span class="muet-ok">✓</span>
            </td>
          </tr>
          <tr>
            <td>Zikrin</td>
            <td style="text-align: center;">
              <span class="muet-ok">✓</span>
            </td>
          </tr>
          <tr>
            <td>Ahmad Bin Ali</td>
            <td style="text-align: center;">
              <span class="muet-ok">✓</span>
            </td>
          </tr>
          <tr>
            <td>Siti Nurhaliza</td>
            <td style="text-align: center;">—</td>
          </tr>
        </tbody>
      </table>
    </main>
  </div>
</body>

</html>