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

    // Calculate CGPA and latest semester GPA from subjects
    $allSubjects = getStudentSubjects($conn, $userId);
    $cgpa        = calculateGPA($allSubjects);

    // Get latest semester subjects for current GPA
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

    // Split name into first / last
    $nameParts = explode(' ', $student['name'], 2);
    $firstName = $nameParts[0];
    $lastName  = isset($nameParts[1]) ? $nameParts[1] : '';
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Profile</h1>
        <div class="profile-card">
            <div class="avatar-circle">
                <svg viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" width="100%" height="100%">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
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
                    <span class="value"><?php echo htmlspecialchars($student['phone'] ?? '-'); ?></span>
                </div>

            </div>

            <div class="address-container">
                <span class="label">Address</span>
                <span class="value"><?php echo htmlspecialchars($student['address'] ?? '-'); ?></span>
            </div>
        </div>

    </main>

</body>

</html>
