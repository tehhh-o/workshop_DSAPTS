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
    $activePage = 'dashboard';
    include("components/sidebar-advisor.php")
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Dashboard</h1>
        <h3 class="content-welcome">Welcome, Advisor</h3>

<div class="dashboard-grid">
  <div class="card-border">
    <div class="dashboard-card-advisor">
        <h2>High-Risk Student</h2>

        <div class="student-item">
            <img src="../assets/icons/user.png" alt="">
            <span>Hakim</span>
        </div>

        <div class="student-item">
            <img src="../assets/icons/user.png" alt="">
            <span>Halim</span>
        </div>
                <div class="student-item">
            <img src="../assets/icons/user.png" alt="">
            <span>Halim</span>
        </div>
                <div class="student-item">
            <img src="../assets/icons/user.png" alt="">
            <span>Halim</span>
        </div>
    </div>
</div>

  <div class="card-border">
    <div class="dashboard-card-advisor">
        <h2>Semester Progress</h2>

        <select class="student-select">
            <option>Ahmad bin Ali</option>
        </select>

        <div class="semester">
            <label>Semester 1</label>
            <div class="progress-bar">
                <div class="progress-fill" style="width:100%"></div>
            </div>
        </div>

        <div class="semester">
            <label>Semester 2</label>
            <div class="progress-bar">
                <div class="progress-fill" style="width:100%"></div>
            </div>
        </div>

        <div class="semester">
            <label>Semester 3</label>
            <div class="progress-bar">
                <div class="progress-fill" style="width:100%"></div>
            </div>
        </div>

        <div class="semester">
            <label>Semester 4</label>
            <div class="progress-bar">
                <div class="progress-fill" style="width:75%"></div>
            </div>
        </div>

        <div class="semester">
            <label>Semester 5</label>
            <div class="progress-bar">
                <div class="progress-fill" style="width:0%"></div>
            </div>
        </div>
    </div>
</div>

</div>
</body>

</html>