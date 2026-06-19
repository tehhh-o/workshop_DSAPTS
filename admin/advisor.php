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
    $activePage = 'advisor';
    include("components/sidebar-admin.php");
    include("../models/functions.php");
    ?>

    <?php
    $keyword = "";

    if (isset($_GET['search'])) {
        $keyword = $_GET['search'];
        $advisors = searchUserByName($conn, "advisor", $keyword);
    } else {
        $advisors = getAllUser($conn, "advisor");
    }
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Advisors Management</h1>

        <main class="content">
            <div class="toolbar">
                <!-- <div class="search">
                    <span>☰</span>
                    <input placeholder="Hinted search text">
                    <span>🔍</span>
                </div> -->
                <form class="search" method="GET" action="">
                    <span>☰</span>

                    <input
                        type="text"
                        name="search"
                        placeholder="Search advisor name"
                        value="<?= $keyword ?>">

                    <button type="submit" style="background:none;border:none;cursor:pointer;">
                        🔍
                    </button>
                </form>

                <a class="advisor-btn" href="advisor-add.php">
                    <span class="advisor-icon">👥</span>
                    <span class="advisor-text">ADD</span>
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
                    <?php foreach ($advisors as $a): ?>
                        <tr>
                            <td class="name-col"><?= $a['name'] ?></td>

                            <td class="action">
                                <a class="icon-btn" href="advisor-edit.php?id=<?= $a['user_id'] ?>">✎</a>
                            </td>

                            <td class="action">
                                <a class="icon-btn" href="advisor-delete.php?id=<?= $a['user_id'] ?>">🗑</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <!-- <tr>
                        <td class="name-col">Ali</td>
                        <td class="action">
                            <a class="icon-btn" href="advisor-edit.php">✎</a>
                        </td>
                        <td class="action">
                            <button class="icon-btn">🗑</button>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </main>
    </main>
</body>

</html>