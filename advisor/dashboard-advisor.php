<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advisor Dashboard</title>

    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/advisor.css">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/student.css">
</head>

<body class="page-body main-gradient-bg">

    <?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: ../index.php");
        exit();
    }

    $activePage = 'dashboard';

    include("components/sidebar-advisor.php");
    include("../models/functions.php");

    $students = getAdvisorStudents($conn, $_SESSION['user_id']);

    $totalSupervised = count($students);
    $highRiskCount = 0;
    $deansListCount = 0;
    $muetPassedCount = 0;

    foreach ($students as $student) {

        $currentCGPA = isset($student['CGPA'])
            ? (float)$student['CGPA']
            : 0.00;

        if ($currentCGPA < 2.00) {
            $highRiskCount++;
        }

        if ($currentCGPA >= 3.50) {
            $deansListCount++;
        }

        if (isset($student['muet_status']) && $student['muet_status'] === 'Pass') {
            $muetPassedCount++;
        }
    }


    $studentNames = [];
    $studentCGPAs = [];

    foreach ($students as $student) {

        $studentNames[] =
            $student['student_name']
            ?? $student['name']
            ?? 'Student';

        $studentCGPAs[] =
            isset($student['CGPA'])
            ? (float)$student['CGPA']
            : 0;
    }

    $studentNamesJson = json_encode($studentNames);
    $studentCGPAsJson = json_encode($studentCGPAs);

    ?>

    <main class="main-content main-rounded">

        <h1 class="content-title">Dashboard</h1>
        <h3 class="content-welcome" style="margin-bottom:25px;">
            Welcome, <?= $_SESSION['name'] ?>
        </h3>

        <div class="dashboard-summary-cards">

            <div class="stat-card" style="border-left:5px solid #007bff;">
                <div class="card-text-head">Total Supervised</div>
                <div class="card-text-body" style="color:#212529;">
                    <?= $totalSupervised ?>
                </div>
            </div>

            <div class="stat-card" style="border-left:5px solid #dc3545;">
                <div class="card-text-head">
                    High Risk (CGPA &lt; 2.00)
                </div>
                <div class="card-text-body" style="color:#dc3545;">
                    <?= $highRiskCount ?>
                </div>
            </div>

            <div class="stat-card" style="border-left:5px solid #28a745;">
                <div class="card-text-head">
                    Dean's List (CGPA &ge; 3.50)
                </div>
                <div class="card-text-body" style="color:#28a745;">
                    <?= $deansListCount ?>
                </div>
            </div>

            <div class="stat-card" style="border-left:5px solid #7b00ff;">
                <div class="card-text-head">MUET Passed</div>
                <div class="card-text-body" style="color:#212529;">
                    <?= $muetPassedCount ?>
                </div>
            </div>

        </div>

        <div class="chart-card">
            <h3>Student CGPA Overview</h3>
            <div class="chart-wrapper">
                <canvas id="cgpaChart"></canvas>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const studentNames = <?= $studentNamesJson ?>;
        const studentCGPAs = <?= $studentCGPAsJson ?>;

        const ctx = document.getElementById('cgpaChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: studentNames,
                datasets: [{
                    label: 'CGPA',
                    data: studentCGPAs,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 4.0
                    }
                }
            }
        });
    </script>

</body>

</html>