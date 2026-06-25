<?php
include("../models/functions.php");

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = addAdvisor(
        $conn,
        $_POST['name'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['password'],
        $_POST['department']
    );

    if ($result['success']) {
        $success = $result['message'];
    } else {
        $error = $result['message'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Advisor - UTeM</title>
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body>
    <div class="page-body main-gradient-bg">
        <?php
        $activePage = 'advisor';
        include("components/sidebar-admin.php");
        ?>

        <main class="main-content main-rounded">
            <h1 class="content-title">Add Advisor</h1>

            <div class="content">

                <?php if ($error != '') { ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php } ?>

                <?php if ($success != '') { ?>
                    <p style="color: green;"><?php echo $success; ?> — <a href="advisor.php">Back to list</a></p>
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
                                    <span>Department</span>
                                    <input class="add-design" type="text" name="department" placeholder="e.g. Computer Science">
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