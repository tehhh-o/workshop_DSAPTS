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
    include("components/sidebar-admin.php")
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Advisors Management</h1>

        <main class="content">
            <div class="toolbar">
                <div class="search">
                    <span>☰</span>
                    <input placeholder="Hinted search text">
                    <span>🔍</span>
                </div>
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
    </main>
</body>

</html>