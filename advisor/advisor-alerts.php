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
    include("../models/alert_model.php");

    $successMsg = '';
    $errorMsg = '';
    $refreshMessage = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['refresh_alerts'])) {
        $refreshMessage = refreshAlert($conn);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_alert_id'])) {
        $alertId = $_POST['send_alert_id'];
        $userId  = $_POST['send_user_id'];
        $name    = $_POST['send_name'];
        $message = $_POST['send_message'];
        $alertType = $_POST['send_alert_type'];

        $student = getUserById($conn, "student", "student.user_id", $userId);

        if ($student && !empty($student['email'])) {
            include '../models/mail.php';
            $sent = sendMail(
                $student['email'],
                $alertType . " : " . $name,
                $message
            );

            if ($sent) {
                $successMsg = "Email sent to " . $student['email'] . " successfully.";
            } else {
                $errorMsg = "Failed to send email.";
            }
        } else {
            $errorMsg = "Could not find a valid email for this user.";
        }
    }

    ?>

    <?php
    $alert = getAdvisorAlerts($conn, $_SESSION['user_id']);
    ?>

    <main class="main-content main-rounded">
        <div class="title-row">
            <h1 class="content-title">Alert</h1>
            <form method="POST" style="display:inline;">
                <button type="submit" name="refresh_alerts" class="admin-btn" style="border:none; cursor:pointer;">
                    <span class="admin-icon"><img src="../assets/icons/refresh.png" alt="" style="height: 16px;"></span>
                    <span class="admin-text">Refresh Alerts</span>
                </button>
            </form>
        </div>

        <main class="content">
            <?php if ($successMsg): ?>
                <p style="color: green; margin-bottom: 8px;"><?php echo $successMsg; ?></p>
            <?php endif; ?>
            <?php if ($errorMsg): ?>
                <p style="color: red; margin-bottom: 8px;"><?php echo $errorMsg; ?></p>
            <?php endif; ?>
            </form>
            </div>
            <table class="table-student">
                <thead>
                    <tr>
                        <th class="name-col">Student Name</th>
                        <th class="action">Alert Type</th>
                        <th class="action">Alert Date</th>
                        <th class="action">Send Alert</th>
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

                            <td>
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="send_alert_id" value="<?= $a['alert_id'] ?>">
                                    <input type="hidden" name="send_alert_type" value="<?= $a['alert_type'] ?>">
                                    <input type="hidden" name="send_user_id" value="<?= $a['user_id'] ?>">
                                    <input type="hidden" name="send_name" value="<?= htmlspecialchars($a['name']) ?>">
                                    <input type="hidden" name="send_message" value="<?= htmlspecialchars($a['message']) ?>">
                                    <button type="submit" style="background:none;border:none;cursor:pointer;padding:0;">
                                        <img src="../assets/icons/send.png" alt="Send Alert" style="height: 24px;">
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
        <?php if ($refreshMessage !== null): ?>
            <script>
                alert(<?php echo json_encode($refreshMessage); ?>);
            </script>
        <?php endif; ?>
</body>

</html>