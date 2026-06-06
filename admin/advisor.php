<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Advisor Management - UTeM</title>
  <link rel="stylesheet" href="../style/styles.css">
</head>

<body>
  <div class="app">
    <?php
    $activePage = 'advisor';
    include("components/sidebar-admin.php");
    ?>

    <?php
    $pageTitle = 'Advisor Management';
    include("components/topbar-admin.php");
    ?>

    <main class="content">
      <div class="toolbar">
        <div class="search">
          <span>☰</span>
          <input placeholder="Hinted search text">
          <span>🔍</span>
        </div>
        <a class="add-btn" href="advisor-add.php">
          <span class="ico">👥</span>Advisor<span class="plus">+</span>
        </a>
      </div>
      <table>
        <thead>
          <tr>
            <th class="name-col">Advisor Name</th>
            <th class="action">edit</th>
            <th class="action">delete</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="name-col">Ali</td>
            <td class="action">
              <a class="icon-btn" href="advisor-edit.php">✎</a>
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