<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advisor Dashboard</title> 
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/advisor.css">
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
    <?php
    session_start();
    $activePage = 'dashboard';
    include("components/sidebar-advisor.php");
    include("../models/functions.php");

    $students = getAdvisorStudents($conn, $_SESSION['user_id']);

    // --- CALCULATE SUMMARY STATS DYNAMICALLY ---
    $totalSupervised = count($students);
    $highRiskCount = 0;
    $deansListCount = 0;
    $muetPassedCount = 0;

    foreach ($students as $s) {
        $current_cgpa = isset($s['CGPA']) ? (float)$s['CGPA'] : 0.00;
        
        // Count High Risk (Probation: < 2.00)
        if ($current_cgpa < 2.00) {
            $highRiskCount++;
        }
        
        // Count Academic Excellence (Dean's List: >= 3.50)
        if ($current_cgpa >= 3.50) {
            $deansListCount++;
        }
        if ($s['muet_status'] == "Pass") {
            $muetPassedCount++;
        }
    }
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Dashboard</h1>
        <h3 class="content-welcome" style="margin-bottom: 25px;">Welcome, Advisor</h3>

        <div class="dashboard-summary-cards">
            
            <div class="stat-card" style="border-left: 5px solid #007bff;">
                <div class="card-text-head">Total Supervised</div>
                <div class="card-text-body"  style="color: #212529;"><?= $totalSupervised ?></div>
            </div>

            <div class="stat-card" style="border-left: 5px solid #dc3545;">
                <div class="card-text-head">High Risk (CGPA &lt; 2.00)</div>
                <div class="card-text-body" style="color: #dc3545;"><?= $highRiskCount ?></div>
            </div>

            <div class="stat-card" style="border-left: 5px solid #28a745;">
                <div class="card-text-head">Dean's List (CGPA &ge; 3.50)</div>
                <div class="card-text-body" style="color: #28a745;"><?= $deansListCount ?></div>
            </div>

            <div class="stat-card" style="border-left: 5px solid #7b00ff;">
                <div class="card-text-head">Muet Passed</div>
                <div class="card-text-body"  style="color: #212529;"><?=  $muetPassedCount ?></div>
            </div>
        </div>
    </table>
    </main>
</body>

</html>