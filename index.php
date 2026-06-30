<?php
session_start();
include("database/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $uid = mysqli_real_escape_string($conn, $_POST["uid"]);
    $pwd = $_POST["pwd"]; 

    $sql = "SELECT * FROM user WHERE login_id='$uid'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($pwd, $user['password'])) {
            
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['uid'] = $user['login_id'];
            $_SESSION['name'] = $user['name'];

            if (str_starts_with($uid, 'A')) {
                header("Location: admin/dashboard-admin.php");
            } elseif (str_starts_with($uid, 'M')) {
                header("Location: advisor/dashboard-advisor.php");
            } else {
                header("Location: student/dashboard-student.php");
            }
            exit();

        } else {
            echo "<script>alert('Wrong user ID or password');</script>";
        }
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
                <a href="index.php" style="border-bottom: 2px solid #003087;">Home</a>
                <a href="about.php">About Us</a>
                <a href="contact.php">Contact Us</a>
     
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