<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Settings - UTeM Student</title>
  <link rel="stylesheet" href="../style/styles.css">
</head>
<body>
  <div class="app">
    <?php $activePage = 'settings'; include("components/sidebar-student.php"); ?>
    <main class="content">
      <h1 class="page-title">Settings</h1>
      <div class="settings-id">
        Student ID <span class="id-pill">D032410000</span>
      </div>
      <div class="settings-card">
        <div class="set-row">
          <label>Phone Number :</label>
          <input class="set-input" type="text">
          <span class="icon-edit">📝</span>
        </div>
        <div class="set-row">
          <label>Email :</label>
          <input class="set-input" type="email">
          <span></span>
        </div>
        <div class="set-row">
          <label>Address :</label>
          <input class="set-input" type="text">
          <span class="icon-edit">📝</span>
        </div>
        <div class="set-row">
          <label>Dark Mode</label>
          <span class="toggle"></span>
          <span></span>
        </div>
        <div class="set-row">
          <label>MUET Status</label>
          <span class="icon-edit" style="justify-self:start;">📝</span>
          <span></span>
        </div>
        <div class="change-pwd">Change Password</div>
      </div>
    </main>
  </div>
</body>
</html>
