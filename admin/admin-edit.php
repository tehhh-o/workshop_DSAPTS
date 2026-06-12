<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Edit</title> <!-- change this title -->
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
    <?php
    $activePage = 'admin';
    include("components/sidebar-admin.php")
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Edit Admin</h1>
        <div class="content">
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
    </main>
</body>

</html>