<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Adding Admin - UTeM</title>
  <link rel="stylesheet" href="../style/layout.css">
  <link rel="stylesheet" href="../style/admin.css">
  <link rel="stylesheet" href="../style/styles.css">
</head>

<body>
  <div class="page-body main-gradient-bg">
    <?php
    $activePage = 'admin';
    include("components/sidebar-admin.php");
    ?>

    <main class="main-content main-rounded">
      <h1 class="content-title">Add Admin</h1>

      <div class="content">
      <form onsubmit="event.preventDefault(); alert('Added');">
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
              <span>Student ID -</span>
              <button class="icon-btn">✎</button>
            </div>
            <button class="add-submit" type="submit">Add</button>
          </div>
</div>
        </div>
      </form>
    </main>
  </div>
</body>

</html>