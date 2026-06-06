<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard - UTeM Advisor</title>
  <link rel="stylesheet" href="../style/styles.css">
  <style>
    .dash-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    .dash-card {
      background: #d9d9d9;
      border: 1px solid #999;
      border-radius: 6px;
      min-height: 380px;
      padding: 20px;
      position: relative;
    }

    .dash-card .card-title {
      display: inline-block;
      background: #fff;
      border: 1px solid #999;
      padding: 8px 16px;
      font-weight: bold;
      font-size: 15px;
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      top: 20px;
    }

    .dash-card .card-title.under {
      text-decoration: underline;
      color: #1a73e8;
    }

    .dash-body {
      padding-top: 60px;
    }

    .risk-item {
      background: #fff;
      border: 1px solid #bbb;
      padding: 10px 14px;
      margin-bottom: 8px;
      border-radius: 4px;
      display: flex;
      justify-content: space-between;
      font-size: 14px;
    }

    .progress-bar {
      background: #fff;
      border: 1px solid #999;
      height: 18px;
      border-radius: 10px;
      overflow: hidden;
      margin-top: 4px;
    }

    .progress-fill {
      background: #1a73e8;
      height: 100%;
    }

    .sem-row {
      margin-bottom: 14px;
      font-size: 14px;
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
        <a class="active" href="dashboard-advisor.php">
          <span class="ico">🖥️</span>Dashboard
        </a>
        <a class="" href="advisor-records.php">
          <span class="ico">📑</span>Records
        </a>
        <a class="" href="advisor-alerts.php">
          <span class="ico">⚠️</span>Alerts
        </a>
        <a class="" href="advisor-students.php">
          <span class="ico">🎓</span>Students
        </a>
        <a class="" href="advisor-reports.php">
          <span class="ico">📋</span>Reports
        </a>
        <a class="" href="advisor-profile.php">
          <span class="ico">👤</span>Profile
        </a>
      </nav>
      <button class="logout" onclick="location.href='../index.php'">Log out</button>
    </aside>
    <header class="topbar">
      <div style="width: 120px;"></div>
      <div class="title">Dashboard</div>
      <div class="user">
        <span>Advisor -</span>
        <span class="avatar">👤</span>
      </div>
    </header>
    <main class="content">
      <div class="dash-grid">
        <div class="dash-card">
          <div class="card-title">High-Risk Student</div>
          <div class="dash-body">
            <div class="risk-item">
              <span>Ahmad Bin Ali</span>
              <span>CGPA 1.95</span>
            </div>
            <div class="risk-item">
              <span>Raj Kumar</span>
              <span>CGPA 2.05</span>
            </div>
            <div class="risk-item">
              <span>Siti Nurhaliza</span>
              <span>CGPA 2.15</span>
            </div>
            <div class="risk-item">
              <span>Tan Wei Ming</span>
              <span>CGPA 2.30</span>
            </div>
            <div class="risk-item">
              <span>Lim Chong</span>
              <span>CGPA 2.35</span>
            </div>
          </div>
        </div>
        <div class="dash-card">
          <div class="card-title under">Semester Progress</div>
          <div class="dash-body">
            <div class="sem-row">
              Semester 1
              <div class="progress-bar">
                <div class="progress-fill" style="width: 100%;"></div>
              </div>
            </div>
            <div class="sem-row">
              Semester 2
              <div class="progress-bar">
                <div class="progress-fill" style="width: 100%;"></div>
              </div>
            </div>
            <div class="sem-row">
              Semester 3
              <div class="progress-bar">
                <div class="progress-fill" style="width: 85%;"></div>
              </div>
            </div>
            <div class="sem-row">
              Semester 4
              <div class="progress-bar">
                <div class="progress-fill" style="width: 60%;"></div>
              </div>
            </div>
            <div class="sem-row">
              Semester 5
              <div class="progress-bar">
                <div class="progress-fill" style="width: 20%;"></div>
              </div>
            </div>
            <div class="sem-row">
              Semester 6
              <div class="progress-bar">
                <div class="progress-fill" style="width: 0%;"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>

</html>