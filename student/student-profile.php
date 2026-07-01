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
    session_start();
    if (!isset($_SESSION['uid'])) {
        header("Location: ../index.php");
        exit();
    }
    $activePage = 'profile';
    include("components/sidebar-student.php");
    include("../models/functions.php");

    $loginId = $_SESSION['uid'];
    $student = getStudentByLoginId($conn, $loginId);

    if (!$student) {
        echo "<p style='color:red;'>Student record not found.</p>";
        exit();
    }

    $userId = $student['user_id'];
    $allSubjects = getStudentSubjects($conn, $userId);
    $cgpa        = calculateGPA($allSubjects);
    $latestSemId      = null;
    $totalCreditTaken = 0;

    foreach ($allSubjects as $subj) {
        $totalCreditTaken += $subj['credit_hours'];
        if ($latestSemId === null || $subj['semester_id'] > $latestSemId) {
            $latestSemId = $subj['semester_id'];
        }
    }
    $latestSubjects = $latestSemId ? getStudentSubjectsBySemester($conn, $userId, $latestSemId) : [];
    $latestGpa      = calculateGPA($latestSubjects);
    $nameParts = explode(' ', $student['name'], 2);
    $firstName = $nameParts[0];
    $lastName  = isset($nameParts[1]) ? $nameParts[1] : '';

    $advisor = null;
    if (!empty($student['advisor_id'])) {
        $advisor = getAdvisorByStudentId($conn, $student['advisor_id']);
    }
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Profile</h1>
        <div class="profile-card">
            <div class="avatar-circle">
                <?php if (!empty($student['profile_picture'])): ?>
                    <img src="<?= htmlspecialchars($student['profile_picture']) ?>" alt="Profile Picture">
                <?php else: ?>
                    <img src="../assets/icons/user.png" style="margin-top: 12px;">
                <?php endif; ?>
            </div>
            <div class="profile-summary">
                <h2><?php echo htmlspecialchars($student['name']); ?></h2>
                <div class="institution">Universiti Teknikal Malaysia Melaka</div>
                <div class="academic-meta">
                    <span><strong><?php echo number_format($cgpa, 2); ?></strong> CGPA</span>
                    <span><strong><?php echo number_format($latestGpa, 2); ?></strong> GPA</span>
                    <span><strong><?php echo $totalCreditTaken; ?></strong> Credits</span>
                </div>
            </div>
        </div>

        <div class="details-box">
            <div class="details-grid">

                <div class="info-group">
                    <span class="label">First Name</span>
                    <span class="value"><?php echo htmlspecialchars($firstName); ?></span>
                </div>

                <div class="info-group">
                    <span class="label">Last Name</span>
                    <span class="value"><?php echo htmlspecialchars($lastName); ?></span>
                </div>

                <div class="info-group">
                    <span class="label">Student ID</span>
                    <span class="value"><?php echo htmlspecialchars($student['login_id']); ?></span>
                </div>

                <div class="info-group" style="grid-column: span 2;">
                    <span class="label">Email</span>
                    <span class="value"><?php echo htmlspecialchars($student['email']); ?></span>
                </div>

                <div class="info-group">
                    <span class="label">Phone Number</span>
                    <span class="value"><?php echo htmlspecialchars($student['phone_number'] ?? '-'); ?></span>
                </div>

            </div>

            <div class="address-container">
                <span class="label">Address</span>
                <span class="value"><?php echo htmlspecialchars($student['address'] ?? '-'); ?></span>
            </div>
        </div>
        <div class="details-box" style="margin-top: 20px;">
            <div class="details-grid2">
                <h2 class="label">Academic Advisor Contact</h2>
            </div>
            <?php if ($advisor): ?>
                <div class="details-grid" style="margin-top: 12px;">
                    <div class="info-group">
                        <span class="label">Advisor Name</span>
                        <span class="value"><?php echo htmlspecialchars($advisor['name']); ?></span>
                    </div>
                    <div class="info-group">
                        <span class="label">Phone Number</span>
                        <span class="value">
                            <a href="tel:<?php echo htmlspecialchars($advisor['phone_number'] ?? ''); ?>" style="color: inherit; text-decoration: none;">
                                <?php echo htmlspecialchars($advisor['phone_number'] ?? '-'); ?>
                            </a>
                        </span>
                    </div>
                    <div class="info-group" style="grid-column: span 2;">
                        <span class="label">Email</span>
                        <span class="value">
                            <a href="mailto:<?php echo htmlspecialchars($advisor['email'] ?? ''); ?>" style="color: inherit; text-decoration: none;">
                                <?php echo htmlspecialchars($advisor['email'] ?? '-'); ?>
                            </a>
                        </span>
                    </div>
                </div>
            <?php else: ?>
                <div style="margin-top: 12px;">
                    <span class="value">No advisor has been assigned yet. Please contact the faculty office for assistance.</span>
                </div>
            <?php endif; ?>
        </div>
    </main>

</body>

</html>