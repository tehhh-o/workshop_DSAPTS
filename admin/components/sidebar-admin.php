<aside class="sidebar">
    <div class="logo">
        <div class="logo-box">
            <img src="../assets/imgs/utem.png" class="topbar-logo">
        </div>
        <div class="logo-sub"></div>
    </div>
    <nav class="nav">
        <?php $activePage = $activePage ?? ''; ?>
        <a class="<?php echo $activePage === 'dashboard' ? 'active' : ''; ?>" href="dashboard-admin.php">
            <span class="ico">🏠</span>Dashboard
        </a>
        <a class="<?php echo $activePage === 'advisor' ? 'active' : ''; ?>" href="advisor.php">
            <span class="ico">👨‍💼</span>Advisor
        </a>
        <a class="<?php echo $activePage === 'student' ? 'active' : ''; ?>" href="student.php">
            <span class="ico">🎓</span>Student
        </a>
        <a class="<?php echo $activePage === 'admin' ? 'active' : ''; ?>" href="admin.php">
            <span class="ico">⚙️</span>Admin
        </a>
        <a class="<?php echo $activePage === 'profile' ? 'active' : ''; ?>" href="admin-profile.php">
            <span class="ico">👤</span>Profile
        </a>
    </nav>
    <button class="logout" onclick="location.href='../index.php'">Log out</button>
</aside>