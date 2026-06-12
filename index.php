<?php
include 'auth/login-validation.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    if (isset($users[$uid]) && $users[$uid] === $pwd) {
    
        if ($uid == "A") {
            header("Location: admin/dashboard-admin.php");
        } elseif ($uid == "M") {
            header("Location: advisor/dashboard-advisor.php");
        } else {
            header("Location: student/dashboard-student.php");
        }
        exit();
    } else {
        echo "<script>alert('Wrong user ID or password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forget Password</title>
    <link rel="stylesheet" href="style/layout.css">
    <link rel="stylesheet" href="style/auth.css">
</head>

<body class="page-body">

    <aside class="auth-left"></aside>

    <main class="auth-right">
        <form class="auth-card" method="POST" action="index.php">


            <nav class="nav-links">
                <a href="auth/forget-password.php">About Us</a>
                <a href="auth/forget-password.php">Contact Us</a>
                <a href="auth/forget-password.php">Login</a>
            </nav>

            <img src="assets/imgs/dsapts-full.png" alt="" class="auth-logo">

            <div class="auth-field">
                <label for="uid">User ID</label>
                <input id="uid" name="uid" required>
            </div>

            <div class="auth-field">
                <label for="pwd">Password</label>
                <div class="password-wrapper">
                    <input type="password" id="pwd" name="pwd">
                    <img class="toggle-password" src="assets/icons/eye.png">
                </div>
            </div>

            <button class="auth-btn" type="submit">Login Now</button>

            <nav class="auth-links">
                <p></p>
                <a href="auth/forget-password.php">Forget Password?</a>
            </nav>
        </form>
    </main>

    <script src="js/auth.js"></script>
</body>

</html>