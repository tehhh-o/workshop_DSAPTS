<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Logs</title> <!-- change this title -->
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
    <?php 
    $activePage = 'logs';
    include("components/sidebar-admin.php")
     ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Admin Logs</h1>
            <div class="logs-box">
                <div class="logs-table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Action</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2026-06-12</td>
                                <td>Login</td>
                                <td>Admin logged into the system</td>
                            </tr>
                            <tr>
                                <td>2026-06-12</td>
                                <td>Add Student</td>
                                <td>New student record added</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </main>
</class=>

</body>
</html>