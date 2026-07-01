<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title> <!-- change this title -->
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/advisor.css">
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
    <?php
    session_start();
    $activePage = 'students';
    include("components/sidebar-advisor.php");
    include("../models/functions.php");

    $keyword = isset($_GET['search']) ? trim($_GET['search']) : '';

    $keyword = str_replace([';', "'", '"'], '', $keyword);
        $muet          = $_GET['muet'] ?? '';
        $cgpa          = $_GET['cgpa'] ?? '';
        $plan_degree   = $_GET['plan_degree'] ?? '';
        $degree_field  = $_GET['degree_field'] ?? '';

        $students = filterAdvisorStudents(
            $conn, 
            $_SESSION['user_id'], 
            $keyword, 
            $muet, 
            $cgpa, 
            $plan_degree, 
            $degree_field
        );
    ?>

    <script>
function toggleFilters() {
    const panel = document.getElementById('filterPanel');
    if (panel.style.display === 'none' || panel.style.display === '') {
        panel.style.display = 'flex';
    } else {
        panel.style.display = 'none';
    }
}
</script>

    <main class="main-content main-rounded">
        <h2 class="content-title" style="margin-top: 10px; margin-bottom: 15px;">Student List</h2>
<div class="toolbar">
    <form class="toolbar-form" method="GET" style="display: flex; flex-direction: column; gap: 15px;">
        
        <div style="display: flex; align-items: center; gap: 12px;">
            
            <div class="search" style="flex: 1; display: flex; max-width: 350px;">
                <input type="text" name="search"  placeholder="Search student name" value="<?= htmlspecialchars($keyword ?? '') ?>">

                <button type="submit" class="search-btn">
                    <img src="../assets/icons/search.png" alt="" style="height:16px;">
                </button>
            </div>

            <button type="button" onclick="toggleFilters()" class="filter-btn" >
                <img src="../assets/icons/filter.png" alt="" style="height: 25px; width: auto; display: block;"> 
                    Filters
            </button>
            
        </div>

        <?php 
        $hasActiveFilters = (!empty($muet) || !empty($cgpa) || !empty($plan_degree) || !empty($degree_field));
        ?>

        <div id="filterPanel" style="display: <?= $hasActiveFilters ? 'flex' : 'none' ?>; flex-wrap: wrap; align-items: center; gap: 10px; background-color: #f8fafc; border: 1px solid #e2e8f0; padding: 15px; border-radius: 8px;">
            
            <select name="muet" class="filter-select">
                <option value="">MUET</option>
                <option value="Pass" <?= ($muet ?? '') === 'Pass' ? 'selected' : '' ?>>Pass</option>
                <option value="Fail" <?= ($muet ?? '') === 'Fail' ? 'selected' : '' ?>>Fail</option>
            </select>

            <select name="cgpa" class="filter-select">
                <option value="">CGPA</option>
                <option value="excellent" <?= ($cgpa ?? '') === 'excellent' ? 'selected' : '' ?>>Excellent (3.5 - 4.0)</option>
                <option value="average" <?= ($cgpa ?? '') === 'average' ? 'selected' : '' ?>>Average (2.0 - 3.5)</option>
                <option value="risk" <?= ($cgpa ?? '') === 'risk' ? 'selected' : '' ?>>At Risk (0 - 2.0)</option>
            </select>

            <select name="plan_degree" class="filter-select">
                <option value="">Plan to Degree</option>
                <option value="Yes" <?= ($plan_degree ?? '') === 'Yes' ? 'selected' : '' ?>>Yes</option>
                <option value="No" <?= ($plan_degree ?? '') === 'No' ? 'selected' : '' ?>>No</option>
            </select>

            <select name="degree_field" class="filter-select">
                <option value="">Degree Field</option>
                <option value="Game Technology" <?= ($degree_field ?? '') === 'Game Technology' ? 'selected' : '' ?>>Game Technology</option>
                <option value="Software Engineering" <?= ($degree_field ?? '') === 'Software Engineering' ? 'selected' : '' ?>>Software Engineering</option>
                <option value="Artificial Intelligence" <?= ($degree_field ?? '') === 'Artificial Intelligence' ? 'selected' : '' ?>>Artificial Intelligence</option>
                <option value="Interactive Media" <?= ($degree_field ?? '') === 'Interactive Media' ? 'selected' : '' ?>>Interactive Media</option>
                <option value="Computer Networking" <?= ($degree_field ?? '') === 'Computer Networking' ? 'selected' : '' ?>>Computer Networking</option>
                <option value="Cloud Computing" <?= ($degree_field ?? '') === 'Cloud Computing' ? 'selected' : '' ?>>Cloud Computing</option>                    
                <option value="N/A" <?= ($degree_field ?? '') === 'N/A' ? 'selected' : '' ?>>N/A</option>
            </select>

            <button type="submit" class="filter-btn">Apply</button>
            <a href="?" class="clear-btn" style="text-decoration: none; font-family: sans-serif; font-size: 14px; color: #64748b;">Clear All</a>
        </div>
    </form>
</div> 

</div>
        <div class="content">
            <table class="table-student">
                <thead>
                    <tr>
                        <th class="name-col" style="width: 40%;">Student Name</th>
                        <th>Muet Status</th>
                        <th>CGPA</th>
                        <th>Plan To Continue Degree</th>
                        <th>Preferred Degree Field</th>
                        <th>View Record</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (empty($students)): ?>
                        <tr>
                            <td colspan="6">No supervised students assigned to your record.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($students as $s): ?>
                            <?php $student_cgpa = isset($s['CGPA']) ? (float)$s['CGPA'] : 0.00; ?>
                            <tr style="border-bottom: 1px solid #dee2e6;">

                                <td class="name-col">
                                    <?= htmlspecialchars($s['name']) ?>
                                </td>

                                <td>
                                    <span style="<?= $s['muet_status'] != 'Pass' ? 'color: #dc3545;' : '' ?>">
                                        <?= htmlspecialchars($s['muet_status']) ?>
                                    </span>
                                </td>

                                <td>
                                    <?php if ($student_cgpa < 2.00): ?>
                                        <span style="color: #dc3545; font-weight: bold; display:inline-flex; gap:4px; align-items: center;"> <img src="../assets/icons/triangle-warning.png" alt="" style="height: 16px;"> <?= number_format($student_cgpa, 2) ?></span>
                                    <?php elseif ($student_cgpa >= 3.50): ?>
                                        <span style="color: #28a745; font-weight: bold; display:inline-flex; gap:4px; align-items: center;"> <img src="../assets/icons/medal.png" alt="" style="height: 16px;"> <?= number_format($student_cgpa, 2) ?></span>
                                    <?php else: ?>
                                        <?= number_format($student_cgpa, 2) ?>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($s['plan_to_degree']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($s['preferred_degree_field'] ?? 'N/A') ?>
                                </td>

                                <td>
                                    <a href="advisor-records.php?user_id=<?= $s['user_id'] ?>">
                                        <img src="../assets/icons/record.png" alt="View Record" style="width: 22px; height: 22px; cursor: pointer; vertical-align: middle;">
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
    </main>
</body>

</html>