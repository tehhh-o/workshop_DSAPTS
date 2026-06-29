<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us</title>
    <link rel="stylesheet" href="style/layout.css">
    <link rel="stylesheet" href="style/auth.css">
    <style>
        .about-container {
            width: 100%;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .about-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 80px;
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .about-nav a {
            margin-left: 20px;
            text-decoration: none;
            color: #002060;
            font-weight: bold;
        }

        .about-nav a:hover {
            text-decoration: underline;
        }

        .about-banner {
            width: 100%;
            height: 350px;
            object-fit: cover;
            display: block;
        }

        .about-content {
            max-width: 1100px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .section-title {
            text-align: center;
            color: #002060;
            font-size: 32px;
            margin-bottom: 40px;
            position: relative;
            font-weight: bold;
        }

        .section-title::after {
            content: '';
            position: absolute;
            left: 45%;
            bottom: -10px;
            width: 10%;
            height: 4px;
            background-color: #00a896;
        }

        .about-description {
            color: #333333;
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 40px;
            text-align: justify;
        }

        .strategic-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            margin-bottom: 50px;
        }

        .strategic-card {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            border-left: 5px solid #002060;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        .strategic-card h3 {
            color: #002060;
            margin-top: 0;
            font-size: 22px;
            margin-bottom: 15px;
        }

        .info-table-container {
            background-color: #002060;
            color: #ffffff;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }

        .info-row {
            display: grid;
            grid-template-columns: 250px 1fr;
            padding: 18px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: bold;
            font-size: 16px;
            color: #00a896;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            font-size: 16px;
            line-height: 1.6;
        }

        .info-value ul {
            margin: 0;
            padding-left: 20px;
        }

        .info-value li {
            margin-bottom: 8px;
        }
    </style>
</head>

<body>

    <div class="about-container">
        
        <header class="about-header">
            <div class="logo-section">
                <img src="assets/imgs/dsapts-full.png" alt="DSAPTS Logo" height="50px">
            </div>
            <nav class="about-nav">
                <a href="index.php">Home</a>
                <a href="about.php" style="border-bottom: 2px solid #002060;">About Us</a>
                <a href="contact.php">Contact Us</a>
            </nav>
        </header>

        <img src="assets/imgs/banner-about.jpg" alt="DSAPTS Background Banner" class="about-banner">

        <main class="about-content">
            <h2 class="section-title">About DSAPTS</h2>
            
            <div class="about-description">
                <p>
                    The <b>Diploma Student Academic and Progress Tracking System (DSAPTS)</b> is an integrated web application 
                    jointly developed for <b>DITU 3934 (System Development Workshop)</b> and <b>DITM 2123 (Web Programming)</b> 
                    at Universiti Teknikal Malaysia Melaka (UTeM). The system targets the operational gap where academic advisors 
                    traditionally use fragmented spreadsheets or manual records to monitor student metrics like GPA and credit hours. 
                    Through modern web-driven governance, DSAPTS offers real-time, interactive performance tracking for both advisors 
                    and Diploma in Computer Science students.
                </p>
            </div>

            <div class="strategic-grid">
                <div class="strategic-card">
                    <h3>System Workshop (DITU 3934)</h3>
                    <p>Focuses on full-lifecycle system requirements, structural analysis (DFD/ERD), role-based access control, secure authentication, and institutional planning optimization aligned with SDG 4.</p>
                </div>
                <div class="strategic-card">
                    <h3>Web Programming (DITM 2123)</h3>
                    <p>Focuses on core technical implementation including client-side dynamic scripting, form validation, responsive layouts, web server configuration, and robust server-side scripting via PHP & MySQL.</p>
                </div>
            </div>

            <div class="info-table-container">
                
                <div class="info-row">
                    <div class="info-label">Integrated Courses</div>
                    <div class="info-value">DITU 3934 (System Development Workshop) & DITM 2123 (Web Programming)</div>
                </div>

                <div class="info-row">
                    <div class="info-label">Project Leader & Integration</div>
                    <div class="info-value">
                        <b>AQIL HARIZ BIN ZULKARNAIN</b> (D032410290)<br>
                        <small>Oversees project milestones, full-stack workflow compatibility, and core module deployment.</small>
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-label">Authentication & Security</div>
                    <div class="info-value">
                        <b>ABDULLAH HAKIM BIN MOHD SALLEH</b> (D032410139)<br>
                        <small>Develops secure login portals and role-based interface restrictions (Admins, Advisors, Students).</small>
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-label">Backend & Database</div>
                    <div class="info-value">
                        <b>WAN MUHAMMAD ERSYAD ASYRAF BIN WAN JUSOH</b> (D032410259)<br>
                        <small>Engineers MySQL relational structures, manages academic history logs, and processes PHP server logic.</small>
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-label">Analytics & Reporting</div>
                    <div class="info-value">
                        <b>ELVIN TEH JIE MING</b> (D032410352)<br>
                        <small>Implements automated automated performance email alerts and aggregates data analytics reports.</small>
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-label">Frontend UI/UX</div>
                    <div class="info-value">
                        <b>ZULKIFLIE BIN MUHAMAD ZUNAINI</b> (D032410240)<br>
                        <small>Crafts responsive interfaces, client-side interactions, and live progress-tracking visualization dashboards.</small>
                    </div>
                </div>

            </div>
        </main>

    </div>

</body>
</html>