<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title> <!-- change this title -->
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
    <?php
    $activePage = 'dashboard';
    include("sidebar-dev.php");
    include("../models/functions.php");

    $studentCount = getCount($conn, "student");
    $adminCount = getCount($conn, "admin");
    $advisorCount = getCount($conn, "advisor");
    $programCount = getCount($conn, "program");
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Dashboard</h1>
        <h3 class="content-welcome">Welcome, Admin</h3>

        <div class="stats">
            <div class="stat-card">
                <div class="stat-num"><?php echo ($studentCount); ?></div>
                <div class="stat-label">Total Students</div>
            </div>
            <div class="stat-card">
                <div class="stat-num"><?php echo ($advisorCount); ?></div>
                <div class="stat-label">Advisors</div>
            </div>
            <div class="stat-card">
                <div class="stat-num"><?php echo ($adminCount); ?></div>
                <div class="stat-label">Admins</div>
            </div>
            <div class="stat-card">
                <div class="stat-num"><?php echo ($programCount); ?></div>
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
</body>

</html>