<?php
session_start();
include __DIR__ . '/../database/connection.php';

if (!isset($_SESSION['reset_login_id'])) {
    header("Location: forget-password.php");
    exit();
}

$session_uid = $_SESSION['reset_login_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $uid = mysqli_real_escape_string($conn, $session_uid);          
    $oldPwd = $_POST["old_pwd"];
    $newPwd = $_POST["new_pwd"];   
    $confirmPwd = $_POST["confirm_pwd"]; 

    $sql = "SELECT * FROM user WHERE login_id='$uid'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        echo "<script>alert('User ID not found');</script>";
    } else {
        $row = mysqli_fetch_assoc($result);

        if ($row['password'] !== $oldPwd) {
            echo "<script>alert('Old password incorrect');</script>";
        } 
    
        elseif ($newPwd !== $confirmPwd) {
            echo "<script>alert('New password and confirm password do not match');</script>";
        } else {
        
            $safeNewPwd = mysqli_real_escape_string($conn, $newPwd);
            $hashedPassword = password_hash($safeNewPwd, PASSWORD_DEFAULT);
            $update = "UPDATE user SET password='$hashedPassword' WHERE login_id='$uid'";
            
            if (mysqli_query($conn, $update)) {
                session_destroy();

                echo "<script>
                    alert('Password updated successfully');
                    window.location.href = '../index.php';
                </script>";
                exit();
            } else {
                echo "<script>alert('Error updating password');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forget Password</title>
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/auth.css">
</head>

<body class="page-body">

    <aside class="auth-left auth-gradient-bg">
        <img src="../assets/imgs/shield.png" alt="" height="200px">
        <h2>Forget Password?</h2>
        <p>Identify your account and reset your password securely.</p>
    </aside>

    <main class="auth-right">
        <form class="auth-card" method="POST" action="forget-password-reset.php">
            <img src="../assets/imgs/dsapts-full.png" alt="" class="auth-logo">
            <h2>Reset Password</h2>

            <div class="auth-field">
                <label for="uid">User ID</label>
                <input id="uid" name="uid" value="<?php echo htmlspecialchars($session_uid); ?>" readonly style="background-color: #e9ecef; cursor: not-allowed;">
            </div>

            <div class="auth-field">
                <label for="old_pwd">Old Password</label>
                <input type="password" id="old_pwd" name="old_pwd" required>
            </div>

            <div class="auth-field">
                <label for="new_pwd">New Password</label>
                <input type="password" id="new_pwd" name="new_pwd" required>
            </div>

            <div class="auth-field">
                <label for="confirm_pwd">Re-enter Password</label>
                <input type="password" id="confirm_pwd" name="confirm_pwd" required>
            </div>

            <button class="auth-btn" type="submit">Confirm</button>
        </form>
    </main>
    <script src="../js/auth.js"></script>
</body>

</html>