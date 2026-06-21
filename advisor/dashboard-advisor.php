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
    $activePage = 'dashboard'; // Make sure this matches your active link state
    include("components/sidebar-advisor.php");
    include("../models/functions.php");

    // Fetch the full student list belonging to this advisor session
    $students = getAdvisorStudents($conn, $_SESSION['user_id']);

    // --- CALCULATE SUMMARY STATS DYNAMICALLY ---
    $totalSupervised = count($students);
    $highRiskCount = 0;
    $deansListCount = 0;

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
    }
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Dashboard</h1>
        <h3 class="content-welcome" style="margin-bottom: 25px;">Welcome, Advisor</h3>

        <div class="dashboard-summary-cards" style="display: flex; gap: 20px; margin-bottom: 35px;">
            
            <div class="stat-card" style="flex: 1; padding: 20px; background: #fff; border-radius: 8px; border-left: 5px solid #007bff; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                <div style="font-size: 14px; color: #6c757d; font-weight: 600; text-transform: uppercase;">Total Supervised</div>
                <div style="font-size: 28px; font-weight: bold; color: #212529; margin-top: 5px;"><?= $totalSupervised ?></div>
            </div>

            <div class="stat-card" style="flex: 1; padding: 20px; background: #fff; border-radius: 8px; border-left: 5px solid #dc3545; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                <div style="font-size: 14px; color: #6c757d; font-weight: 600; text-transform: uppercase;">High Risk (CGPA &lt; 2.00)</div>
                <div style="font-size: 28px; font-weight: bold; color: #dc3545; margin-top: 5px;"><?= $highRiskCount ?></div>
            </div>

            <div class="stat-card" style="flex: 1; padding: 20px; background: #fff; border-radius: 8px; border-left: 5px solid #28a745; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                <div style="font-size: 14px; color: #6c757d; font-weight: 600; text-transform: uppercase;">Dean's List (CGPA &ge; 3.50)</div>
                <div style="font-size: 28px; font-weight: bold; color: #28a745; margin-top: 5px;"><?= $deansListCount ?></div>
            </div>

        </div>
    </main>
</body>

</html>