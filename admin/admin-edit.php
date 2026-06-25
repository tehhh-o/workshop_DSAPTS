<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Edit</title> <!-- change this title -->
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
    session_start();
    $user_id = $_GET['id'] ?? null;
    if (!$user_id) {
    header("Location: admin.php");
    exit();
    }

    $admin = getUserById($conn, "admin", "admin.user_id", $user_id);
    if (!$admin) {
    header("Location: admin.php");
    exit();
    }

    $success = "";
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $result = editAdmin(
        $conn,
        $user_id,
        $_POST['field'],
        trim($_POST['value'])
    );

    if ($result['success']) {
        $success = $result['message'];
        $admin = getUserById($conn, "admin", "admin.user_id", $user_id);
    } else {
        $error = $result['message'];
    }
}
?>

<main class="main-content main-rounded">
        <h1 class="content-title">Edit Admin</h1>
 
        <?php if ($success): ?>
            <p style="color: green; margin-bottom: 10px;"><?= $success ?></p>
        <?php endif; ?>
 
        <?php if ($error): ?>
            <p style="color: red; margin-bottom: 10px;"><?= $error ?></p>
        <?php endif; ?>
 
        <div class="edit-box">
            <div class="edit-wrapper">
              <div class="edit-list">

              <form method="POST" action="admin-edit.php?id=<?= $user_id ?>">
                <div class="edit-row">
                  <span>Name</span>
                  <input type="hidden" name="field" value="name">
                  <input class="edit-design" type="text" name="value" value="<?= $admin['name'] ?>">
                  <button type="submit" class="icon-btn">Save</button>
                </div>
              </form>

              <form method="POST" action="admin-edit.php?id=<?= $user_id ?>">
                <div class="edit-row">
                  <span>Email</span>
                  <input type="hidden" name="field" value="email">
                  <input class="edit-design" type="text" name="value" value="<?= $admin['email'] ?>">
                  <button type="submit" class="icon-btn">Save</button>
                </div>
              </form>

              <form method="POST" action="admin-edit.php?id=<?= $user_id ?>">
                <div class="edit-row">
                  <span>Phone Number</span>
                  <input type="hidden" name="field" value="phone_number">
                  <input class="edit-design" type="text" name="value" value="<?= $admin['phone_number'] ?>">
                  <button type="submit" class="icon-btn">Save</button>
                </div>
              </form>

              <form method="POST" action="admin-edit.php?id=<?= $user_id ?>">
                <div class="edit-row">
                  <span>User ID</span>
                  <input type="hidden" name="field" value="login_id">
                  <input class="edit-design" type="text" name="value" value="<?= $admin['login_id'] ?>">
                  <button type="submit" class="icon-btn">Save</button>
                </div>
              </form>

              </div>
            </div>
        </div>
    </main>
</body>
 
</html>