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
    $activePage = 'students';
    include("components/sidebar-advisor.php")
    ?>

    <main class="main-content main-rounded">
        <h1 class="content-title">Student List</h1>
<div class="table-container">
  <!-- THE HEADER -->
  <div class="grid-row table-header">
    <div class="column-name">Student Name</div>
    <div class="column-type">Muet Status</div>
  </div>

  <!-- DATA ROW 1 -->
  <div class="grid-row table-row">
    <div class="column-name">
        <span>Hakim</span>
    </div>
    <div class="column-type">Completed.</div>
  </div>

  <!-- DATA ROW 2 -->
  <div class="grid-row table-row">
    <div class="column-name">
        <span>Halim</span>
    </div>
    <div class="column-type">Uncomplete.</div>
  </div>
  
</div>
    </main>
</body>

</html>