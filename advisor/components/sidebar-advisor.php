 <aside class="sidebar">
     <div class="logo">
         <div class="logo-box">
            <img src="../assets/imgs/utem.png" class="topbar-logo">
         </div>
         <div class="logo-sub"></div>
     </div>
     <nav class="nav">
         <?php $activePage = $activePage ?? ''; ?>
         <a class="<?php echo $activePage === 'dashboard' ? 'active' : ''; ?>" href="dashboard-advisor.php">
             <span class="ico">🖥️</span>Dashboard
         </a>
         <a class="<?php echo $activePage === 'records' ? 'active' : ''; ?>" href="advisor-records.php">
             <span class="ico">📑</span>Records
         </a>
         <a class="<?php echo $activePage === 'alerts' ? 'active' : ''; ?>" href="advisor-alerts.php">
             <span class="ico">⚠️</span>Alerts
         </a>
         <a class="<?php echo $activePage === 'students' ? 'active' : ''; ?>" href="advisor-students.php">
             <span class="ico">🎓</span>Students
         </a>
         <a class="<?php echo $activePage === 'reports' ? 'active' : ''; ?>" href="advisor-reports.php">
             <span class="ico">📋</span>Reports
         </a>
         <a class="<?php echo $activePage === 'profile' ? 'active' : ''; ?>" href="advisor-profile.php">
             <span class="ico">👤</span>Profile
         </a>
     </nav>
     <button class="logout" onclick="location.href='../index.php'">Log out</button>
 </aside>