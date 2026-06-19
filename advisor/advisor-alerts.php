<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alerts</title> <!-- change this title -->
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/advisor.css">
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
    <?php
    $activePage = 'alert';
    include("components/sidebar-advisor.php");
    include("../models/functions.php");
    $query = "
    SELECT alert.*, user.name
    FROM alert
    JOIN user ON alert.user_id = user.user_id
    ORDER BY alert.date_sent DESC
    ";

    $logs = mysqli_query($conn, $query);
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Alerts</h1>
<div class="table-container">

<div class="grid-row table-header">
    <div class="column-name">Student Name</div>
    <div class="column-type">Alert Type</div>
    <div class="column-date">Date</div>
</div>

<?php while($row = mysqli_fetch_assoc($logs)): ?>

<div class="grid-row table-row">

    <div class="column-name">
        <span><?php echo $row['name']; ?></span>
        <span class="description">
            <?php echo $row['message']; ?>
        </span>
    </div>

    <div class="column-type">
        <?php echo $row['alert_type']; ?>
    </div>

    <div class="column-date">
        <?php echo date("F d Y", strtotime($row['date_sent'])); ?>
    </div>

</div>

<?php endwhile; ?>

</div>
    </main>
</body>

</html>