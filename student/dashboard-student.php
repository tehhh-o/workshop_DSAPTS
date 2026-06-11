<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard - UTeM Student</title>
  <link rel="stylesheet" href="../style/styles.css">
  <style>
    .btn-pill {
      background: #d9d9d9;
      border: 1px solid #999;
      padding: 8px 18px;
      border-radius: 4px;
      font-size: 14px;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div class="app">
    <?php
    $activePage = 'dashboard';
    include("components/sidebar-student.php");
    ?>

    <?php
    $pageTitle = 'Student Dashboard';
    include("components/topbar-student.php");
    ?>

    <main class="content">
      <div style="display: flex; gap: 16px; align-items: flex-start;">
        <button class="btn-pill">CGPA</button>
        <div style="flex: 1; background: #fff; border: 1px solid #999; padding: 16px; border-radius: 6px;">
       <svg viewBox="0 0 660 340" width="100%" style="background: #fff; font-family: sans-serif;">

        <text x="10" y="20" font-size="14" font-weight="bold">CGPA Chart</text>

  
        <line x1="40" y1="40" x2="40" y2="300" stroke="#000" stroke-width="4" stroke-linecap="square" />
        <line x1="40" y1="300" x2="440" y2="300" stroke="#000" stroke-width="4" stroke-linecap="square" />

        
        <line x1="35" y1="300" x2="40" y2="300" stroke="#000" stroke-width="3" />
        <line x1="35" y1="213" x2="40" y2="213" stroke="#000" stroke-width="3" />
        <line x1="35" y1="126" x2="40" y2="126" stroke="#000" stroke-width="3" />
        <line x1="35" y1="40" x2="40" y2="40" stroke="#000" stroke-width="3" />

 
        <line x1="40" y1="300" x2="40" y2="305" stroke="#000" stroke-width="3" />
        <line x1="110" y1="300" x2="110" y2="305" stroke="#000" stroke-width="3" />
        <line x1="180" y1="300" x2="180" y2="305" stroke="#000" stroke-width="3" />
        <line x1="250" y1="300" x2="250" y2="305" stroke="#000" stroke-width="3" />
        <line x1="320" y1="300" x2="320" y2="305" stroke="#000" stroke-width="3" />
        <line x1="390" y1="300" x2="390" y2="305" stroke="#000" stroke-width="3" />


        <text x="20" y="304" font-size="14" font-weight="bold" text-anchor="middle">1</text>
        <text x="20" y="217" font-size="14" font-weight="bold" text-anchor="middle">2</text>
        <text x="20" y="130" font-size="14" font-weight="bold" text-anchor="middle">3</text>
        <text x="20" y="44" font-size="14" font-weight="bold" text-anchor="middle">4</text>


        <polyline fill="none" stroke="#000" stroke-width="2"
         points="40,75 110,105 180,105 250,75 320,113 390,75" />


        <circle cx="40" cy="75" r="6" fill="#7cd1ff" />
        <circle cx="110" cy="105" r="6" fill="#7cd1ff" />
        <circle cx="180" cy="105" r="6" fill="#7cd1ff" />
        <circle cx="250" cy="75" r="6" fill="#7cd1ff" />
        <circle cx="320" cy="113" r="6" fill="#7cd1ff" />
        <circle cx="390" cy="75" r="6" fill="#7cd1ff" />

        <text x="40" y="320" font-size="11" text-anchor="middle">SEM 1</text>
        <text x="110" y="320" font-size="11" text-anchor="middle">SEM 2</text>
        <text x="180" y="320" font-size="11" text-anchor="middle">SEM 3</text>
        <text x="250" y="320" font-size="11" text-anchor="middle">SEM 4</text>
        <text x="320" y="320" font-size="11" text-anchor="middle">SEM 5</text>
        <text x="390" y="320" font-size="11" text-anchor="middle">SEM 6</text>
      </svg>

          <div style="text-align: center; margin-top: 10px;">
            <button class="btn-pill">SEMESTER ▾</button>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>

</html>