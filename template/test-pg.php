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
    include("sidebar-dev.php")
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Dashboard</h1>
        <h3 class="content-welcome">Welcome, Admin</h3>

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
    </main>
    <div class="chart-container">
                <canvas id="gpaChart"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="barChart"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="pieChart"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="radarChart"></canvas>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="../js/script.js"></script>
            <script>
                makeGraph({
                    id: "gpaChart",
                    type: "line",
                    title: "Student GPA Trend",
                    xLabel: "Semester",
                    yLabel: "GPA",
                    xValues: ["Sem 1", "Sem 2", "Sem 3"],
                    yValues: [3.2, 3.4, 3.6],
                    label: "GPA"
                });
                makeGraph({
                    id: "barChart",
                    type: "bar",
                    title: "Student GPA Trend",
                    xLabel: "Semester",
                    yLabel: "GPA",
                    xValues: ["Sem 1", "Sem 2", "Sem 3"],
                    yValues: [3.2, 3.4, 3.6],
                    label: "GPA"
                });
                makeGraph({
                    id: "pieChart",
                    type: "pie",
                    title: "Student GPA Trend",
                    xLabel: "Semester",
                    yLabel: "GPA",
                    xValues: ["Sem 1", "Sem 2", "Sem 3"],
                    yValues: [3.2, 3.4, 3.6],
                    label: "GPA"
                });
            </script>
</body>

</html>