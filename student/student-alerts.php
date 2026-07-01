<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alerts</title>
  <link rel="stylesheet" href="../style/layout.css">
  <link rel="stylesheet" href="../style/student.css">
  <link rel="stylesheet" href="../style/advisor.css">
  <link rel="stylesheet" href="../style/admin.css">
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
  include("../models/alert_model.php");

  $loginId = $_SESSION['uid'];
  $student = getStudentByLoginId($conn, $loginId);

  $refreshMessage = null;
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['refresh_alerts'])) {
    $refreshMessage = refreshAlert($conn);
  }

  if (!$student) {
    echo "<p style='color:red;'>Student record not found.</p>";
    exit();
  }

  $userId = $student['user_id'];

  $result = $conn->query("
    SELECT alert.*
    FROM alert
    WHERE alert.user_id = '$userId'
    ORDER BY alert.date_sent DESC
  ");
  $alerts = [];
  if ($result) {
    while ($row = $result->fetch_assoc()) {
      $alerts[] = $row;
    }
  }
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
      <table>
        <thead>
          <tr>
            <th class="name-col">Description</th>
            <th class="action">Alert Type</th>
            <th class="action">Alert Date</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($alerts)): ?>
            <tr>
              <td colspan="3" style="text-align:center;">No alerts found.</td>
            </tr>
          <?php else: ?>
            <?php foreach ($alerts as $a): ?>
              <tr>
                <td class="name-col">
                  <?php echo htmlspecialchars($student['name']); ?>
                  <br><small><?php echo htmlspecialchars($a['message']); ?></small>
                </td>
                <td><?php echo htmlspecialchars($a['alert_type']); ?></td>
                <td><?php echo date("F d Y", strtotime($a['date_sent'])); ?></td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </main>

  </main>
  <?php if ($refreshMessage !== null): ?>
    <script>
      alert(<?php echo json_encode($refreshMessage); ?>);
    </script>
  <?php endif; ?>
</body>

</html>