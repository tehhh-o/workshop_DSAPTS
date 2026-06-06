<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard - UTeM Student</title>
  <link rel="stylesheet" href="../style/styles.css">
  <style>
    .btn-pill {
      background: #d9d9d9;
      border: 1px solid #999;
      padding: 8px 18px;
      border-radius: 4px;
      font-size: 14px;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div class="app">
    <aside class="sidebar">
      <div class="logo">
        <div class="logo-box">UTeM</div>
        <div class="logo-sub">UNIVERSITI TEKNIKAL MALAYSIA MELAKA</div>
      </div>
      <nav class="nav">
        <a class="active" href="dashboard-student.php">
          <span class="ico">🖥️</span>Dashboard
        </a>
        <a class="" href="student-records.php">
          <span class="ico">📑</span>Records
        </a>
        <a class="" href="student-alerts.php">
          <span class="ico">⚠️</span>Alerts
        </a>
        <a class="" href="student-reports.php">
          <span class="ico">📋</span>Reports
        </a>
        <a class="" href="student-profile.php">
          <span class="ico">👤</span>Profile
        </a>
      </nav>
      <button class="logout" onclick="location.href='../index.php'">Log out</button>
    </aside>
    <header class="topbar">
      <div style="width: 120px;"></div>
      <div class="title">Dashboard</div>
      <div class="user">
        <span>Student -</span>
        <span class="avatar">👤</span>
      </div>
    </header>
    <main class="content">
      <div style="display: flex; gap: 16px; align-items: flex-start;">
        <button class="btn-pill">CGPA</button>
        <div style="flex: 1; background: #fff; border: 1px solid #999; padding: 16px; border-radius: 6px;">
          <svg viewBox="0 0 660 340" width="100%" style="background: #fff;">
            <line x1="40" y1="20" x2="40" y2="300" stroke="#000" />
            <line x1="40" y1="300" x2="640" y2="300" stroke="#000" />
            <text x="20" y="310" font-size="11">0</text>
            <text x="20" y="280" font-size="11">10</text>
            <text x="20" y="250" font-size="11">20</text>
            <text x="20" y="220" font-size="11">30</text>
            <text x="20" y="190" font-size="11">40</text>
            <text x="20" y="160" font-size="11">50</text>
            <text x="20" y="130" font-size="11">60</text>
            <text x="20" y="100" font-size="11">70</text>
            <text x="20" y="70" font-size="11">80</text>
            <text x="20" y="40" font-size="11">90</text>
            <polyline fill="none" stroke="#111" stroke-width="2"
              points="40,210 110,140 180,220 250,220 320,190 390,290 460,260 530,170 600,90" />
            <circle cx="40" cy="210" r="5" fill="#111" />
            <circle cx="110" cy="140" r="5" fill="#111" />
            <circle cx="180" cy="220" r="5" fill="#111" />
            <circle cx="250" cy="220" r="5" fill="#111" />
            <circle cx="320" cy="190" r="5" fill="#111" />
            <circle cx="390" cy="290" r="5" fill="#111" />
            <circle cx="460" cy="260" r="5" fill="#111" />
            <circle cx="530" cy="170" r="5" fill="#111" />
            <circle cx="600" cy="90" r="5" fill="#111" />
            <text x="40" y="320" font-size="11" text-anchor="middle">OCT 2019</text>
            <text x="110" y="320" font-size="11" text-anchor="middle">NOV</text>
            <text x="180" y="320" font-size="11" text-anchor="middle">DEC</text>
            <text x="250" y="320" font-size="11" text-anchor="middle">JAN 2020</text>
            <text x="320" y="320" font-size="11" text-anchor="middle">FEB</text>
            <text x="390" y="320" font-size="11" text-anchor="middle">MAR</text>
            <text x="460" y="320" font-size="11" text-anchor="middle">APR</text>
            <text x="530" y="320" font-size="11" text-anchor="middle">MAY</text>
            <text x="600" y="320" font-size="11" text-anchor="middle">JUN</text>
          </svg>
          <div style="text-align: center; margin-top: 10px;">
            <button class="btn-pill">SEMESTER ▾</button>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>

</html>