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

 <style>

       
        .profile-card {
            border: 3px solid #5b92e5;
            border-radius: 30px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
            flex-direction: row;
            width: 100%;
        }

        
        .avatar-circle {
            width: 80px;
            height: 80px;
            border: 2px solid #000000;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 5px;
        }

        .profile-summary h2 {
            font-size: 24px;
            font-weight: 700;
            color: #000000;
            margin-bottom: 4px;
        }

        .profile-summary .institution {
            font-size: 16px;
            color: #111111;
            margin-bottom: 6px;
        }

        .profile-summary .academic-meta {
            font-size: 14px;
            color: #333333;
        }

        .academic-meta span {
            margin-right: 15px;
        }

      
        .details-box {
            border: 3px solid #5b92e5;
            border-radius: 30px;
            padding: 15px 30px;
            flex-direction: row;
            width: 100%;
        }


        .details-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            row-gap: 25px;
            column-gap: 20px;
            margin-bottom: 30px;
        }

        .info-group {
            display: flex;
            flex-direction: column;
        }

        .label {
            font-size: 15px;
            font-weight: 700;
            color: #000000;
            margin-bottom: 5px;
        }

        .value {
            font-size: 16px;
            color: #222222;
        }

      
        .address-container {
            background-color: #94c1ff;
            border-radius: 20px;
            padding: 20px 25px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .address-container .label {
            font-size: 15px;
            font-weight: 700;
            color: #000000;
        }

        .address-container .value {
            font-size: 16px;
            color: #000000;
        }
    </style>

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
                    <span class="value">D032410...</span>
                </div>

                <div class="info-group" style="grid-column: span 2;">
                    <span class="label">Email</span>
                    <span class="value">D032410...@student.utem.edu.my</span>
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