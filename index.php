<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - UTeM</title>
  <link rel="stylesheet" href="../style/styles.css">
  <style>
    body {
      background: #fff;
    }

    .login-wrap {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .login-card {
      width: 100%;
      max-width: 680px;
      border: 1px solid #888;
      background: #fff;
    }

    .login-head {
      display: flex;
      align-items: center;
      background: #cfcfcf;
      padding: 14px 20px;
      gap: 16px;
      border-bottom: 1px solid #888;
    }

    .login-head .logo-box {
      background: #fff;
      padding: 8px 12px;
      border: 1px solid #999;
    }

    .login-head h1 {
      flex: 1;
      text-align: center;
      font-size: 20px;
    }

    .login-body {
      padding: 28px 32px;
    }

    .login-body label {
      display: block;
      font-size: 18px;
      margin: 14px 0 6px;
    }

    .login-body .row {
      display: flex;
      gap: 8px;
      align-items: center;
      max-width: 380px;
    }

    .login-body input {
      flex: 1;
      padding: 8px 10px;
      background: #d9d9d9;
      border: 1px solid #999;
      font-size: 14px;
    }

    .login-body .eye {
      padding: 6px 10px;
      background: #eee;
      border: 1px solid #999;
      cursor: pointer;
    }

    .login-actions {
      display: flex;
      justify-content: space-between;
      align-items: flex-end;
      margin-top: 36px;
      padding: 0 8px 12px;
    }

    .login-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 8px 18px;
      border: 1px solid #555;
      background: #f2f2f2;
      cursor: pointer;
      font-size: 15px;
    }

    .forgot {
      color: #1a73e8;
      font-size: 13px;
      text-decoration: none;
    }

    .role-select {
      margin-top: 18px;
      max-width: 380px;
    }

    .role-select select {
      width: 100%;
      padding: 8px 10px;
      background: #d9d9d9;
      border: 1px solid #999;
      font-size: 14px;
    }

    .hint {
      font-size: 12px;
      color: #666;
      margin-top: 6px;
    }
  </style>
</head>

<body>
  <div class="login-wrap">
    <form class="login-card" onsubmit="return doLogin(event)">
      <div class="login-head">
        <div class="logo-box">
          UTeM
          <div class="logo-sub">UNIVERSITI TEKNIKAL MALAYSIA MELAKA</div>
        </div>
        <h1>Diploma Student Academic And Progress<br>Tracking System</h1>
      </div>
      <div class="login-body">
        <label for="uid">User ID</label>
        <div class="row">
          <input id="uid" required>
        </div>

        <label for="pwd">Password</label>
        <div class="row">
          <input id="pwd" type="password" required>
          <button type="button" class="eye" onclick="togglePwd()">👁</button>
        </div>

        <div class="login-actions">
          <button class="login-btn" type="submit">➜ Login</button>
          <a class="forgot" href="#">Forgot Password</a>
        </div>
      </div>
    </form>
  </div>

  <script>
    function togglePwd() {
      var p = document.getElementById('pwd');
      p.type = p.type === 'password' ? 'text' : 'password';
    }

    function doLogin(e) {
      e.preventDefault();
      var uid = document.getElementById('uid').value.trim().toUpperCase();
      var role = 'student';
      if (uid.startsWith('A')) role = 'advisor';
      else if (uid.startsWith('M')) role = 'admin';
      var map = {
        student: 'student/dashboard-student.html',
        advisor: 'advisor/dashboard-advisor.php',
        admin: 'admin/dashboard-admin.php'
      };
      location.href = map[role];
      return false;
    }
  </script>
</body>

</html>