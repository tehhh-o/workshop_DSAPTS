<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/student.css">
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
    <?php
    $activePage = 'profile';
    include("components/sidebar-student.php")
    ?>

    </head>

    <body>
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
                    <h2>Ahmad bin Ali</h2>
                    <div class="institution">Universiti Teknikal Malaysia Melaka</div>
                    <div class="academic-meta">
                        <span><strong>3.85</strong> CGPA</span>
                        <span><strong>3.51</strong> GPA</span>
                        <span><strong>17</strong> Credits</span>
                    </div>
                </div>
            </div>

            <div class="details-box">
                <div class="details-grid">

                    <div class="info-group">
                        <span class="label">First Name</span>
                        <span class="value">Ahmad</span>
                    </div>

                    <div class="info-group">
                        <span class="label">Last Name</span>
                        <span class="value">Ali</span>
                    </div>

                    <div class="info-group">
                        <span class="label">Student ID</span>
                        <span class="value">D032410221</span>
                    </div>

                    <div class="info-group" style="grid-column: span 2;">
                        <span class="label">Email</span>
                        <span class="value">D032410221@student.utem.edu.my</span>
                    </div>

                    <div class="info-group">
                        <span class="label">Phone Number</span>
                        <span class="value">012-3456789</span>
                    </div>

                </div>


                <div class="address-container">
                    <span class="label">Address</span>
                    <span class="value">Jalan Hang Tuah Jaya, 76100 Durian Tunggal, Melaka</span>
                </div>
            </div>

            </div>

    </body>

</html>