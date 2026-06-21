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
    $activePage = 'student';
    include("components/sidebar-admin.php");
    include("../models/functions.php");
    ?>

    <?php
    $keyword = "";

    if (isset($_GET['search'])) {
        $keyword = $_GET['search'];
        $students = searchUserByName($conn, "student", $keyword);
    } else {
        $students = getAllUser($conn, "student");
    }
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Student Management</h1>

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
                        placeholder="Search student name"
                        value="<?= $keyword ?>">

                    <button type="submit" style="background:none;border:none;cursor:pointer;">
                        🔍
                    </button>
                </form>

                <a class="student-btn" href="student-add.php">
                    <span class="student-icon">👥</span>
                    <span class="student-text">ADD</span>
                </a>
            </div>
            <div class="table-box">
                <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th class="name-col">Student Name</th>
                        <th class="action">edit</th>
                        <th class="action">delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $a): ?>
                        <tr>
                            <td class="name-col"><?= $a['name'] ?></td>

                            <td class="action">
                                <a class="icon-btn" href="student-edit.php?id=<?= $a['user_id'] ?>">✎</a>
                            </td>

                            <td class="action">
                                <a class="icon-btn" href="student-delete.php?id=<?= $a['user_id'] ?>">🗑</a>
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
            </div>
            </div>
        </main>
    </main>
</body>

</html>