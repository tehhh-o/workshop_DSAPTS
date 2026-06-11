<?php
include 'login-validation.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uid = $_POST["uid"];          
    $oldPwd = $_POST["old_pwd"];   
    $newPwd = $_POST["new_pwd"];   
    $confirmPwd = $_POST["confirm_pwd"]; 

    if (!isset($users[$uid])) {
        echo "<script>alert('User ID not found');</script>";
    } elseif ($users[$uid] !== $oldPwd) {
        echo "<script>alert('Old password incorrect');</script>";
    } elseif ($newPwd !== $confirmPwd) {
        echo "<script>alert('New password and confirm password do not match');</script>";
    } else {
     
        $users[$uid] = $newPwd;
        echo "<script>alert('Password updated successfully');</script>";
        header("Location: ../index.php");
        exit();
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
        <input id="uid" name="uid" required>
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