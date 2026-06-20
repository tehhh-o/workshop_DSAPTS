<head>
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/advisor.css">
    <link rel="stylesheet" href="../style/styles.css">
<body class="page-body main-gradient-bg">
    <?php
    $activePage = 'profile';
    include("components/sidebar-advisor.php")
    ?>
</head>
        <?php
        session_start();
        include("../models/functions.php");          
        $userId = $_SESSION['user_id'] ?? null;

        $advisor = null;

        if ($userId) {
            $advisor = getUserById($conn, "advisor", "advisor.user_id", $userId);
        }
        ?>
<body>
    <main class="main-content main-rounded">
        <h1 class="content-title">Profile</h1>
</body>

</html>
        <div class="profile-card">
            <div class="avatar-circle">

                <svg viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="100%" height="100%">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </div>
            <div class="profile-summary">
                <h2><?= $advisor['name'] ?></h2>
                <div class="institution">Universiti Teknikal Malaysia Melaka</div>
                <div class="academic-meta">
                </div>
            </div>
        </div>

        <div class="details-box">
            <div class="details-grid" >
                
                <div class="info-group" style="grid-column: span 2;">
                    <span class="label">Name</span>
                    <span class="value"><?= $advisor['name'] ?></span>
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
                    <span class="value"><?= $advisor['phone'] ?></span>
                </div>

            </div>


            <div class="address-container">
                <span class="label">Address</span>
                <span class="value"><?= $advisor['address'] ?></span>
            </div>
        </div>

    </div>

</body>
</html>