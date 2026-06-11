<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title> <!-- change this title -->
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/advisor.css">
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
    <?php
    $activePage = 'alert';
    include("components/sidebar-advisor.php")
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Alerts</h1>

<div class="dashboard-grid">
  <div class="card-border">
    <div class="dashboard-card-advisor">

        <div class="student-item">
            <img src="../assets/icons/user.png" alt="">
            <span>Hakim</span>
        </div>

        <div class="student-item">
            <img src="../assets/icons/user.png" alt="">
            <span>Halim</span>
        </div>
</div>
</div>

</div>
</body>

</html>