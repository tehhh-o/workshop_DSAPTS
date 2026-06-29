<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Logs</title> <!-- change this title -->
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
    <?php
    $activePage = 'logs';
    include("components/sidebar-admin.php");
    include("../models/functions.php");
    $logs = getAllAlerts($conn);
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Admin Logs</h1>
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

</body>

</html>