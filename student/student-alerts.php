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

  $loginId = $_SESSION['uid'];
  $student = getStudentByLoginId($conn, $loginId);

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
    <h1 class="content-title">Alert</h1>

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
</body>

</html>
