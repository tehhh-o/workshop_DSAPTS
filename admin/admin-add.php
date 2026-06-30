<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Admin - UTeM</title>
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body>
    <div class="page-body main-gradient-bg">
        <?php
        $activePage = 'admin';
        include("components/sidebar-admin.php");
        include("../models/functions.php");

        $error = '';
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result = addAdmin(
            $conn,
            $_POST['name'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['password']
        );

        if ($result['success']) {
            $success = $result['message'];
        } else {
            $error = $result['message'];
        }
    }
        ?>

        <main class="main-content main-rounded">
            <div class="title-row">
            <h1 class="content-title">Edit Admin</h1>
            <div class="back-button">
            <button style="background: transparent; border:none;" type="button"  onclick="window.location.href='admin.php'">
            <img src="../assets/icons/back.png" alt="" style="height: 25px;"></button>
            </div>
        </div>

            <div class="content">

                <?php if ($error != '') { ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php } ?>

                <?php if ($success != '') { ?>
                    <p style="color: green;"><?php echo $success; ?> — <a href="admin.php">Back to list</a></p>
                <?php } ?>

                <form method="POST">
                    <div class="edit-box">
                        <div class="edit-wrapper">
                            <div class="edit-list">

                                <div class="edit-row">
                                    <span>Name</span>
                                    <input class="add-design" type="text" name="name" placeholder="Full name">
                                </div>

                                <div class="edit-row">
                                    <span>Email</span>
                                    <input class="add-design" type="email" name="email" placeholder="Email address">
                                </div>

                                <div class="edit-row">
                                    <span>Phone Number</span>
                                    <input class="add-design" type="text" name="phone" placeholder="e.g. 012-3456789">
                                </div>

                                <div class="edit-row">
                                    <span>Password</span>
                                    <input class="add-design" type="password" name="password" placeholder="Password">
                                </div>

                                <button class="add-submit" type="submit">Add</button>

                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </main>
    </div>
</body>

</html>