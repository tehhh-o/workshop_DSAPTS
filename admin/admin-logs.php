<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Logs</title>
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
    <?php
    session_start();
    if (!isset($_SESSION['uid'])) {
        header("Location: ../index.php");
        exit();
    }
    $activePage = 'logs';
    include("components/sidebar-admin.php");
    include("../models/functions.php");
    include("../models/alert_model.php");

    $refreshMessage = null;
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['refresh_alerts'])) {
        $refreshMessage = refreshAlert($conn);
    }

    $logs = getAllAlerts($conn);
    ?>
    <main class="main-content main-rounded">
        <div class="title-row">
            <h1 class="content-title">Admin Logs</h1>
            <form method="POST" style="display:inline;">
                <button type="submit" name="refresh_alerts" class="admin-btn" style="border:none; cursor:pointer;">
                    <span class="admin-icon"><img src="../assets/icons/refresh.png" alt="" style="height: 16px;"></span>
                    <span class="admin-text">Refresh Alerts</span>
                </button>
            </form>
        </div>

        <div class="content">
            <table>
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Action</th>
                        <th>Detail</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($logs as $a): ?>
                        <tr>
                            <td><?php echo $a['name']; ?></td>
                            <td><?php echo $a['message'] ?></td>
                            <td><?php echo $a['alert_type'] ?></td>
                            <td><?php echo $a['date_sent']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php if ($refreshMessage !== null): ?>
        <script>
            alert(<?php echo json_encode($refreshMessage); ?>);
        </script>
    <?php endif; ?>
</body>

</html>