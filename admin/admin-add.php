<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Adding Admin - UTeM</title>
  <link rel="stylesheet" href="../style/styles.css">
</head>

<body>
  <div class="app">
    <?php
    $activePage = 'admin';
    include("components/sidebar-admin.php");
    ?>

    <?php
    $pageTitle = 'Adding Admin';
    include("components/topbar-admin.php");
    ?>

    <main class="content">
      <form class="form" onsubmit="event.preventDefault(); alert('Added');">
        <div class="field">
          <label>Name</label>
          <input type="text">
        </div>
        <div class="field">
          <label>Email</label>
          <input type="email">
        </div>
        <div class="field">
          <label>Phone Number</label>
          <input type="tel">
        </div>
        <div class="field">
          <label>Admin ID</label>
          <input type="text">
        </div>
        <button class="add-submit" type="submit">Add</button>
      </form>
    </main>
  </div>
</body>

</html>