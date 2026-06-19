<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Student - UTeM</title>
  <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/admin.css">
  <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
    <?php
    $activePage = 'student';
    include("components/sidebar-admin.php");
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Edit Student</h1>

        <div class="edit-box">
          <div class="edit-wrapper">
      <div class="edit-list">
        <div class="edit-row">
          <span>Name -</span>
          <button class="icon-btn">✎</button>
        </div>
        <div class="edit-row">
          <span>Email -</span>
          <button class="icon-btn">✎</button>
        </div>
        <div class="edit-row">
          <span>Phone Number -</span>
          <button class="icon-btn">✎</button>
        </div>
        <div class="edit-row">
          <span>User ID -</span>
          <button class="icon-btn">✎</button>
        </div>
      </div>
      </div>
</div>
    </main>
</body>

</html>