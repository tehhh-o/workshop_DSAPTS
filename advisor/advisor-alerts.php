<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alerts</title> <!-- change this title -->
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/advisor.css">
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body class="page-body main-gradient-bg">
    <?php
    $activePage = 'alert';
    include("components/sidebar-advisor.php")
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Alerts</h1>
<div class="table-container">

  <div class="grid-row table-header">
    <div class="column-name">Student Name</div>
    <div class="column-type">Alert Type</div>
    <div class="column-date">Date</div>
  </div>

  <div class="grid-row table-row">
    <div class="column-name">
        <span>Hakim</span>
        <span class="description">Failed Subject ..... actions needed.</span>
    </div>
    <div class="column-type">Failed subject</div>
    <div class="column-date">Semester 3,May 07 2026</div>
  </div>
  
  <div class="grid-row table-row">
    <div class="column-name">
        <span>Halim</span>
        <span class="description">Muet Status not updated ... actions needed.</span>
    </div>
    <div class="column-type">Muet Status</div>
    <div class="column-date">Semester 4,June 20 2026</div>
  </div>
  
</div>
    </main>
</body>

</html>