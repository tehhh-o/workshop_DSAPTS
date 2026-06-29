<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Advisor</title>
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/styles.css">
</head>


<body class="page-body main-gradient-bg">
    <?php
    $activePage = 'admin';
    include("components/sidebar-admin.php");
    include("../models/functions.php");

    if (!isset($_GET['id'])) {
    header("Location: admin.php");
    exit;
}

    $user_id = $_GET['id'];

    if (isset($_POST['confirm_delete'])) {
        $success = deleteUser($conn, 'admin', $user_id);
        if ($success) {
            header("Location: admin.php?deleted=1");
        } else {
            header("Location: admin.php?deleted=0");
        }
        exit;
    }

    $admin = getUserById($conn, 'admin', 'admin.user_id', $user_id);
        if (!$admin) {
        header("Location: admin.php");
        exit;
    }
?>
    <main class="main-content main-rounded">
        <div class="confirm-box">
            <h2>🗑 Delete Admin</h2>
            <p>Are you sure you want to delete<br><strong><?= $admin['name'] ?></strong>?<br><br>This action cannot be undone.</p>
            <div class="btn-row">
                <a class="btn-cancel" href="admin.php">Cancel</a>
                <form method="POST" action="admin-delete.php?id=<?= $user_id ?>">
                    <button class="btn-delete" name="confirm_delete" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>