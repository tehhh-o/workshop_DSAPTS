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
    session_start();
    $activePage = 'alert';
    include("components/sidebar-advisor.php");
    include("../models/functions.php");
    ?>

    <?php
    $alert = getAdvisorAlerts($conn, $_SESSION['user_id']);
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Alert</h1>

        <main class="content">
            </form>
            </div>
            <table>
                <thead>
                    <tr>
                        <th class="name-col">Student Name</th>
                        <th class="action">Alert Type</th>
                        <th class="action">Alert Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alert as $a): ?>
                        <tr>
                            <td class="name-col"><?= $a['name'] ?>
                                <br> <small><?= $a['message'] ?></small>
                            </td>

                            <td>
                                <?= $a['alert_type'] ?>
                            </td>

                            <td>
                                <?= date("F d Y", strtotime($a['date_sent'])) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
    </main>
</body>

</html>