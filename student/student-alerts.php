
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alerts</title>
  <link rel="stylesheet" href="../style/layout.css">
  <link rel="stylesheet" href="../style/student.css">
  <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
  <?php
  session_start();
  if (!isset($_SESSION['uid'])) {
      header("Location: ../index.php");
      exit();
  }
  $activePage = 'alerts';
  include("components/sidebar-student.php");
  include("../models/functions.php");

  $loginId = $_SESSION['uid'];
  $student = getStudentByLoginId($conn, $loginId);

  if (!$student) {
      echo "<p style='color:red;'>Student record not found.</p>";
      exit();
  }

  $userId = $student['user_id'];
  $alerts = getAlertsByUser($conn, $userId);
  ?>

  <main class="main-content main-rounded">
    <h1 class="content-title">Alerts</h1>
    <div class="table-container">

      <div class="grid-row table-header">
        <div class="column-description">Description</div>
        <div class="column-type">Alert Type</div>
        <div class="column-date">Date</div>
      </div>

      <?php if (empty($alerts)): ?>
        <div class="grid-row table-row">
          <div class="column-name" style="grid-column: span 3; text-align: center;">No alerts found.</div>
        </div>
      <?php else: ?>
        <?php foreach ($alerts as $alert): ?>
          <div class="grid-row table-row">
            <div class="column-name">
              <span class="description"><?php echo htmlspecialchars($alert['message']); ?></span>
            </div>
            <div class="column-type"><?php echo htmlspecialchars($alert['alert_type']); ?></div>
            <div class="column-date"><?php echo htmlspecialchars($alert['date_sent']); ?></div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

    </div>
  </main>
</body>

</html>
