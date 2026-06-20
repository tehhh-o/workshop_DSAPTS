<?php
// session_start();

// if (isset($_SESSION['uid'])) {
//     echo "Logged in as: " . $_SESSION['uid'];
// } else {
//     echo "Not logged in";
// }

// session_start();

// // remove all session variables
// session_unset();

// // destroy the session
// session_destroy();
?>

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
    include("components/sidebar-admin.php");
    include("../models/functions.php");

    $studentCount = getCount($conn, "student");
    $adminCount = getCount($conn, "admin");
    $advisorCount = getCount($conn, "advisor");
    $alertCount = getCount($conn, "alert");

    $recentAlerts = getRecentAlerts($conn);
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
                <div class="stat-label">Total Advisors</div>
            </div>
            <div class="stat-card">
                <div class="stat-num"><?php echo ($adminCount); ?></div>
                <div class="stat-label">Total Admins</div>
            </div>
            <div class="stat-card">
                <div class="stat-num"><?php echo ($alertCount); ?></div>
                <div class="stat-label">Total Alerts</div>
            </div>
        </div>
        </div>
        <div class="panel">
            <h3>Recent Alerts Activity</h3>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Alert Type</th>
                        <th>Student</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recentAlerts as $a): ?>
                        <tr>
                            <td>
                                <?= date("F d Y", strtotime($a['date_sent'])) ?>
                            </td>

                            <td>
                                <?= $a['alert_type'] ?>
                            </td>

                            <td>
                                <?= $a['name'] ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>