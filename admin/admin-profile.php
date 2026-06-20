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
    $activePage = 'profile';
    include("components/sidebar-admin.php");
    include("../models/functions.php");
    $user = getUserById($conn, "admin", "login_id", "A03241012");

    $nameParts = explode(' ', trim($user['name']));
    $firstName = $nameParts[0];
    $lastName = implode(' ', array_slice($nameParts, 1));
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Profile</h1>
        <div class="profile-card">
            <div class="avatar-circle">
                <svg viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="100%" height="100%">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </div>
            <div class="profile-summary">
                <h2><?php echo $user['name']; ?></h2>
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
                    <span class="label">Admin ID</span>
                    <span class="value"><?php echo $user['login_id']; ?></span>
                </div>

                <div class="info-group" style="grid-column: span 2;">
                    <span class="label">Email</span>
                    <span class="value"><?php echo $user['email']; ?></span>
                </div>

                <div class="info-group">
                    <span class="label">Phone Number</span>
                    <span class="value"><?php echo $user['phone_number']; ?></span>
                </div>

            </div>


            <div class="address-container">
                <span class="label">Address</span>
                <span class="value"><?php echo $user['address']; ?></span>
            </div>
        </div>

        </div>

</body>

</html>