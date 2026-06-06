<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Student - UTeM</title>
  <link rel="stylesheet" href="../style/styles.css">
</head>

<body>
  <div class="app">
    <?php
    $activePage = 'student';
    include("components/sidebar-admin.php");
    ?>

    <?php
    $pageTitle = 'Edit Student';
    include("components/topbar-admin.php");
    ?>

    <main class="content">
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
    </main>
  </div>
</body>

</html>