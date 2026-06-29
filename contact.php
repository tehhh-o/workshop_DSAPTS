<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us - DSAPTS</title>
    <link rel="stylesheet" href="style/layout.css">
    <link rel="stylesheet" href="style/auth.css">
    <style>
        .contact-container {
            width: 100%;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .contact-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 80px;
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .contact-nav a {
            margin-left: 20px;
            text-decoration: none;
            color: #002060;
            font-weight: bold;
        }

        .contact-nav a:hover {
            text-decoration: underline;
        }

        .contact-banner {
            width: 100%;
            height: 350px;
            object-fit: cover;
            display: block;
        }

        .contact-content {
            max-width: 1100px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .section-title {
            text-align: center;
            color: #002060;
            font-size: 32px;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .section-subtitle {
            text-align: center;
            color: #666666;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 50px;
            font-weight: bold;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .personnel-card {
            text-align: center;
            background: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.03);
            border-top: 4px solid #002060;
            transition: transform 0.2s;
        }

        .personnel-card.featured {
            border-top: 4px solid #00a896;
            grid-column: 1 / -1;
            max-width: 500px;
            margin: 0 auto 20px auto;
        }

        .personnel-card:hover {
            transform: translateY(-3px);
        }

        .personnel-name {
            font-size: 18px;
            font-weight: bold;
            color: #333333;
            text-transform: uppercase;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .personnel-role {
            font-size: 13px;
            color: #00a896;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        .personnel-email {
            font-size: 15px;
            color: #002060;
            text-decoration: none;
            word-break: break-all;
        }

        .personnel-email:hover {
            text-decoration: underline;
        }

        .contact-divider {
            width: 150px;
            height: 1px;
            background-color: #dddddd;
            margin: 10px auto;
        }
    </style>
</head>

<body>

    <div class="contact-container">
        
        <header class="contact-header">
            <div class="logo-section">
                <img src="assets/imgs/dsapts-full.png" alt="DSAPTS Logo" height="50px">
            </div>
            <nav class="contact-nav">
                <a href="index.php">Home</a>
                <a href="about.php">About Us</a>
                <a href="contact.php" style="border-bottom: 2px solid #002060;">Contact Us</a>
            </nav>
        </header>

        <img src="assets/imgs/banner-about.jpg" alt="DSAPTS Contact Banner" class="contact-banner">

        <main class="contact-content">
            <h2 class="section-title">Project Support & Evaluation</h2>
            <div class="section-subtitle">Integrated Course Evaluation Helpdesk</div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px; margin-bottom: 40px;">
                
                <div class="personnel-card" style="border-top: 4px solid #00a896;">
                    <div class="personnel-role">DITU 3934 Course Evaluator</div>
                    <div class="personnel-name">Rosmiza Wahida binti Abdullah</div>
                    <div class="contact-divider"></div>
                    <p style="color: #666666; font-size: 14px; margin: 5px 0 15px 0;">Faculty of Information and Communication Technology, UTeM</p>
                    <a href="mailto:rosmiza@utem.edu.my" class="personnel-email">rosmiza@utem.edu.my</a>
                </div>

                <div class="personnel-card" style="border-top: 4px solid #00a896;">
                    <div class="personnel-role">DITM 2123 Course Evaluator</div>
                    <div class="personnel-name">Ts.Norazlin binti Mohammed</div>
                    <div class="contact-divider"></div>
                    <p style="color: #666666; font-size: 14px; margin: 5px 0 15px 0;">Faculty of Information and Communication Technology, UTeM</p>
                    <a href="mailto:norazlin@utem.edu.my" class="personnel-email">norazlin@utem.edu.my</a>
                </div>

            </div>

            <div style="text-align: center; margin-bottom: 25px;">
                <h3 style="color: #002060; font-size: 22px; text-transform: uppercase;">Development Support Team</h3>
            </div>

            <div class="contact-grid">
                
                <div class="personnel-card">
                    <div class="personnel-role">Project Leader</div>
                    <div class="personnel-name">Aqil Hariz Bin Zulkarnain</div>
                    <div class="contact-divider"></div>
                    <a href="mailto:D032410290@student.utem.edu.my" class="personnel-email">D032410290@student.utem.edu.my</a>
                </div>

                <div class="personnel-card">
                    <div class="personnel-role">Authentication & Security</div>
                    <div class="personnel-name">Abdullah Hakim Bin Mohd Salleh</div>
                    <div class="contact-divider"></div>
                    <a href="mailto:D032410139@student.utem.edu.my" class="personnel-email">D032410139@student.utem.edu.my</a>
                </div>

                <div class="personnel-card">
                    <div class="personnel-role">Backend Developer</div>
                    <div class="personnel-name">Wan Muhammad Ersyad Asyraf</div>
                    <div class="contact-divider"></div>
                    <a href="mailto:D032410259@student.utem.edu.my" class="personnel-email">D032410259@student.utem.edu.my</a>
                </div>

                <div class="personnel-card">
                    <div class="personnel-role">Analytics & Reporting</div>
                    <div class="personnel-name">Elvin Teh Jie Ming</div>
                    <div class="contact-divider"></div>
                    <a href="mailto:D032410352@student.utem.edu.my" class="personnel-email">D032410352@student.utem.edu.my</a>
                </div>

                <div class="personnel-card">
                    <div class="personnel-role">Frontend UI/UX</div>
                    <div class="personnel-name">Zulkiflie Bin Muhamad Zunaini</div>
                    <div class="contact-divider"></div>
                    <a href="mailto:D032410240@student.utem.edu.my" class="personnel-email">D032410240@student.utem.edu.my</a>
                </div>

            </div>
        </main>

    </div>

</body>
</html>