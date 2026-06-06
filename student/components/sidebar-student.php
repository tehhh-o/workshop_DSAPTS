  <aside class="sidebar">
      <div class="logo">
          <div class="logo-box">UTeM</div>
          <div class="logo-sub">UNIVERSITI TEKNIKAL MALAYSIA MELAKA</div>
      </div>
      <nav class="nav">
          <?php $activePage = $activePage ?? ''; ?>
          <a class="<?php echo $activePage === 'dashboard' ? 'active' : ''; ?>" href="dashboard-student.php">
              <span class="ico">🖥️</span>Dashboard
          </a>
          <a class="<?php echo $activePage === 'records' ? 'active' : ''; ?>" href="student-records.php">
              <span class="ico">📑</span>Records
          </a>
          <a class="<?php echo $activePage === 'alerts' ? 'active' : ''; ?>" href="student-alerts.php">
              <span class="ico">⚠️</span>Alerts
          </a>
          <a class="<?php echo $activePage === 'reports' ? 'active' : ''; ?>" href="student-reports.php">
              <span class="ico">📋</span>Reports
          </a>
          <a class="<?php echo $activePage === 'profile' ? 'active' : ''; ?>" href="student-profile.php">
              <span class="ico">👤</span>Profile
          </a>
      </nav>
      <button class="logout" onclick="location.href='../index.php'">Log out</button>
  </aside>