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
        <form class="auth-card" onsubmit="return requestOTP(event);">
            <img src="../assets/imgs/dsapts-full.png" alt="" class="auth-logo">
            <h2>Find your Account</h2>

            <div class="auth-field">
                <label for="uid">Email or User ID</label>
                <input id="uid" required>
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