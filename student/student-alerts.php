<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Alerts - UTeM Student</title>
  <link rel="stylesheet" href="../style/styles.css">
  <style>
    .alerts-wrap {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .alert-card {
      background: #d9d9d9;
      border: 1px solid #999;
      border-radius: 6px;
      padding: 14px 18px;
      font-size: 14px;
    }

    .alert-card summary {
      cursor: pointer;
      display: flex;
      justify-content: space-between;
      font-weight: 600;
      list-style: none;
    }

    .alert-desc {
      margin-top: 10px;
      padding-top: 10px;
      border-top: 1px solid #bbb;
      font-weight: 400;
    }
  </style>
</head>

<body>
  <div class="app">
    <?php
    $activePage = 'alerts';
    include("components/sidebar-student.php");
    ?>

    <?php
    $pageTitle = 'Alerts';
    include("components/topbar-student.php");
    ?>

    <main class="content">
      <div class="alerts-wrap">
        <details class="alert-card">
          <summary>⚠️ Warning : Insufficient Credit Hours<span class="caret">▾</span></summary>
          <div class="alert-desc">
            You currently have 14 credits this semester. Minimum required is 16.
          </div>
        </details>
        <details class="alert-card">
          <summary>⚠️ Warning : CGPA doesn't met requirement<span class="caret">▾</span></summary>
          <div class="alert-desc">
            Your CGPA is below 2.50. Academic probation may apply.
          </div>
        </details>
        <details class="alert-card">
          <summary>⚠️ Warning : Course Grade below recommended amount<span class="caret">▾</span></summary>
          <div class="alert-desc">
            You received a D grade in BITP3013. Consider retaking.
          </div>
        </details>
        <details class="alert-card">
          <summary>⚠️ Warning : MUET status not updated<span class="caret">▾</span></summary>
          <div class="alert-desc">
            Please update your MUET result in the profile section.
          </div>
        </details>
      </div>
    </main>
  </div>
</body>

</html>