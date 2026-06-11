
<aside class="main-sidebar main-rounded">
    <img src="../assets/imgs/dsapts-full.png" class="sidebar-logo" alt="">
    <h3 class="sidebar-title">Diploma Student Academic & Progress Tracking System</h3>

    <a class="sidebar-nav <?php echo $activePage === 'dashboard' ? 'sidebar-nav-active' : ''; ?>" href="dashboard-advisor.php">
        <img src="../assets/icons/dashboard.png" alt="">
        <h3>Dashboard</h3>
    </a>
    <a class="sidebar-nav <?php echo $activePage === 'records' ? 'sidebar-nav-active' : ''; ?>" href="advisor-records.php">
        <img src="../assets/icons/record.png" alt="">
        <h3>Records</h3>
    </a>
    <a class="sidebar-nav <?php echo $activePage === 'alert' ? 'sidebar-nav-active' : ''; ?>" href="advisor-alerts.php">
        <img src="../assets/icons/alert.png" alt="">
        <h3>Alerts</h3>
    </a>
    <a class="sidebar-nav <?php echo $activePage === 'student' ? 'sidebar-nav-active' : ''; ?>" href="">
        <img src="../assets/icons/student.png" alt="">
        <h3>Students</h3>
    </a>
    <a class="sidebar-nav <?php echo $activePage === 'reports' ? 'sidebar-nav-active' : ''; ?>" href="">
        <img src="../assets/icons/report.png" alt="">
        <h3>Reports</h3>
    </a>
    <a class="sidebar-nav <?php echo $activePage === 'profile' ? 'sidebar-nav-active' : ''; ?>" href="">
        <img src="../assets/icons/user.png" alt="">
        <h3>Profile</h3>
    </a>
    <a class="sidebar-nav <?php echo $activePage === 'settings' ? 'sidebar-nav-active' : ''; ?>" href="">
        <img src="../assets/icons/settings.png" alt="">
        <h3>Settings</h3>
    </a>

    <a class="sidebar-nav sidebar-logout" href="../">
    <img src="../assets/icons/exit.png" alt="" style="transform: scaleX(-1);">
        <h3>Logout</h3>
    </a>
</aside>