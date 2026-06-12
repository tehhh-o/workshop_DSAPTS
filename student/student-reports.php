<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title> 
    <link rel="stylesheet" href="../style/layout.css">
    <link rel="stylesheet" href="../style/student.css">
    <link rel="stylesheet" href="../style/styles.css">
</head>

</head>
<body>

<body class="page-body main-gradient-bg">
    <?php
    $activePage = 'reports';
    include("components/sidebar-student.php")
    ?>

</head>
<body>

    <main class="main-content main-rounded">
        <h1 class="content-title">Reports</h1>
        
    <main class="content">
     
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports Interface</title>
    <style>
        * {
            box-sizing: border-box;
           
            margin: 0;
            padding: 0;
        }

        /* Top Control Bar Inner Border Container */
        .controls-wrapper {
            border: 3px solid #5b92e5;
            border-radius: 30px;
            padding: 15px 30px;
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
        }

        /* Dropdown and Button Common Styles */
        .control-element {
            background-color: #94c1ff;
            border: 2px solid #000000;
            border-radius: 12px;
            padding: 12px 24px;
            font-size: 18px;
            font-weight: 500;
            color: #000000;
            cursor: pointer;
            outline: none;
            text-align: center;
        }

        select.control-element {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            /* Custom dropdown arrow styling */
            background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'><polyline points='6 9 12 15 18 9'></polyline></svg>");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 18px;
            padding-right: 45px;
            width: 260px;
        }

        button.control-element {
            width: 260px;
            transition: background-color 0.2s;
        }

        button.control-element:hover {
            background-color: #76aaff;
        }

        /* Chart Detailed Report Outer Container */
        .report-wrapper {
            border: 4px solid #4a7bc7;
            border-radius: 35px;
            padding: 30px;
            min-height: 400px;
        }

        .report-title {
            font-size: 18px;
            font-weight: 700;
            color: #000000;
            margin-bottom: 30px;
        }

    </style>
</head>
<body>

    <div class="main-container">

        <div class="controls-wrapper">
            <select class="control-element">
                <option>Semester 1</option>
                <option>Semester 2</option>
            </select>
            
            <button class="control-element">Overall Report</button>
        </div>

        <div class="report-wrapper">
            <h2 class="report-title">Detailed Report - Ahmad Bin Ali, Semester 1</h2>
            
            <div class="chart-container">
                <div class="bar bar-1"></div>
                <div class="bar bar-2"></div>
                <div class="bar bar-3"></div>
                <div class="bar bar-4"></div>
                <div class="bar bar-5"></div>
            </div>
        </div>

    </div>

</body>
</html>
    </main>
  </div>
</body>

</html>
