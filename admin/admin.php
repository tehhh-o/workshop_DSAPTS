<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Management - UTeM</title>
  <link rel="stylesheet" href="../style/styles.css">
</head>

<body>
  <div class="app">
    <?php
    $activePage = 'admin';
    include("components/sidebar-admin.php");
    ?>

    <?php
    $pageTitle = 'Admin Management';
    include("components/topbar-admin.php");
    ?>

    <main class="content">
      <div class="toolbar">
        <div class="search">
          <span>☰</span>
          <input placeholder="Hinted search text">
          <span>🔍</span>
        </div>
        <a class="add-btn" href="admin-add.php">
          <span class="ico">👥</span>Admin<span class="plus">+</span>
        </a>
      </div>
      <table>
        <thead>
          <tr>
            <th class="name-col">Admin Name</th>
            <th class="action">edit</th>
            <th class="action">delete</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="name-col">Fen</td>
            <td class="action">
              <a class="icon-btn" href="admin-edit.php">✎</a>
            </td>
            <td class="action">
              <button class="icon-btn">🗑</button>
            </td>
          </tr>
        </tbody>
      </table>
    </main>
  </div>
</body>

</html>