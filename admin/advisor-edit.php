<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Advisor - UTeM</title>
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
    <?php
    $activePage = 'advisor';
    include("components/sidebar-admin.php");
    include("../models/functions.php");

    session_start();
    $advisorId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    if (!$advisorId) {
        header("Location: advisor.php");
        exit();
    }

    $advisor = getUserById($conn, "advisor", "advisor.user_id", $advisorId);
    if (!$advisor) {
        header("Location: advisor.php");
        exit();
    }

    $success = "";
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fields = $_POST['fields'] ?? [];
        $result = editAdmin($conn, $advisorId, $fields);
        if ($result['success']) {
            $success = $result['message'];
            $advisor = getUserById($conn, "advisor", "advisor.user_id", $advisorId);
        } else {
            $error = $result['message'];
        }
    }
    ?>

    <main class="main-content main-rounded">
        <div class="title-row">
          <h1 class="content-title">Edit Advisor</h1>
          <div class="back-button">
          <button style="background: transparent; border:none;" type="button"  onclick="window.location.href='advisor.php'">
          <img src="../assets/icons/back.png" alt="" style="height: 25px;"></button>
      </div>
    </div>

        <?php if ($success): ?>
            <p style="color: green; margin-bottom: 10px;"><?= htmlspecialchars($success) ?></p>
        <?php endif; ?>

        <?php if ($error): ?>
            <p style="color: red; margin-bottom: 10px;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <div class="edit-columns">

            <div class="edit-box">
                <h2 class="edit-box-title">Information</h2>
                <div class="edit-wrapper">
                    <div class="edit-list">

                        <form class="user-info" method="POST" action="advisor-edit.php?id=<?= $advisorId ?>">

                            <div class="edit-row">
                                <span>Name</span>
                                <input class="edit-design" type="text" name="fields[name]" value="<?= htmlspecialchars($advisor['name']) ?>">
                            </div>

                            <div class="edit-row">
                                <span>Email</span>
                                <input class="edit-design" type="text" name="fields[email]" value="<?= htmlspecialchars($advisor['email']) ?>">
                            </div>

                            <div class="edit-row">
                                <span>Phone Number</span>
                                <input class="edit-design" type="text" name="fields[phone_number]" value="<?= htmlspecialchars($advisor['phone_number']) ?>">
                            </div>

                            <div style="display: flex; justify-content: center; margin-top: 12px;">
                                <button type="submit" class="report-buttons" class="icon-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </main>
</body>

</html>