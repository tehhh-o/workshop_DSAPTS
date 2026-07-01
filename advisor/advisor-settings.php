<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/auth.css">
    <link rel="stylesheet" href="../style/styles.css">
    <style>
        .edit-field input:disabled {
            background-color: #f5f5f5;
            color: #888;
            cursor: not-allowed;
            border: 1px solid #ddd;
        }

        .edit-field input {
            background-color: #fff;
            color: #333;
            border: 1px solid #ccc;
            transition: all 0.3s ease;
        }
    </style>

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
    $advisor = getUserById($conn, "advisor", "advisor.user_id", $_SESSION['user_id']);

    if (!$advisor) {
        echo "<script>alert('Advisor record not found.');</script>";
        exit();
    }

    $userId = $advisor['user_id'];

    $successMsg = '';
    $errorMsg   = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $phone = $_POST['phone_number'] ?? '';
        $email = $_POST['email'] ?? '';
        $address = $_POST['address'] ?? '';


        if (isset($_FILES['u_picture']) && $_FILES['u_picture']['error'] === 0) {
            $uploadDir = '../assets/imgs/profile/';
            $originalName = basename($_FILES['u_picture']['name']);
            $newFileName = uniqid('img_') . '_' . $originalName;
            $uploadPath = $uploadDir . $newFileName;

            if (move_uploaded_file($_FILES['u_picture']['tmp_name'], $uploadPath)) {
                if (!empty($advisor['profile_picture']) && file_exists($advisor['profile_picture'])) {
                    unlink($advisor['profile_picture']);
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

        if ($phone !== '' && $email !== '' && $address !== '') {
            $u1 = updateUserField($conn, $userId, 'phone_number', $phone);
            $u2 = updateUserField($conn, $userId, 'email', $email);
            $u3 = updateUserField($conn, $userId, 'address', $address);

            if ($u1 && $u2 && $u3) {
                $successMsg = 'Saved successfully.';
            } else {
                $errorMsg = 'Some or all fields failed to save.';
            }
            $advisor = getUserById($conn, "advisor", "advisor.user_id", $_SESSION['user_id']);
        } else {
            $errorMsg = 'All fields are required.';
        }
    }
    ?>


    <main class="main-content main-rounded">
        <h1 class="content-title">Settings</h1>
        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">


        </div>
        <div class="input-field" style="margin-top: 12px;">
            <h3 style="margin-right: 24px;">Advisor ID</h3>
            <input type="text" value="<?php echo htmlspecialchars($advisor['login_id']); ?>" disabled>
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

            <form method="POST" action="advisor-settings.php" enctype="multipart/form-data">

                <div class="input-field">
                    <h4>Profile Picture</h4>
                    <div class="edit-field">
                        <input type="file" name="u_picture" class="toggle-input" accept="image/*" value="<?php echo htmlspecialchars($student['phone_number'] ?? ''); ?>" disabled>
                    </div>
                </div>

                <div class="input-field">
                    <h4>Phone Number</h4>
                    <div class="edit-field">
                        <input type="text" class="toggle-input" name="phone_number" value="<?php echo htmlspecialchars($advisor['phone_number'] ?? ''); ?>" disabled>
                    </div>
                </div>

                <div class="input-field">
                    <h4>Email</h4>
                    <div class="edit-field">
                        <input type="text" class="toggle-input" name="email" value="<?php echo htmlspecialchars($advisor['email'] ?? ''); ?>" disabled>
                    </div>
                </div>

                <div class="input-field">
                    <h4>Address</h4>
                    <div class="edit-field">
                        <input type="text" class="toggle-input" name="address" value="<?php echo htmlspecialchars($advisor['address'] ?? ''); ?>" disabled>
                    </div>
                </div>

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

        editBtn.addEventListener('click', () => {
            inputs.forEach(input => {
                input.removeAttribute('disabled');
            });
            actionButtons.style.display = 'block';
            editBtn.style.display = 'none';
        });

        cancelBtn.addEventListener('click', () => {
            setTimeout(() => {
                inputs.forEach(input => {
                    input.setAttribute('disabled', 'true');
                });
                actionButtons.style.display = 'none';
                editBtn.style.display = 'block';
            }, 10);
        });
    </script>
</body>

</html>