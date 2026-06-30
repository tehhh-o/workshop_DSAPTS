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
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: ../index.php");
        exit();
    }

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
        <h3 class="content-welcome">Welcome, <?= $_SESSION['name'] ?></h3>

        <div class="dashboard-summary-cards">
            <div class="stat-card" style="border-left:5px solid #007bff;">
                <div class="card-text-head">Total Students</div>
                <div class="card-text-body" style="color:#212529;">
                    <?= $studentCount ?>
                </div>
            </div>
            <div class="stat-card" style="border-left:5px solid #dc3545;">
                <div class="card-text-head">Total Advisors</div>
                <div class="card-text-body" style="color:#212529;">
                    <?= $advisorCount ?>
                </div>
            </div>
            <div class="stat-card" style="border-left:5px solid #28a745;">
                <div class="card-text-head">Total Admins</div>
                <div class="card-text-body" style="color:#212529;">
                    <?= $adminCount ?>
                </div>
            </div>
            <div class="stat-card" style="border-left:5px solid #7b00ff;">
                <div class="card-text-head">Total Alerts</div>
                <div class="card-text-body" style="color:#212529;">
                    <?= $alertCount ?>
                </div>
            </div>
        </div>

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

    </main>
</body>

</html>