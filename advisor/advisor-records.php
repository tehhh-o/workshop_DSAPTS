<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title> <!-- change this title -->
  <link rel="stylesheet" href="../style/layout.css">
  <link rel="stylesheet" href="../style/advisor.css">
  <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
  <?php
  session_start();
  $activePage = 'records';
  include("components/sidebar-advisor.php");
  include("../models/functions.php");

      
  $keyword = $_GET['search'] ?? '';
  $userId = $_GET['user_id'] ?? null;

  $students = [];
  $subjects = [];

  if ($userId) {
      $subjects = getStudentSubjects($conn, $userId);
  }
  elseif ($keyword) {
      $students = searchAdvisorStudents($conn, $_SESSION['user_id'], $keyword);
  }
  $studentName = '';

  if ($userId) {
      $student = getUserById($conn, "student", "student.user_id", $userId);
      $studentName = $student['name'] ?? '';
  }
  ?>

  <main class="main-content main-rounded">
    <h1 class="content-title">Records</h1>

<div class="toolbar">

    <div class="search-wrapper">

        <form class="search" method="GET" action="">
            <span>☰</span>

            <input
                type="text"
                name="search"
                placeholder="Search student name"
                value="<?= $keyword ?>">

            <button type="submit" style="background:none;border:none;cursor:pointer;">
                🔍
            </button>
        </form>

        <div class="search-results">
            <?php if ($keyword && !$userId): ?>
                <h3>Search Results</h3>

                <ul>
                    <?php foreach ($students as $s): ?>
                        <li>
                            <a href="?user_id=<?= $s['user_id'] ?>">
                                <?= $s['name'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

    </div>

</div>
            
    <table>
        <thead>
            <tr>
              <th colspan="4" style="text-align:left;">
                  <h3>Student Name: <?= $studentName ?></h3>
            </tr>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Credit</th>
                <th>Grade</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!$userId): ?>
                <tr>
                    <td colspan="4" style="text-align:center;">
                        Search and select a student
                    </td>
                </tr>

            <?php elseif (empty($subjects)): ?>
                <tr>
                    <td colspan="4" style="text-align:center;">
                        No records found
                    </td>
                </tr>

            <?php else: ?>
                <?php foreach ($subjects as $s): ?>
                    <tr>
                        <td><?= $s['subject_code'] ?></td>
                        <td><?= $s['subject_name'] ?></td>
                        <td><?= $s['credit_hours'] ?></td>
                        <td><?= $s['grade'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
  </main>
</body>

</html>