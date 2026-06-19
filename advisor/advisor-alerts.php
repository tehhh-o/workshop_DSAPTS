<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alerts</title> <!-- change this title -->
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/advisor.css">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/admin.css">
</head>

<body class="page-body main-gradient-bg">
    <?php
    $activePage = 'alerts';
    include("components/sidebar-advisor.php");
    include("../models/functions.php");
    ?>

<?php
    $logs = getAllAlerts($conn);
?>

<main class="main-content main-rounded">
    <h1 class="content-title">Alerts</h1>

    <main class="content">

        <table>
            <thead>
                <tr>
                    <th class="name-col">Student Name</th>
                    <th>Alert Type</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>
            <?php foreach ($logs as $log): ?>
            <tr>
                <td class="name-col">
                    <?= $log['name'] ?>
                    <br>
                    <small><?= $log['message'] ?></small>
                </td>

                <td>
                    <?= $log['alert_type'] ?>
                </td>

                <td>
                    <?= date("F d Y", strtotime($log['date_sent'])) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</main>
</html>