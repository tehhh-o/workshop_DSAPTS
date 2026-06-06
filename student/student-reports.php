<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reports - UTeM Student</title>
  <link rel="stylesheet" href="../style/styles.css">
  <style>
    .sel {
      padding: 6px 10px;
      border: 1px solid #999;
      background: #d9d9d9;
      border-radius: 4px;
    }

    .btn-pill {
      background: #d9d9d9;
      border: 1px solid #999;
      padding: 6px 16px;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div class="app">
    <?php
    $activePage = 'reports';
    include("components/sidebar-student.php");
    ?>

    <?php
    $pageTitle = 'Reports';
    include("components/topbar-student.php");
    ?>

    <main class="content">
      <div style="display: flex; gap: 12px; margin-bottom: 16px;">
        <select class="sel">
          <option>Semester 1</option>
          <option>Semester 2</option>
        </select>
        <button class="btn-pill">Overall Report</button>
      </div>
      <div style="font-size: 14px; margin-bottom: 12px;">
        <b>Detailed Report -</b>
      </div>
      <div style="background: #fff; border: 1px solid #999; padding: 16px; border-radius: 6px;">
        <svg viewBox="0 0 540 340" width="100%" style="background: #fff;">
          <line x1="80" y1="20" x2="80" y2="300" stroke="#000" />
          <line x1="80" y1="300" x2="520" y2="300" stroke="#000" />
          <line x1="75" y1="270" x2="85" y2="270" stroke="#000" />
          <line x1="75" y1="240" x2="85" y2="240" stroke="#000" />
          <line x1="75" y1="210" x2="85" y2="210" stroke="#000" />
          <line x1="75" y1="180" x2="85" y2="180" stroke="#000" />
          <line x1="75" y1="150" x2="85" y2="150" stroke="#000" />
          <line x1="75" y1="120" x2="85" y2="120" stroke="#000" />
          <line x1="75" y1="90" x2="85" y2="90" stroke="#000" />
          <line x1="75" y1="60" x2="85" y2="60" stroke="#000" />
          <line x1="75" y1="30" x2="85" y2="30" stroke="#000" />
          <rect x="120" y="120" width="40" height="180" fill="#fff" stroke="#111" />
          <rect x="180" y="60" width="40" height="240" fill="#fff" stroke="#111" />
          <rect x="240" y="180" width="40" height="120" fill="#fff" stroke="#111" />
          <rect x="300" y="100" width="40" height="200" fill="#fff" stroke="#111" />
          <rect x="360" y="40" width="40" height="260" fill="#fff" stroke="#111" />
          <rect x="420" y="80" width="40" height="220" fill="#fff" stroke="#111" />
          <text x="300" y="330" font-size="14" font-weight="bold" text-anchor="middle">bar graph</text>
        </svg>
      </div>
    </main>
  </div>
</body>

</html>