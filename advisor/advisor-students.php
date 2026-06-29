<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title> <!-- change this title -->
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/advisor.css">
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
    <?php
    session_start();
    $activePage = 'students';
    include("components/sidebar-advisor.php");
    include("../models/functions.php");

    $students = getAdvisorStudents($conn, $_SESSION['user_id']);
    ?>

    <main class="main-content main-rounded">
        <h2 class="content-title" style="margin-top: 10px; margin-bottom: 15px;">Student List</h2>

        <div class="content">
            <table class="table-student">
                <thead>
                    <tr>
                        <th class="name-col" style="padding: 12px; text-align: left;">Student Name</th>
                        <th style="padding: 12px; text-align: center; width: 20%;">Muet Status</th>
                        <th style="padding: 12px; text-align: center; width: 15%;">CGPA</th>
                        <th style="padding: 12px; text-align: center; width: 15%;">View Record</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (empty($students)): ?>
                        <tr>
                            <td colspan="4">No supervised students assigned to your record.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($students as $s): ?>
                            <?php $student_cgpa = isset($s['CGPA']) ? (float)$s['CGPA'] : 0.00; ?>
                            <tr style="border-bottom: 1px solid #dee2e6;">

                                <td class="name-col">
                                    <?= htmlspecialchars($s['name']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($s['muet_status']) ?>
                                </td>

                                <td>
                                    <?php if ($student_cgpa < 2.00): ?>
                                        <span style="color: #dc3545; font-weight: bold;">⚠️ <?= number_format($student_cgpa, 2) ?></span>
                                    <?php elseif ($student_cgpa >= 3.50): ?>
                                        <span style="color: #28a745; font-weight: bold;">🌟 <?= number_format($student_cgpa, 2) ?></span>
                                    <?php else: ?>
                                        <?= number_format($student_cgpa, 2) ?>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <a href="advisor-records.php?user_id=<?= $s['user_id'] ?>">
                                        <img src="../assets/icons/record.png" alt="View Record" style="width: 22px; height: 22px; cursor: pointer; vertical-align: middle;">
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
    </main>
</body>

</html>