<?php
session_start();
include __DIR__ . '/../database/connection.php';

if (!isset($_SESSION['uid'])) {
    header("Location: ../index.php");
    exit();
}

$session_uid = $_SESSION['uid'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $uid = mysqli_real_escape_string($conn, $session_uid);          
    $oldPwd = $_POST["old_pwd"];
    $newPwd = $_POST["new_pwd"];   
    $confirmPwd = $_POST["confirm_pwd"]; 

    // Passowrd validation pattern:
    // ^(?=.*[A-Z])       -> Must contain at least one uppercase letter
    // (?=.*\d)           -> Must contain at least one digit
    // (?=.*[^A-Za-z0-9]) -> Must contain at least one special character/symbol
    // .{8,20}$           -> Must be between 8 and 20 characters long

    $passwordPattern = '/^(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,20}$/';

    $sql = "SELECT * FROM user WHERE login_id='$uid'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        echo "<script>alert('User ID not found');</script>";
    } else {
        $row = mysqli_fetch_assoc($result);

        $dbPassword = $row['password'];
        if (str_starts_with($dbPassword, '$2y$')) {
            $isOldPwdCorrect = password_verify($oldPwd, $dbPassword);
        } else {
            $isOldPwdCorrect = ($oldPwd === $dbPassword);
        }
    
        if (!$isOldPwdCorrect) {
            echo "<script>alert('Old password incorrect');</script>";
        } 
        elseif ($newPwd !== $confirmPwd) {
            echo "<script>alert('New password and confirm password do not match');</script>";
        } 
        elseif ($newPwd === $oldPwd) {
            echo "<script>alert('New password and old password cannot be the same');</script>";
        } 
        // Backend Validation Check
        elseif (!preg_match($passwordPattern, $newPwd)) {
            echo "<script>alert('Password must be 8-20 characters long, include at least 1 uppercase letter, 1 number, and 1 symbol.');</script>";
        } 
        else {
           
            $hashedPassword = password_hash($newPwd, PASSWORD_DEFAULT);
            $update = "UPDATE user SET password='$hashedPassword' WHERE login_id='$uid'";
            
            if (mysqli_query($conn, $update)) {
                
                if (str_starts_with($uid, 'A')) {
                    $redirectUrl = "../admin/admin-settings.php";
                } elseif (str_starts_with($uid, 'M')) {
                    $redirectUrl = "../advisor/advisor-settings.php";
                } else {
                    $redirectUrl = "../student/student-settings.php";
                }

                echo "<script>
                    alert('Password updated successfully');
                    window.location.href = '$redirectUrl';
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
    <title>Change Password</title>
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/auth.css">
</head>

<body class="page-body">

    <aside class="auth-left auth-gradient-bg">
        <img src="../assets/imgs/shield.png" alt="" height="200px">
        <h2>Change Password</h2>
        <p>Keep your account secure by updating your password regularly.</p>
    </aside>

    <main class="auth-right">
        <form class="auth-card" method="POST" action="change-password.php">
            <img src="../assets/imgs/dsapts-full.png" alt="" class="auth-logo">
            <h2>Change Password</h2>

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
                <input 
                    type="password" 
                    id="new_pwd" 
                    name="new_pwd" 
                    minlength="8"
                    maxlength="20"
                    pattern="^(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,20}$"
                    title="Must be between 8 and 20 characters, containing at least 1 uppercase letter, 1 number, and 1 special character."
                    required
                >
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