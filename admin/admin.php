<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title> <!-- change this title -->
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
    <?php
    $activePage = 'admin';
    include("components/sidebar-admin.php");
    include("../models/functions.php");
    ?>

    <?php
    $keyword = "";

    if (isset($_GET['search'])) {
        $keyword = $_GET['search'];
        $admins = searchUserByName($conn, "admin", $keyword);
    } else {
        $admins = getAllUser($conn, "admin");
    }
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Admin Management</h1>

        <main class="content">
            <div class="toolbar">
                <!--<div class="search">
                    <span>☰</span>
                    <input placeholder="Hinted search text">
                    <span>🔍</span>
                </div> -->
                <form class="search" method="GET" action="">
                    <span>☰</span>

                    <input
                        type="text"
                        name="search"
                        placeholder="Search admin name"
                        value="<?= $keyword ?>">

                    <button type="submit" style="background:none;border:none;cursor:pointer;">
                        🔍
                    </button>
                </form>
                <a class="admin-btn" href="admin-add.php">
                    <span class="admin-icon">👥</span>
                    <span class="admin-text">ADD</span>
                </a>
            </div>
            <div class="table-box">
                <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th class="name-col">Admin Name</th>
                        <th class="action">edit</th>
                        <th class="action">delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($admins as $a): ?>
                        <tr>
                            <td class="name-col"><?= $a['name'] ?></td>

                            <td class="action">
                                <a class="icon-btn" href="admin-edit.php?id=<?= $a['user_id'] ?>">✎</a>
                            </td>

                            <td class="action">
                                <a class="icon-btn" href="admin-delete.php?id=<?= $a['user_id'] ?>">🗑</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <!--<tr>
                        <td class="name-col">Fen</td>
                        <td class="action">
                            <a class="icon-btn" href="admin-edit.php">✎</a>
                        </td>
                        <td class="action">
                            <button class="icon-btn">🗑</button>
                        </td>
                    </tr> -->
                </tbody>
            </table>
            </div>
            </div>
        </main>
    </main>
</body>

</html>