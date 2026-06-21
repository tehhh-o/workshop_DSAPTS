<?php
session_start(); 
include __DIR__ . '/../database/connection.php';
include __DIR__ . '/../models/mail.php'; 

function generateOTP() {
    return str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uid = mysqli_real_escape_string($conn, $_POST["uid"]);

    $sql = "SELECT * FROM user WHERE login_id='$uid' OR email='$uid' OR user_id='$uid'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        echo "<script>alert('User ID or Email not found');</script>";
    } else {
        $row = mysqli_fetch_assoc($result);
        $user_email = $row['email'];
        $login_id = $row['login_id'];

        $otp = generateOTP();

        $_SESSION['system_otp'] = $otp;
        $_SESSION['reset_login_id'] = $login_id;
        $_SESSION['reset_email'] = $user_email;

        $subject = "DSAPTS - Password Reset Request";
        $message = "Hello " . $row['name'] . ",<br><br>We received a request to reset the password for your account. Your 6-digit One-Time Password (OTP) is: <b>" . 
        $otp . "</b>.<br><br>Please do not share this code with anyone. If you did not request this change, you can safely ignore this email.";

       if (sendMail($user_email, $subject, $message)) {
            $em = explode("@", $user_email);
            $name = $em[0];
            $domain = $em[1];
            $length = strlen($name);

            if ($length <= 4) {
                $masked_name = substr($name, 0, 1) . str_repeat('*', $length - 1);
            } else {
                $masked_name = substr($name, 0, 3) . str_repeat('*', $length - 5) . substr($name, -2);
            }
            $masked_email = $masked_name . "@" . $domain;
    
            echo "<script>
                alert('OTP successfully sent to " . $masked_email . "');
                window.location.href = 'forget-password-otp.php';
            </script>";
            exit();
        } else {
            echo "<script>alert('Failed to send OTP. Please check your SMTP settings.');</script>";
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
        <form class="auth-card" method="POST" action="forget-password.php">

            <img src="../assets/imgs/dsapts-full.png" alt="" class="auth-logo">
            <h2>Find your Account</h2>

            <div class="auth-field">
                <label for="uid">Email or User ID</label>
                <input id="uid" name="uid" required>

            </div>

            <button class="auth-btn" type="submit">Send OTP</button>

            <nav class="auth-links">
                <a href="../">Back to Login</a>
                <a href="">Need More Help?</a>
            </nav>
        </form>

    </main>
    <script src="../js/auth.js"></script>
</body>

</html>