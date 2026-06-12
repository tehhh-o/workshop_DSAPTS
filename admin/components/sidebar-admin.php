<aside class="main-sidebar main-rounded">
    <img src="../assets/imgs/dsapts-full.png" class="sidebar-logo" alt="">
    <h3 class="sidebar-title">Diploma Student Academic & Progress Tracking System</h3>

    <a class="sidebar-nav <?php echo $activePage === 'dashboard' ? 'sidebar-nav-active' : ''; ?>" href="dashboard-admin.php">
        <img src="../assets/icons/dashboard.png" alt="">
        <h3>Dashboard</h3>
    </a>
    <a class="sidebar-nav <?php echo $activePage === 'advisor' ? 'sidebar-nav-active' : ''; ?>" href="advisor.php">
        <img src="../assets/icons/employee.png" alt="">
        <h3>Advisor</h3>
    </a>
    <a class="sidebar-nav <?php echo $activePage === 'student' ? 'sidebar-nav-active' : ''; ?>" href="student.php">
        <img src="../assets/icons/student.png" alt="">
        <h3>Student</h3>
    </a>
    <a class="sidebar-nav <?php echo $activePage === 'admin' ? 'sidebar-nav-active' : ''; ?>" href="admin.php">
        <img src="../assets/icons/settings.png" alt="">
        <h3>Admin</h3>
    </a>
    <a class="sidebar-nav <?php echo $activePage === 'logs' ? 'sidebar-nav-active' : ''; ?>" href="admin-logs.php">
        <img src="../assets/icons/record.png" alt="">
        <h3>Logs</h3>
    </a>
    <a class="sidebar-nav <?php echo $activePage === 'profile' ? 'sidebar-nav-active' : ''; ?>" href="profile.php">
        <img src="../assets/icons/user.png" alt="">
        <h3>Profile</h3>
    </a>
    <a class="sidebar-nav <?php echo $activePage === 'settings' ? 'sidebar-nav-active' : ''; ?>" href="admin-settings.php">
        <img src="../assets/icons/settings.png" alt="">
        <h3>Settings</h3>
    </a>

    <a class="sidebar-nav sidebar-logout" href="../">
        <img src="../assets/icons/exit.png" alt="">
        <h3>Logout</h3>
    </a>
</aside>