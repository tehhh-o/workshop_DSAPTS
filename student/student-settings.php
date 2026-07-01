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

    $allowedFields = ['phone_number', 'email', 'address', 'muet_status', 'plan_degree', 'preferred_degree_field'];

    if (isset($_FILES['u_picture']) && $_FILES['u_picture']['error'] === 0) {
      $uploadDir = '../assets/imgs/profile/';
      $originalName = basename($_FILES['u_picture']['name']);
      $newFileName = uniqid('img_') . '_' . $originalName;
      $uploadPath = $uploadDir . $newFileName;

      if (move_uploaded_file($_FILES['u_picture']['tmp_name'], $uploadPath)) {
        if (!empty($student['profile_picture']) && file_exists($student['profile_picture'])) {
          unlink($student['profile_picture']);
        }

        $safeValue = $conn->real_escape_string($newFileName);
        $updated = $conn->query("
            UPDATE user
            SET profile_picture = '$uploadPath'
            WHERE user_id = '$userId'
        ");

        $successMsg = $updated ? 'Saved successfully.' : 'Save failed.';
        $student = getStudentByLoginId($conn, $loginId);
      } else {
        $errorMsg = 'Image upload failed.';
      }
    }

    if (in_array($field, $allowedFields) && $value !== '') {
      if ($field === 'muet_status') {
        $safeValue = $conn->real_escape_string($value);
        $updated = $conn->query("UPDATE student SET muet_status = '$safeValue' WHERE user_id = '$userId'");
      } elseif ($field === 'plan_degree') {
        $safeValue = $conn->real_escape_string($value);
        $updated = $conn->query("UPDATE student SET plan_to_degree = '$safeValue' WHERE user_id = '$userId'");
      } elseif ($field === 'preferred_degree_field') {
        $safeValue = $conn->real_escape_string($value);
        $updated = $conn->query("UPDATE student SET preferred_degree_field = '$safeValue' WHERE user_id = '$userId'");
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

    <div class="input-field" style="margin-top: 12px;">
      <h3 style="margin-right: 24px;">Student ID</h3>
      <input type="text" value="<?php echo htmlspecialchars($student['login_id']); ?>" disabled>
      <?php if (!empty($successMsg)): ?>
        <span class="status-msg" style="color: #155724; background-color: #d4edda; border: 1px solid #c3e6cb; padding: 6px 12px; border-radius: 4px; font-family: sans-serif; font-size: 14px; display: inline-flex; align-items: center; gap: 5px; margin-left: 5px;">
          ✓ <?php echo htmlspecialchars($successMsg); ?>
        </span>
      <?php endif; ?>

      <?php if (!empty($errorMsg)): ?>
        <span class="status-msg" style="color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 6px 12px; border-radius: 4px; font-family: sans-serif; font-size: 14px; display: inline-flex; align-items: center; gap: 5px; margin-left: 5px;">
          ⚠ <?php echo htmlspecialchars($errorMsg); ?>
        </span>
      <?php endif; ?>
    </div>

    <script>
      setTimeout(() => {
        const messages = document.querySelectorAll('.status-msg');
        messages.forEach(msg => {
          msg.style.opacity = '0';
          setTimeout(() => msg.remove(), 500);
        });
      }, 3000);
    </script>


    <div class="panel">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
        <h3 style="margin: 0;">Personal Info</h3>
        <button type="button" id="edit-btn" style="padding: 6px 14px; border-radius: 8px; cursor: pointer; background-color: #f0f0f0; border: 1px solid #ccc; color: #333; font-weight: bold;">
          Edit Profile
        </button>
      </div>

      <form id="settings-form" method="POST" action="student-settings.php" enctype="multipart/form-data">

        <input type="hidden" name="field" value="phone_number">

        <div class="input-field">
          <h4>Profile Picture</h4>
          <div class="edit-field">
            <input type="file" name="u_picture" class="toggle-input" accept="image/*" value="<?php echo htmlspecialchars($student['phone_number'] ?? ''); ?>" disabled>
          </div>
        </div>

        <div class="input-field">
          <h4>Phone Number</h4>
          <div class="edit-field">
            <input type="text" name="phone_number_val" class="toggle-input" value="<?php echo htmlspecialchars($student['phone_number'] ?? ''); ?>" disabled>
          </div>
        </div>

        <div class="input-field">
          <h4>Email</h4>
          <div class="edit-field">
            <input type="text" name="email_val" class="toggle-input" value="<?php echo htmlspecialchars($student['email'] ?? ''); ?>" disabled>
          </div>
        </div>

        <div class="input-field">
          <h4>Address</h4>
          <div class="edit-field">
            <input type="text" name="address_val" class="toggle-input" value="<?php echo htmlspecialchars($student['address'] ?? ''); ?>" disabled>
          </div>
        </div>

        <div class="input-field">
          <h4>Muet Status</h4>
          <div class="edit-field">
            <select name="muet_status_val" class="toggle-input" data-initial="<?php echo htmlspecialchars($student['muet_status'] ?? ''); ?>" style="width: 198px; height: 38px; padding: 6px 12px; border: 1px solid #ccc; border-radius: 6px; background-color: #fff5f5; font-size: 14px; box-sizing: border-box;" disabled>
              <option value="Pass" <?php echo htmlspecialchars($student['muet_status'] ?? '') === 'Pass' ? 'selected' : '' ?>>Pass</option>
              <option value="Failed" <?php echo htmlspecialchars($student['muet_status'] ?? '') === 'Failed' ? 'selected' : '' ?>>Failed</option>
              <option value="Not Taken" <?php echo htmlspecialchars($student['muet_status'] ?? '') === 'Not Taken' ? 'selected' : '' ?>>Not Taken</option>
            </select>
          </div>
        </div>

        <div class="input-field">
          <h4>Plan to Degree</h4>
          <div class="edit-field">
            <select name="plan_degree_val" class="toggle-input" data-initial="<?php echo htmlspecialchars($student['plan_to_degree'] ?? ''); ?>" style="width: 198px; height: 38px; padding: 6px 12px; border: 1px solid #ccc; border-radius: 6px; background-color: #fff5f5; font-size: 14px; box-sizing: border-box;" disabled>
              <option value="Yes" <?php echo htmlspecialchars($student['plan_to_degree'] ?? '') === 'Yes' ? 'selected' : '' ?>>Yes</option>
              <option value="No" <?php echo htmlspecialchars($student['plan_to_degree'] ?? '') === 'No' ? 'selected' : '' ?>>No</option>
            </select>
          </div>
        </div>

        <div class="input-field">
          <h4>Preferred Degree Field</h4>
          <div class="edit-field">
            <select name="preferred_degree_field_val" class="toggle-input" data-initial="<?php echo htmlspecialchars($student['preferred_degree_field'] ?? ''); ?>" style="width: 198px; height: 38px; padding: 3px 9px; border: 1px solid #ccc; border-radius: 6px; background-color: #fff5f5; font-size: 14px; box-sizing: border-box;" disabled>
              <option value="Game Technology" <?php echo htmlspecialchars($student['preferred_degree_field'] ?? '') === 'Game Technology' ? 'selected' : '' ?>>Game Technology</option>
              <option value="Software Engineering" <?php echo htmlspecialchars($student['preferred_degree_field'] ?? '') === 'Software Engineering' ? 'selected' : '' ?>>Software Engineering</option>
              <option value="Artificial Intelligence" <?php echo htmlspecialchars($student['preferred_degree_field'] ?? '') === 'Artificial Intelligence' ? 'selected' : '' ?>>Artificial Intelligence</option>
              <option value="Interactive Media" <?php echo htmlspecialchars($student['preferred_degree_field'] ?? '') === 'Interactive Media' ? 'selected' : '' ?>>Interactive Media</option>
              <option value="Computer Networking" <?php echo htmlspecialchars($student['preferred_degree_field'] ?? '') === 'Computer Networking' ? 'selected' : '' ?>>Computer Networking</option>
              <option value="Cloud Computing" <?php echo htmlspecialchars($student['preferred_degree_field'] ?? '') === 'Cloud Computing' ? 'selected' : '' ?>>Cloud Computing</option>
              <option value="N/A" <?php echo htmlspecialchars($student['preferred_degree_field'] ?? '') === 'N/A' ? 'selected' : '' ?>>N/A</option>
            </select>
          </div>
        </div>

        <input type="hidden" id="submit-field" name="field" value="">
        <input type="hidden" id="submit-value" name="value" value="">

        <div id="action-buttons" class="form-submit" style="margin-top: 20px; display: none;">
          <div style="display: flex; justify-content: flex-end; width: 100%; gap: 12px;">

            <button type="reset" id="cancel-btn" style="padding:10px 18px; border-radius:12px; cursor:pointer; background-color: #f0f0f0; border: 1px solid #ccc; color: #333;">
              Clear
            </button>

            <button type="submit" style="padding:10px 18px; border-radius:12px; cursor:pointer; background-color: #007bff; border: 1px solid #007bff; color: white;">
              Save Changes
            </button>
          </div>
        </div>
      </form>
      <div class="auth-links" style="padding:10px">
        <p></p>
        <a href="../auth/change-password.php">Change Password</a>
      </div>
    </div>
  </main>

  <script>
    const editBtn = document.getElementById('edit-btn');
    const actionButtons = document.getElementById('action-buttons');
    const inputs = document.querySelectorAll('.toggle-input');
    const cancelBtn = document.getElementById('cancel-btn');
    const form = document.getElementById('settings-form');

    editBtn.addEventListener('click', () => {
      inputs.forEach(input => {
        input.removeAttribute('disabled');
      });

      actionButtons.style.display = 'block';
      editBtn.style.display = 'none';
      inputs.style.color = "black";
    });

    cancelBtn.addEventListener('click', () => {
      setTimeout(() => {
        inputs.forEach(input => {
          input.setAttribute('disabled', 'true');
          input.style.color = "grey";
        });
        actionButtons.style.display = 'none';
        editBtn.style.display = 'block';
      }, 10);
    });


    form.addEventListener('submit', (e) => {
      let fieldToSave = '';
      let valueToSave = '';

      // NOTE: selectors below now correctly match <select> elements
      // where the underlying field is rendered as a dropdown.
      const fieldMappings = [{
          key: 'phone_number',
          selector: 'input[name="phone_number_val"]'
        },
        {
          key: 'email',
          selector: 'input[name="email_val"]'
        },
        {
          key: 'address',
          selector: 'input[name="address_val"]'
        },
        {
          key: 'muet_status',
          selector: 'select[name="muet_status_val"]'
        },
        {
          key: 'plan_degree',
          selector: 'select[name="plan_degree_val"]'
        },
        {
          key: 'preferred_degree_field',
          selector: 'select[name="preferred_degree_field_val"]'
        }
      ];

      for (let mapping of fieldMappings) {
        let el = form.querySelector(mapping.selector);
        if (!el) continue;

        // <select> elements have no native defaultValue, so we compare
        // against a data-initial attribute set from the server-rendered value.
        const originalValue = (el.tagName === 'SELECT') ? el.dataset.initial : el.defaultValue;

        if (el.value !== originalValue) {
          fieldToSave = mapping.key;
          valueToSave = el.value;
          break; // stop at the first real change so later fields can't overwrite it
        }
      }

      if (!fieldToSave) {
        fieldToSave = 'phone_number';
        valueToSave = form.querySelector('input[name="phone_number_val"]').value;
      }

      document.getElementById('submit-field').value = fieldToSave;
      document.getElementById('submit-value').value = valueToSave;
    });
  </script>
</body>

</html>