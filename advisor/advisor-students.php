</html>

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
    session_start();
    $activePage = 'students';
    include("components/sidebar-advisor.php");
    include("../models/functions.php");
    ?>

<?php
    $students = getAdvisorStudents($conn, $_SESSION['user_id']);
?>

<main class="main-content main-rounded">
    <h1 class="content-title">Student List</h1>

    <main class="content">

        <table>
            <thead>
                <tr>
                    <th class="name-col">Student Name</th>
                    <th>Muet Status</th>
                </tr>
            </thead>

            <tbody>
            <?php foreach ($students as $s): ?>
            <tr>
                <td class="name-col">
                    <a href="advisor-records.php?user_id=<?= $s['user_id'] ?>">
                <?= ($s['name']) ?>
                </td>

                <td>
                    <?= $s['muet_status'] ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</main>
</html>