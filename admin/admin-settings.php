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
    $activePage = 'settings';
    include("components/sidebar-admin.php");
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Settings</h1>
        <h3 class="content-welcome">Academic Configuration</h3>

        <div class="panel">
            <h3>Semester Settings</h3>
            <div class="input-field">
                <h4>Max Credit Per Semester</h4>
                <input type="number">
            </div>
            <div class="input-field">
                <h4>Min Credit Per Semester</h4>
                <input type="number">
            </div>
            <div class="input-field">
                <h4>Current Academic Year</h4>
                <input type="number">
            </div>
            <div class="input-field">
                <h4>Current Semester</h4>
                <input type="number">
            </div>
        </div>

        <div class="panel">
            <h3>Graduation Requirements</h3>
            <div class="input-field">
                <h4>Graduation Credit Requirement</h4>
                <input type="number">
            </div>
            <div class="input-field">
                <h4>Minimum CGPA for Graduation</h4>
                <input type="number" step="0.01" min="0" max="4">
            </div>
        </div>

        <div class="panel">
            <h3>Grading System</h3>
            <div class="input-field">
                <h4>Passing Grade</h4>
                <input type="number" min="0" max="4">
            </div>
        </div>
    </main>
</body>

</html>