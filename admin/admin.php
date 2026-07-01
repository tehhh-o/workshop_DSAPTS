<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admins</title> <!-- change this title -->
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

        <div class="toolbar">
            <form class="search" method="GET" action="">
                <span>☰</span>

                <input
                    type="text"
                    name="search"
                    placeholder="Search admin name"
                    value="<?= $keyword ?>">

                <button type="submit" style="background:none;border:none;cursor:pointer;">
                    <img src="../assets/icons/search.png" alt="" style="height: 16px;">
                </button>
            </form>
            <a class="admin-btn" href="admin-add.php">
                <span class="admin-icon"> <img src="../assets/icons/users_white.png" alt="" style="height: 16px;"></span>
                <span class="admin-text">ADD</span>
            </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th class="name-col">Admin Name</th>
                    <th class="action">Edit Info</th>
                    <th class="action">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admins as $a): ?>
                    <tr>
                        <td class="name-col"><?= $a['name'] ?></td>

                        <td class="action">
                            <a class="icon-btn" href="admin-edit.php?id=<?= $a['user_id'] ?>"><img src="../assets/icons/pencil.png" alt="" style="height: 16px;"></a>
                        </td>

                        <td class="action">
                            <a class="icon-btn" href="admin-delete.php?id=<?= $a['user_id'] ?>"><img src="../assets/icons/trash.png" alt="" style="height: 16px;"></a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

    </main>
</body>

</html>