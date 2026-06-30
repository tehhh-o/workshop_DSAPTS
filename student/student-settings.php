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
  include("components/sidebar-student.php");
  include("../models/functions.php");

  $loginId = $_SESSION['uid'];
  $student = getStudentByLoginId($conn, $loginId);

  if (!$student) {
    echo "<p style='color:red;'>Student record not found.</p>";
    exit();
  }

  $userId = $student['user_id'];
  $successMsg = '';
  $errorMsg   = '';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $field = $_POST['field']  ?? '';
    $value = $_POST['value']  ?? '';

    $allowedFields = ['phone_number', 'email', 'address', 'muet_status' , 'plan_degree', 'preferred_degree_field'];
    if (in_array($field, $allowedFields) && $value !== '') {

      if ($field === 'muet_status') {
        $updated = $conn->query("UPDATE student SET muet_status = '$value' WHERE user_id = '$userId'");
      } elseif ($field === 'plan_degree') {
        $updated = $conn->query("UPDATE student SET plan_to_degree = '$value' WHERE user_id = '$userId'");
      } elseif ($field === 'preferred_degree_field') {
        $updated = $conn->query("UPDATE student SET preferred_degree_field = '$value' WHERE user_id = '$userId'");
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

      <form method="POST" action="student-settings.php">
        <input type="hidden" name="field" value="phone_number">
        <div class="input-field">
          <h4>Phone Number</h4>
          <div class="edit-field">
            <input type="text" name="value" value="<?php echo htmlspecialchars($student['phone_number'] ?? ''); ?>">
            <button type="submit" style="background:none;border:none;cursor:pointer;padding:0;">
              <img src="../assets/icons/edit.png" alt="Save">
            </button>
          </div>
        </div>
      </form>

      <form method="POST" action="student-settings.php">
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

      <form method="POST" action="student-settings.php">
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

      <form method="POST" action="student-settings.php">
        <input type="hidden" name="field" value="muet_status">
        <div class="input-field">
          <h4>Muet Status</h4>
          <div class="edit-field">
            <input type="text" name="value" value="<?php echo htmlspecialchars($student['muet_status'] ?? ''); ?>">
            <button type="submit" style="background:none;border:none;cursor:pointer;padding:0;">
              <img src="../assets/icons/edit.png" alt="Save">
            </button>
          </div>
        </div>
      </form>

      <form method="POST" action="student-settings.php">
        <input type="hidden" name="field" value="plan_degree">
        <div class="input-field">
          <h4>Plan to Degree</h4>
          <div class="edit-field" style="display: flex; align-items: center; gap: 10px;">
          
          <select name="value" style="width: 192px; height: 38px; padding: 6px 12px; border: 1px solid #ccc; border-radius: 6px; background-color: #fff5f5; font-size: 14px; color: #333; box-sizing: border-box;">
            <option value="Yes"<?php echo htmlspecialchars($student['plan_to_degree'] ?? '') === 'Yes' ? 'selected' : '' ?>>Yes</option>
            <option value="No" <?php echo htmlspecialchars($student['plan_to_degree'] ?? '') === 'No' ? 'selected' : '' ?>>No</option>
          </select>     
          
          <button type="submit" style="background:none; border:none; cursor:pointer; padding:0; display: flex; align-items: center;">
            <img src="../assets/icons/edit.png" alt="Save" style="width: 24px; height: 24px;">
          </button>
          
          </div> 
        </div>
       </form>

    <form method="POST" action="student-settings.php">
      <input type="hidden" name="field" value="preferred_degree_field">
      <div class="input-field">
        <h4>Preferred Degree Field</h4>
        <div class="edit-field" style="display: flex; align-items: center; gap: 10px;">
          
          <select name="value" style="width: 192px; height: 38px; padding: 3px 9px; border: 1px solid #ccc; border-radius: 6px; background-color: #fff5f5; font-size: 14px; color: #333; box-sizing: border-box;">
            <option value="Game Technology" <?php echo htmlspecialchars($student['preferred_degree_field'] ?? '') === 'Game Technology' ? 'selected' : '' ?>>Game Technology</option>
            <option value="Software Engineering" <?php echo htmlspecialchars($student['preferred_degree_field'] ?? '') === 'Software Engineering' ? 'selected' : '' ?>>Software Engineering</option>
            <option value="Artificial Intelligence" <?php echo htmlspecialchars($student['preferred_degree_field'] ?? '') === 'Artificial Intelligence' ? 'selected' : '' ?>>Artificial Intelligence</option>
            <option value="Interactive Media" <?php echo htmlspecialchars($student['preferred_degree_field'] ?? '') === 'Interactive Media' ? 'selected' : '' ?>>Interactive Media</option>
            <option value="Computer Networking" <?php echo htmlspecialchars($student['preferred_degree_field'] ?? '') === 'Computer Networking' ? 'selected' : '' ?>>Computer Networking</option>
            <option value="Cloud Computing" <?php echo htmlspecialchars($student['preferred_degree_field'] ?? '') === 'Cloud Computing' ? 'selected' : '' ?>>Cloud Computing</option>                    
            <option value="N/A" <?php echo htmlspecialchars($student['preferred_degree_field'] ?? '') === 'N/A' ? 'selected' : '' ?>>N/A</option>
          </select>
          
          <button type="submit" style="background:none; border:none; cursor:pointer; padding:0; display: flex; align-items: center;">
            <img src="../assets/icons/edit.png" alt="Save" style="width: 24px; height: 24px;">
          </button>
          
        </div>
      </div>
    </form>
        <div class="auth-links">
                <p></p>
                <a href="../auth/change-password.php">Change Password</a>
        </div>
    </div>
  </main>
</body>

</html>