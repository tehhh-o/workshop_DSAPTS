<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard - UTeM</title>
  <link rel="stylesheet" href="../style/styles.css">
  <style>
    .stats {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 16px;
      margin-bottom: 24px;
    }

    .stat-card {
      background: #f4eefb;
      border: 1px solid #d6c9e6;
      border-radius: 8px;
      padding: 18px;
      text-align: center;
    }

    .stat-num {
      font-size: 32px;
      font-weight: bold;
      color: #1a3a8a;
    }

    .stat-label {
      font-size: 13px;
      color: #555;
      margin-top: 4px;
    }

    .panel {
      border: 1px solid #ccc;
      border-radius: 6px;
      padding: 16px;
    }

    .panel h3 {
      margin-bottom: 12px;
      font-size: 16px;
    }

    .welcome {
      background: #1a3a8a;
      color: #fff;
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 20px;
    }

    .welcome h2 {
      margin-bottom: 6px;
    }
  </style>
</head>

<body>
  <div class="app">
    <?php
    $activePage = 'dashboard';
    include("components/sidebar-admin.php");
    ?>

    <?php
    $pageTitle = 'Admin Dashboard';
    include("components/topbar-admin.php");
    ?>

    <main class="content">
      <div class="welcome">
        <h2>Welcome, Admin</h2>
        <p>Diploma Student Academic And Progress Tracking System</p>
      </div>
      <div class="stats">
        <div class="stat-card">
          <div class="stat-num">1,248</div>
          <div class="stat-label">Total Students</div>
        </div>
        <div class="stat-card">
          <div class="stat-num">52</div>
          <div class="stat-label">Advisors</div>
        </div>
        <div class="stat-card">
          <div class="stat-num">8</div>
          <div class="stat-label">Admins</div>
        </div>
        <div class="stat-card">
          <div class="stat-num">14</div>
          <div class="stat-label">Programs</div>
        </div>
      </div>
      <div class="panel">
        <h3>Recent System Activity</h3>
        <table>
          <thead>
            <tr>
              <th>Date</th>
              <th>Action</th>
              <th>Detail</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>2026-05-29</td>
              <td>New student registered</td>
              <td>S. Aminah added</td>
            </tr>
            <tr>
              <td>2026-05-29</td>
              <td>Advisor assigned</td>
              <td>Dr. Lee → 5 students</td>
            </tr>
            <tr>
              <td>2026-05-28</td>
              <td>Grades published</td>
              <td>Sem 2 2025/26</td>
            </tr>
            <tr>
              <td>2026-05-28</td>
              <td>Account updated</td>
              <td>Admin profile</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>

</html>