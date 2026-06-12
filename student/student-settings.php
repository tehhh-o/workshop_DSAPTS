<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settings</title>
  <link rel="stylesheet" href="../style/layout.css">
  <link rel="stylesheet" href="../style/auth.css">
  <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
  <?php
  $activePage = 'settings';
  include("components/sidebar-student.php");
  ?>

  <main class="main-content main-rounded">
    <h1 class="content-title">Settings</h1>
    <div class="input-field" style="margin-top: 12px;">
      <h3 style="margin-right: 24px;">Student ID</h3>
      <input type="text" value="D32155320" disabled>
    </div>


    <div class="panel">
      <h3>Personal Info</h3>
      <div class="input-field">
        <h4>Phone Number</h4>
        <div class="edit-field">
          <input type="text" value="+60 11-234 5678">
          <img src="../assets/icons/edit.png" alt="">
        </div>
      </div>
      <div class="input-field">
        <h4>Email</h4>
        <div class="edit-field">
          <input type="text" value="ahmad.rahman@utem.edu.my">
          <img src="../assets/icons/edit.png" alt="">
        </div>
      </div>
      <div class="input-field">
        <h4>Address</h4>
        <div class="edit-field">
          <input type="text" value="No 1, Jalan Utem, 78100 Durian Tunggal, Melaka">
          <img src="../assets/icons/edit.png" alt="">
        </div>
      </div>
      <div class="input-field">
        <h4>Theme Mode</h4>
        <div class="theme-field">
          <div class="theme-mode">
            <img src="../assets/icons/moon.png" alt="">
            <h4>Dark</h4>
          </div>
          <div class="theme-mode active-theme">
            <img src="../assets/icons/sun.png" alt="">
            <h4>Light</h4>
          </div>
        </div>
      </div>
      <div class="input-field">
        <h4>Muet Status</h4>
        <div class="edit-field">
          <input type="text" value="Band 4.0">
          <img src="../assets/icons/edit.png" alt="">
        </div>
      </div>
      <div class="auth-links">
        <p></p>
        <a href="">Change Password</a>
      </div>
    </div>
  </main>
</body>

</html>