
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settings</title>
  <link rel="stylesheet" href="../style/layout.css">
  <link rel="stylesheet" href="../style/auth.css">
  <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
  <?php
  session_start();
  if (!isset($_SESSION['uid'])) {
      header("Location: ../index.php");
      exit();
  }
  $activePage = 'settings';
  include("components/sidebar-advisor.php");
  include("../models/functions.php");

  $loginId = $_SESSION['uid'];
  $advisor = getAdvisorByLoginId($conn, $loginId);

  if (!$advisor) {
      echo "<p style='color:red;'>Advisor record not found.</p>";
      exit();
  }

  $userId = $advisor['user_id'];

  
  $successMsg = '';
  $errorMsg   = '';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $field = $_POST['field']  ?? '';
      $value = $_POST['value']  ?? '';

      $allowedFields = ['phone', 'email', 'address'];

      if (in_array($field, $allowedFields) && $value !== '') {
          
          if ($field === 'muet_status') {
              $updated = $conn->query("UPDATE student SET muet_status = '$value' WHERE user_id = '$userId'");
          } else {
              $updated = updateUserField($conn, $userId, $field, $value);
          }
          $successMsg = $updated ? 'Saved successfully.' : 'Save failed.';
          
          $student = getStudentByLoginId($conn, $loginId);
      } else {
          $errorMsg = 'Invalid field or empty value.';
      }
  }
  ?>

  <main class="main-content main-rounded">
    <h1 class="content-title">Settings</h1>

    <?php if ($successMsg): ?>
      <p style="color: green; margin-bottom: 8px;"><?php echo $successMsg; ?></p>
    <?php endif; ?>
    <?php if ($errorMsg): ?>
      <p style="color: red; margin-bottom: 8px;"><?php echo $errorMsg; ?></p>
    <?php endif; ?>

    <div class="input-field" style="margin-top: 12px;">
      <h3 style="margin-right: 24px;">Student ID</h3>
      <input type="text" value="<?php echo htmlspecialchars($student['login_id']); ?>" disabled>
    </div>

    <div class="panel">
      <h3>Personal Info</h3>

      <!-- Phone -->
      <form method="POST" action="advisor-settings.php">
        <input type="hidden" name="field" value="phone">
        <div class="input-field">
          <h4>Phone Number</h4>
          <div class="edit-field">
            <input type="text" name="value" value="<?php echo htmlspecialchars($student['phone'] ?? ''); ?>">
            <button type="submit" style="background:none;border:none;cursor:pointer;padding:0;">
              <img src="../assets/icons/edit.png" alt="Save">
            </button>
          </div>
        </div>
      </form>

      <!-- Email -->
      <form method="POST" action="advisor-settings.php">
        <input type="hidden" name="field" value="email">
        <div class="input-field">
          <h4>Email</h4>
          <div class="edit-field">
            <input type="text" name="value" value="<?php echo htmlspecialchars($student['email'] ?? ''); ?>">
            <button type="submit" style="background:none;border:none;cursor:pointer;padding:0;">
              <img src="../assets/icons/edit.png" alt="Save">
            </button>
          </div>
        </div>
      </form>

      <!-- Address -->
      <form method="POST" action="advisor-settings.php">
        <input type="hidden" name="field" value="address">
        <div class="input-field">
          <h4>Address</h4>
          <div class="edit-field">
            <input type="text" name="value" value="<?php echo htmlspecialchars($student['address'] ?? ''); ?>">
            <button type="submit" style="background:none;border:none;cursor:pointer;padding:0;">
              <img src="../assets/icons/edit.png" alt="Save">
            </button>
          </div>
        </div>
      </form>

      <div class="auth-links">
        <p></p>
        <a href="">Change Password</a>
      </div>
    </div>

    <div class="panel">
      <h3>Theme</h3>
      <div class="input-field">
        <h4>Theme Mode</h4>
        <div class="theme-field">
          <div class="theme-mode">
            <img src="../assets/icons/moon.png" alt="">
            <h4>Dark</h4>
          </div>
          <div class="theme-mode active-theme">
            <img src="../assets/icons/sun.png" alt="">
            <h4>Light</h4>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>
