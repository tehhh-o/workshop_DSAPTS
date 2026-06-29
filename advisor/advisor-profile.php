<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title> <!-- change this title -->
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/advisor.css">
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
    <?php
    session_start();
    $activePage = 'profile';
    include("components/sidebar-advisor.php");
    include("../models/functions.php");
    $user = getUserById($conn, "advisor", "login_id", $_SESSION['uid']);

    $nameParts = explode(' ', trim($user['name']));
    $firstName = $nameParts[0];
    $lastName = implode(' ', array_slice($nameParts, 1));
    ?>
    </head>
    <?php
    $userId = $_SESSION['user_id'] ?? null;

    $advisor = null;

    if ($userId) {
        $advisor = getUserById($conn, "advisor", "advisor.user_id", $userId);
    }
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Profile</h1>

        <div class="profile-card">
            <div class="avatar-circle">
                <?php if (!empty($advisor['profile_picture'])): ?>
                    <img src="<?= htmlspecialchars($advisor['profile_picture']) ?>" alt="Profile Picture">
                <?php else: ?>
                    <img src="../assets/icons/user.png" style="margin-top: 12px;">
                <?php endif; ?>
            </div>
            <div class="profile-summary">
                <h2><?= $advisor['name'] ?></h2>
                <div class="institution">Universiti Teknikal Malaysia Melaka</div>
                <div class="academic-meta">
                </div>
            </div>
        </div>

        <div class="details-box">
            <div class="details-grid">

                <div class="info-group">
                    <span class="label">First Name</span>
                    <span class="value"><?php echo $firstName; ?></span>
                </div>

                <div class="info-group">
                    <span class="label">Last Name</span>
                    <span class="value"><?php echo $lastName; ?></span>
                </div>

                <div class="info-group">
                    <span class="label">Advisor ID</span>
                    <span class="value"><?= $advisor['login_id'] ?></span>
                </div>

                <div class="info-group" style="grid-column: span 2;">
                    <span class="label">Email</span>
                    <span class="value"><?= $advisor['email'] ?></span>
                </div>

                <div class="info-group">
                    <span class="label">Phone Number</span>
                    <span class="value"><?= $advisor['phone_number'] ?></span>
                </div>

            </div>


            <div class="address-container">
                <span class="label">Address</span>
                <span class="value"><?= $advisor['address'] ?></span>
            </div>
        </div>
</body>

</html>