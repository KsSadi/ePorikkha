<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ePorikkha - Modern Online Examination System</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

        :root {
            --primary-color: #4f46e5;
            --primary-dark: #3730c2;
            --primary-light: #eef2ff;
            --secondary-color: #06b6d4;
            --text-color: #1f2937;
            --text-light: #4b5563;
            --light-bg: #f9fafb;
            --white: #ffffff;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --shadow-sm: 0 1px 2px 0 rgba(0,0,0,0.05);
            --shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
            --shadow-md: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05);
            --shadow-lg: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04);
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            background-color: var(--light-bg);
            line-height: 1.7;
        }

        /* Navbar Styles */
        .navbar {
            background-color: var(--white);
            box-shadow: var(--shadow);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .logo-icon {
            font-size: 28px;
            margin-right: 12px;
            color: var(--primary-color);
            background: var(--primary-light);
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
        }

        .logo-text {
            font-size: 22px;
            font-weight: 700;
            color: var(--primary-color);
            letter-spacing: -0.5px;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-login:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            z-index: -1;
            transition: width 0.5s ease;
        }

        .btn-login:hover:before {
            width: 100%;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
            color: white;
        }

        /* Hero Section */
        .hero-section {
            padding: 100px 0 120px;
            background: linear-gradient(135deg, #ffffff 0%, var(--primary-light) 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -10%;
            right: -10%;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(79, 70, 229, 0.1) 0%, rgba(6, 182, 212, 0.1) 100%);
            z-index: 0;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            bottom: -15%;
            left: -5%;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.1) 0%, rgba(79, 70, 229, 0.1) 100%);
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 24px;
            color: var(--text-color);
            line-height: 1.2;
            letter-spacing: -1px;
        }

        .hero-title span {
            color: var(--primary-color);
            position: relative;
        }

        .hero-title span::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 0;
            width: 100%;
            height: 10px;
            background-color: rgba(79, 70, 229, 0.2);
            z-index: -1;
            border-radius: 10px;
        }

        .hero-description {
            max-width: 700px;
            margin: 0 auto 36px;
            font-size: 1.2rem;
            color: var(--text-light);
            font-weight: 400;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 10px;
            padding: 14px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-primary:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            z-index: -1;
            transition: width 0.5s ease;
        }

        .btn-primary:hover:before {
            width: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .btn-icon {
            margin-right: 10px;
        }

        /* Calendar Card Style */
        .calendar-card {
            background-color: var(--white);
            border-radius: 20px;
            padding: 30px;
            box-shadow: var(--shadow-lg);
            max-width: 380px;
            margin: 50px auto 0;
            position: relative;
            z-index: 1;
            transform: translateY(0);
            transition: transform 0.3s ease;
            border: 1px solid var(--gray-200);
        }

        .calendar-card:hover {
            transform: translateY(-10px);
        }

        .date-display {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .calendar-day {
            font-size: 3.2rem;
            font-weight: 800;
            color: var(--primary-color);
            line-height: 1;
            background: var(--primary-light);
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
        }

        .calendar-month {
            font-size: 0.95rem;
            color: var(--text-light);
            text-transform: uppercase;
            font-weight: 500;
            letter-spacing: 1px;
        }

        .calendar-event {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-color);
            margin-top: 5px;
            line-height: 1.3;
        }

        .calendar-time {
            font-size: 0.9rem;
            color: var(--text-light);
            display: flex;
            align-items: center;
            margin-top: 8px;
            font-weight: 500;
        }

        .calendar-time i {
            margin-right: 8px;
            color: var(--secondary-color);
        }

        /* Features Section */
        .features-section {
            padding: 100px 0;
            background-color: var(--white);
            position: relative;
        }

        .features-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(to bottom, var(--light-bg), var(--white));
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 15px;
            color: var(--text-color);
            letter-spacing: -0.5px;
        }

        .section-subtitle {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 60px;
            color: var(--text-light);
            font-size: 1.1rem;
        }

        .feature-card {
            background-color: var(--white);
            border-radius: 20px;
            padding: 35px;
            height: 100%;
            transition: all 0.3s ease;
            border: 1px solid var(--gray-200);
            box-shadow: var(--shadow-sm);
            position: relative;
            z-index: 1;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-md);
        }

        .feature-card:hover::before {
            transform: scaleX(1);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            border-radius: 15px;
            background: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: var(--primary-color);
            margin-bottom: 25px;
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            transform: scale(1.1);
        }

        .feature-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--text-color);
        }

        .feature-description {
            color: var(--text-light);
            font-size: 1rem;
            line-height: 1.7;
        }

        /* Development Team Section */
        .developer-section {
            background-color: var(--primary-light);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .developer-section::before,
        .developer-section::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(79, 70, 229, 0.1);
        }

        .developer-section::before {
            width: 300px;
            height: 300px;
            top: -120px;
            right: -100px;
        }

        .developer-section::after {
            width: 200px;
            height: 200px;
            bottom: -80px;
            left: -80px;
        }

        .developer-heading {
            text-align: center;
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 50px;
            position: relative;
            display: inline-block;
            left: 50%;
            transform: translateX(-50%);
        }

        .developer-heading::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            border-radius: 2px;
            left: 50%;
            transform: translateX(-50%);
        }

        .team-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 30px;
            position: relative;
            z-index: 1;
        }

        .developer-card, .mentors-card {
            flex: 1;
            min-width: 300px;
            background: var(--white);
            border-radius: 20px;
            padding: 30px;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
        }

        .developer-card:hover, .mentors-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .developer-title {
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 25px;
            text-align: center;
            font-size: 1.2rem;
            position: relative;
            display: inline-block;
            left: 50%;
            transform: translateX(-50%);
        }

        .developer-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            border-radius: 2px;
            left: 50%;
            transform: translateX(-50%);
        }

        .mentors-container {
            display: flex;
            justify-content: space-around;
            gap: 20px;
            flex-wrap: wrap;
        }

        .developer-profile {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transition: all 0.3s ease;
        }

        .developer-profile:hover {
            transform: translateY(-5px);
        }

        .profile-pic {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 20px;
            border: 4px solid var(--primary-light);
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }

        .developer-profile:hover .profile-pic {
            border-color: var(--primary-color);
            transform: scale(1.05);
        }

        .profile-pic img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .developer-profile:hover .profile-pic img {
            transform: scale(1.1);
        }

        .developer-name {
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 5px;
            font-size: 1.1rem;
        }

        .developer-role {
            font-size: 0.9rem;
            color: var(--text-light);
            font-weight: 500;
            padding: 5px 15px;
            background: var(--primary-light);
            border-radius: 20px;
            display: inline-block;
        }

        /* Footer */
        .footer {
            background-color: var(--white);
            padding: 40px 0 0;
            position: relative;
        }

        .footer-bottom {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 30px 30px 0 0;
            padding: 20px;
            margin-top: 40px;
            color: white;
            font-weight: 600;
            text-align: center;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }

        .footer-bottom::before,
        .footer-bottom::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }

        .footer-bottom::before {
            width: 100px;
            height: 100px;
            bottom: -50px;
            left: 15%;
        }

        .footer-bottom::after {
            width: 80px;
            height: 80px;
            bottom: -30px;
            right: 10%;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.8rem;
            }
            .calendar-card {
                margin-top: 40px;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 80px 0 100px;
            }
            .hero-title {
                font-size: 2.4rem;
            }
            .section-title {
                font-size: 2rem;
            }
            .features-section {
                padding: 80px 0;
            }
            .feature-card {
                margin-bottom: 20px;
                padding: 25px;
            }
            .team-container {
                flex-direction: column;
            }
            .developer-card, .mentors-card {
                min-width: 100%;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 2rem;
            }
            .hero-description {
                font-size: 1rem;
            }
            .calendar-day {
                font-size: 2.5rem;
                width: 60px;
                height: 60px;
            }
            .calendar-event {
                font-size: 1.1rem;
            }
            .btn-primary, .btn-login {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar">
    <div class="container">
        <a href="#" class="logo">
            <div class="logo-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="logo-text">ePorikkha</div>
        </a>

        @if(auth()->check())
            <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}" class="btn btn-login">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
        @else
            <a href="{{ route('login') }}" class="btn btn-login">
                <i class="fas fa-sign-in-alt me-2"></i> Login
            </a>
        @endif



    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 hero-content text-center text-lg-start">
                <h1 class="hero-title">Transform Your <span>Examination</span> Experience</h1>
                <p class="hero-description">Create, manage, and grade online exams effortlessly with our secure and intuitive platform designed for educators and students.</p>

                <a href="#" class="btn btn-primary">
                    <i class="fas fa-rocket btn-icon"></i> Get Started Today
                </a>
            </div>
            <div class="col-lg-5">
                <!-- Calendar Card Example -->
                <div class="calendar-card">
                    <div class="date-display">
                        <div class="calendar-day">20</div>
                        <div>
                            <div class="calendar-month">May 2025</div>
                            <div class="calendar-event">Chemistry Lab Final</div>
                            <div class="calendar-time">
                                <i class="far fa-clock"></i> 9:30 AM - 11:30 AM
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <h2 class="section-title">Powerful Features</h2>
        <p class="section-subtitle">Discover the innovative tools that make ePorikkha the ultimate solution for modern online examinations.</p>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="feature-title">Secure Exam Environment</h3>
                    <p class="feature-description">Advanced proctoring options with AI-powered monitoring and anti-cheating measures to maintain academic integrity in every assessment.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="feature-title">Smart Time Management</h3>
                    <p class="feature-description">Set specific time limits for each question or the entire exam with automatic submission and intelligent time warnings for students.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h3 class="feature-title">Comprehensive Analytics</h3>
                    <p class="feature-description">Detailed reports and visual insights on student performance, question difficulty, and exam effectiveness for data-driven improvements.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="feature-title">Fully Responsive Design</h3>
                    <p class="feature-description">Take exams on any device with our fully adaptive interface that provides a seamless experience on desktops, tablets, and smartphones.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h3 class="feature-title">Diverse Question Types</h3>
                    <p class="feature-description">Support for multiple-choice, essay, file upload, matching, true/false, code execution, and many more customizable question formats.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-robot"></i>
                    </div>
                    <h3 class="feature-title">AI-Powered Grading</h3>
                    <p class="feature-description">Instant scoring for objective questions and advanced AI-assisted evaluation for subjective responses with customizable rubrics.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Development Team Section -->
<div class="developer-section">
    <div class="container">
        <h3 class="developer-heading">Our Talented Team</h3>
        <div class="team-container">
            <div class="developer-card">
                <div class="developer-title">Crafted By</div>
                <div class="developer-profile">
                    <div class="profile-pic">
                        <img src="/api/placeholder/300/300" alt="Developer">
                    </div>
                    <div class="developer-name">Khaled Saifullah Sadi</div>
                    <div class="developer-role">Programmer</div>
                </div>
            </div>
            <div class="mentors-card">
                <div class="developer-title">Mentorship & Guidance</div>
                <div class="mentors-container">
                    <div class="developer-profile">
                        <div class="profile-pic">
                            <img src="/api/placeholder/300/300" alt="Mentor 1">
                        </div>
                        <div class="developer-name">Jane Doe</div>
                        <div class="developer-role">Senior Developer</div>
                    </div>
                    <div class="developer-profile">
                        <div class="profile-pic">
                            <img src="/api/placeholder/300/300" alt="Mentor 2">
                        </div>
                        <div class="developer-name">Michael Johnson</div>
                        <div class="developer-role">Technical Lead</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="footer-bottom">
        Crafted with <i class="fas fa-heart mx-1"></i> by WebCrafter Team
    </div>
</footer>

<!-- Bootstrap JS and other script imports if needed -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
