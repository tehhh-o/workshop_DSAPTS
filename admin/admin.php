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
    include("components/sidebar-admin.php")
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Admin Management</h1>

        <main class="content">
            <div class="toolbar">
                <div class="search">
                    <span>☰</span>
                    <input placeholder="Hinted search text">
                    <span>🔍</span>
                </div>
                <a class="admin-btn" href="admin-add.php">
                    <span class="admin-icon">👥</span>
                    <span class="admin-text">ADD</span>
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
    </main>
</body>

</html>