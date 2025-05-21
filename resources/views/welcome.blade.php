<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ePorikkha - Complete Online Examination Platform for Bangladesh</title>
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS Animation Library -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <style>
        :root {
            --primary: #5E35B1;
            --primary-dark: #4527A0;
            --secondary: #00BCD4;
            --accent: #FF5722;
            --success: #4CAF50;
            --dark: #222831;
            --light: #f8f9fa;
            --gray: #EEEEEE;
            --light-text: #7F8997;
            --dark-text: #37474F;
            --border-radius: 16px;
            --card-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            --transition: all 0.3s ease;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--dark-text);
            overflow-x: hidden;
            background-color: #FAFBFC;
        }

        section {
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }

        /* Shared Background Shapes */
        .bg-shapes,
        .features-bg,
        .user-types-bg,
        .how-it-works-bg,
        .benefits-bg,
        .testimonials-bg,
        .registration-bg {
            position: relative;
            overflow: hidden;
        }

        /* Features Section Background */
        .features-section {
            background-color: #F0F7FF;
        }

        .features-shape-1 {
            position: absolute;
            top: -250px;
            right: -250px;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(94, 53, 177, 0.05) 0%, rgba(0, 188, 212, 0.05) 100%);
            z-index: 0;
        }

        .features-shape-2 {
            position: absolute;
            bottom: -250px;
            left: -250px;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(0, 188, 212, 0.05) 0%, rgba(94, 53, 177, 0.05) 100%);
            z-index: 0;
        }

        .features-shape-3 {
            position: absolute;
            top: 30%;
            left: 10%;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 87, 34, 0.03);
            z-index: 0;
        }



        /* Benefits Section Background */
        .benefits-section {
            background-color: #FFF0F5;
        }

        .benefits-shape-1 {
            position: absolute;
            top: -220px;
            left: -220px;
            width: 450px;
            height: 450px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(233, 30, 99, 0.05) 0%, rgba(156, 39, 176, 0.05) 100%);
            z-index: 0;
        }

        .benefits-shape-2 {
            position: absolute;
            bottom: -220px;
            right: -220px;
            width: 450px;
            height: 450px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(156, 39, 176, 0.05) 0%, rgba(233, 30, 99, 0.05) 100%);
            z-index: 0;
        }

        /* Testimonials Section Background */
        .testimonials-section {
            background-color: #F0FAFF;
        }

        .testimonials-shape-1 {
            position: absolute;
            top: -200px;
            right: -200px;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(3, 169, 244, 0.05) 0%, rgba(0, 188, 212, 0.05) 100%);
            z-index: 0;
        }

        .testimonials-shape-2 {
            position: absolute;
            bottom: -200px;
            left: -200px;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(0, 188, 212, 0.05) 0%, rgba(3, 169, 244, 0.05) 100%);
            z-index: 0;
        }

        .bg-shape-1 {
            position: absolute;
            top: -250px;
            right: -250px;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(94, 53, 177, 0.05) 0%, rgba(0, 188, 212, 0.05) 100%);
            z-index: -1;
        }

        .bg-shape-2 {
            position: absolute;
            bottom: -250px;
            left: -250px;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(0, 188, 212, 0.05) 0%, rgba(94, 53, 177, 0.05) 100%);
            z-index: -1;
        }

        .text-gradient {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Free Badge */
        .free-badge {
            display: inline-block;
            background: linear-gradient(135deg, #FF5722, #FF9800);
            color: white;
            font-weight: 700;
            padding: 5px 15px;
            border-radius: 30px;
            margin-left: 10px;
            font-size: 0.9rem;
            position: relative;
            top: -2px;
            box-shadow: 0 4px 10px rgba(255, 87, 34, 0.2);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }

        /* Navbar */
        .navbar {
            padding: 20px 0;
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 1px 15px rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            padding: 12px 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
        }

        .navbar-brand .e {
            color: var(--primary);
        }

        .navbar-brand .porikkha {
            color: var(--secondary);
        }

        .nav-link {
            font-weight: 600;
            margin: 0 10px;
            position: relative;
            color: var(--dark-text);
            padding: 8px 0;
            transition: var(--transition);
        }

        .nav-link:hover {
            color: var(--primary);
        }

        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
            transition: width 0.3s ease;
        }

        .nav-link:hover:after {
            width: 100%;
        }

        /* Buttons */
        .btn {
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
            z-index: 1;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            border: none;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(94, 53, 177, 0.2);
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
        }

        .btn-outline {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
            padding: 10px 24px;
        }

        .btn-outline:hover {
            color: white;
            background: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(94, 53, 177, 0.2);
        }

        .btn-light {
            background: white;
            color: var(--primary);
        }

        .btn-light:hover {
            background: var(--light);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        /* Video Button */
        .btn-video {
            display: inline-flex;
            align-items: center;
            background: white;
            color: var(--primary);
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
            margin-left: 15px;
            border: none;
        }

        .btn-video:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .btn-video i {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
        }

        /* Hero Section */
        .hero {
            padding: 160px 0 100px;
            position: relative;
            overflow: hidden;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            background: linear-gradient(to right, var(--dark-text), var(--primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: var(--light-text);
            line-height: 1.8;
        }

        .badge-feature {
            background-color: rgba(94, 53, 177, 0.1);
            color: var(--primary);
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 50px;
            display: inline-block;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .hero-img-container {
            position: relative;
            margin-top: 2rem;
        }

        .hero-img {
            position: relative;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            animation: float 6s ease-in-out infinite;
            overflow: hidden;
            z-index: 1;
        }

        .hero-badge {
            position: absolute;
            background: white;
            padding: 15px 20px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            z-index: 2;
            animation: fadeInUp 0.8s ease backwards;
        }

        .hero-badge-1 {
            top: -30px;
            right: -20px;
            animation-delay: 0.3s;
        }

        .hero-badge-2 {
            bottom: -30px;
            left: -20px;
            animation-delay: 0.6s;
        }

        .hero-badge-3 {
            top: 50%;
            right: -10px;
            transform: translateY(-50%);
            animation-delay: 0.9s;
        }

        .hero-badge-icon {
            width: 40px;
            height: 40px;
            background: rgba(94, 53, 177, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--primary);
            font-size: 1.2rem;
        }

        .hero-badge-text h5 {
            margin-bottom: 0;
            font-weight: 600;
            font-size: 1rem;
        }

        .hero-badge-text p {
            margin-bottom: 0;
            font-size: 0.85rem;
            color: var(--light-text);
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-15px);
            }
            100% {
                transform: translateY(0px);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 30px, 0);
            }
            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        /* YouTube Video Modal */
        .video-modal .modal-content {
            background-color: transparent;
            border: none;
        }

        .video-modal .modal-body {
            padding: 0;
            position: relative;
            overflow: hidden;
            border-radius: 15px;
        }

        .video-modal .btn-close {
            position: absolute;
            right: -40px;
            top: -40px;
            background-color: white;
            opacity: 1;
            padding: 0.5rem;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            z-index: 100;
        }

        .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
            height: 0;
            overflow: hidden;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }

        /* Stats Section */
        .stats-section {
            padding: 80px 0;
            background-color: white;
        }

        .stat-card {
            background: white;
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            text-align: center;
            height: 100%;
            transition: var(--transition);
            border: 1px solid rgba(0, 0, 0, 0.03);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        }

        .stat-card h2 {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-card p {
            font-size: 1.1rem;
            color: var(--light-text);
            margin-bottom: 0;
            font-weight: 500;
        }

        /* Section Titles */
        .section-header {
            margin-bottom: 60px;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .section-subtitle {
            font-size: 1rem;
            font-weight: 600;
            color: var(--primary);
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 15px;
            display: block;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        .section-description {
            font-size: 1.1rem;
            color: var(--light-text);
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.8;
        }

        /* IMPROVED: Features */
        .features-wrapper {
            position: relative;
            z-index: 1;
        }

        .feature-card {
            background: white;
            border-radius: 20px;
            overflow: visible;
            box-shadow: var(--card-shadow);
            position: relative;
            margin-bottom: 40px;
            transition: var(--transition);
            border: 1px solid rgba(0, 0, 0, 0.03);
            height: 100%;
            padding: 35px 25px 25px;
            text-align: center;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
        }

        .feature-card:hover .feature-icon {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 15px 30px rgba(94, 53, 177, 0.2);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 25px;
            position: relative;
            box-shadow: 0 8px 15px rgba(94, 53, 177, 0.1);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .feature-content {
            text-align: center;
        }



        /* IMPROVED: How It Works */
        .workflow-container {
            position: relative;
            z-index: 1;
        }

        .workflow-timeline {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
        }

        .workflow-timeline:before {
            content: '';
            position: absolute;
            height: 100%;
            width: 4px;
            background: linear-gradient(to bottom, var(--primary), var(--secondary));
            left: 50%;
            transform: translateX(-50%);
            top: 0;
            border-radius: -50px;
            z-index: 1;
        }

        .workflow-item {
            display: flex;
            justify-content: flex-end;
            padding-right: 30px;
            position: relative;
            margin-bottom: 50px;
            width: 50%;
            text-align: right;
        }

        .workflow-item:nth-child(even) {
            align-self: flex-end;
            justify-content: flex-start;
            padding-left: 30px;
            padding-right: 0;
            text-align: left;
            left: 50%;
        }

        .workflow-content {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: var(--card-shadow);
            position: relative;
            width: 400px;
            max-width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .workflow-content:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .workflow-content:before {
            content: '';
            position: absolute;
            top: 26px;
            right: -15px;
            width: 30px;
            height: 30px;
            background: white;
            transform: rotate(45deg);
            border-radius: 4px;
            box-shadow: 2px -2px 10px rgba(0, 0, 0, 0.05);
        }

        .workflow-item:nth-child(even) .workflow-content:before {
            right: auto;
            left: -15px;
            box-shadow: -2px 2px 10px rgba(0, 0, 0, 0.05);
        }

        .workflow-number {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            font-weight: 700;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2;
            box-shadow: 0 5px 15px rgba(94, 53, 177, 0.3);
        }

        .workflow-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: rgba(94, 53, 177, 0.1);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 0 20px;
            float: right;
        }

        .workflow-item:nth-child(even) .workflow-icon {
            float: left;
            margin: 0 20px 20px 0;
        }

        .workflow-content h3 {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark-text);
            clear: both;
        }

        .workflow-content p {
            color: var(--light-text);
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 0;
        }

        /* ===== Modern User Roles Section ===== */
        .user-types-section {
            padding: 80px 0;
            background-color: #F0FAFF;
            position: relative;
        }

        .roles-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin-top: 40px;
        }

        .role-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            width: 100%;
            max-width: 350px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            position: relative;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .role-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .role-icon-wrapper {
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .role-icon-wrapper::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(94, 53, 177, 0.05);
            z-index: 1;
        }

        .role-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            z-index: 2;
            position: relative;
        }

        .organizer-icon {
            color: var(--secondary);
        }

        .jury-icon {
            color: var(--success);
        }

        .student-icon {
            color: var(--accent);
        }

        .role-title {
            text-align: center;
            font-size: 1.4rem;
            font-weight: 700;
            margin: 20px 0;
            color: var(--dark-text);
        }

        .role-description {
            padding: 0 30px;
            text-align: center;
            color: var(--light-text);
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .role-features {
            padding: 0 30px 30px;
            list-style: none;
        }

        .role-features li {
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            color: var(--dark-text);
            font-size: 0.95rem;
        }

        .role-features i {
            color: var(--success);
            margin-right: 10px;
            font-size: 1rem;
        }

        .role-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 5px 15px;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 600;
            color: white;
            z-index: 3;
        }

        .organizer-badge {
            background: linear-gradient(135deg, var(--secondary), var(--primary));
        }

        .jury-badge {
            background: linear-gradient(135deg, var(--success), #8BC34A);
        }

        .student-badge {
            background: linear-gradient(135deg, var(--accent), #FF9800);
        }

        /* Benefits */
        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            position: relative;
            z-index: 1;
        }

        .benefit-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            height: 100%;
            display: flex;
            flex-direction: column;
            border: 1px solid rgba(0, 0, 0, 0.03);
            position: relative;
            overflow: hidden;
        }

        .benefit-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
        }

        .benefit-card:before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, rgba(94, 53, 177, 0.05), rgba(0, 188, 212, 0.05));
            border-radius: 0 0 0 100%;
        }

        .benefit-icon {
            margin-bottom: 20px;
            color: var(--primary);
            font-size: 2.5rem;
        }

        .benefit-card h4 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--dark-text);
        }

        .benefit-card p {
            color: var(--light-text);
            line-height: 1.7;
            margin-bottom: 15px;
        }

        .benefit-list {
            list-style: none;
            padding: 0;
            margin-top: auto;
        }

        .benefit-list li {
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            color: var(--dark-text);
            font-size: 0.95rem;
        }

        .benefit-list li i {
            color: var(--success);
            margin-right: 10px;
            font-size: 0.9rem;
        }

        /* Testimonials */
        .testimonials-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            position: relative;
            z-index: 1;
        }

        .testimonial-card {
            background: white;
            padding: 40px;
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            position: relative;
            border: 1px solid rgba(0, 0, 0, 0.03);
            max-width: 350px;
            width: 100%;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
        }

        .testimonial-quote {
            font-size: 1.1rem;
            color: var(--dark-text);
            line-height: 1.8;
            margin-bottom: 30px;
            position: relative;
            padding-left: 20px;
            font-style: italic;
        }

        .testimonial-quote:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(to bottom, var(--primary), var(--secondary));
            border-radius: 4px;
        }

        .client-info {
            display: flex;
            align-items: center;
        }

        .client-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 20px;
            border: 3px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .client-details h5 {
            margin-bottom: 5px;
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--dark-text);
        }

        .client-details p {
            margin-bottom: 0;
            font-size: 0.9rem;
            color: var(--light-text);
        }

        .testimonial-rating {
            color: #FFC107;
            font-size: 0.9rem;
            margin-top: 5px;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before,
        .cta-section::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
        }

        .cta-section::before {
            top: -100px;
            right: -100px;
        }

        .cta-section::after {
            bottom: -100px;
            left: -100px;
        }

        .cta-content {
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .cta-title {
            color: white;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .cta-text {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.2rem;
            margin-bottom: 30px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        /* Footer */
        footer {
            background-color: var(--dark);
            color: rgba(255, 255, 255, 0.8);
            padding: 80px 0 30px;
        }

        .footer-brand {
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 20px;
            display: inline-block;
        }

        .footer-brand .e {
            color: var(--secondary);
        }

        .footer-brand .porikkha {
            color: white;
        }

        .footer-text {
            margin-bottom: 25px;
            line-height: 1.8;
        }

        .footer-links h5 {
            color: white;
            font-weight: 700;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 15px;
            font-size: 1.2rem;
        }

        .footer-links h5::after {
            content: '';
            position: absolute;
            width: 40px;
            height: 3px;
            background: var(--secondary);
            bottom: 0;
            left: 0;
        }

        .footer-links ul {
            list-style: none;
            padding-left: 0;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .footer-links a:hover {
            color: var(--secondary);
            padding-left: 5px;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        .social-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            background: var(--secondary);
            transform: translateY(-5px);
        }

        .contact-info {
            margin-bottom: 20px;
            display: flex;
            align-items: flex-start;
        }

        .contact-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.05);
            color: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .contact-text {
            line-height: 1.6;
        }

        .contact-text strong {
            display: block;
            color: white;
            margin-bottom: 5px;
        }

        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 30px;
            margin-top: 50px;
            text-align: center;
            font-size: 0.95rem;
        }

        .copyright a {
            color: var(--secondary);
            text-decoration: none;
        }

        /* Media Queries */
        @media (max-width: 1199.98px) {
            .hero h1 {
                font-size: 3rem;
            }

            .section-title {
                font-size: 2.2rem;
            }

            .benefits-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .workflow-timeline:before {
                left: 20px;
                transform: none;
            }

            .workflow-item {
                width: 100%;
                padding-right: 0;
                padding-left: 60px;
                text-align: left;
                justify-content: flex-start;
            }

            .workflow-item:nth-child(even) {
                left: 0;
                padding-left: 60px;
            }

            .workflow-number {
                left: 20px;
                transform: none;
            }

            .workflow-content {
                width: 100%;
            }

            .workflow-content:before,
            .workflow-item:nth-child(even) .workflow-content:before {
                display: none;
            }

            .workflow-icon {
                float: left;
                margin: 0 20px 20px 0;
            }

            .workflow-item:nth-child(even) .workflow-icon {
                float: left;
                margin: 0 20px 20px 0;
            }
        }

        @media (max-width: 991.98px) {
            section {
                padding: 80px 0;
            }

            .hero {
                padding: 130px 0 80px;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero-img-container {
                margin-top: 50px;
            }

            .hero-badge {
                transform: scale(0.9);
            }

            .section-title {
                font-size: 2rem;
            }

            .btn-video {
                margin-top: 15px;
                margin-left: 0;
            }
        }

        @media (max-width: 767.98px) {
            section {
                padding: 60px 0;
            }

            .hero {
                padding: 120px 0 60px;
            }

            .hero h1 {
                font-size: 2.2rem;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .cta-title {
                font-size: 2rem;
            }

            .cta-buttons {
                flex-direction: column;
                gap: 15px;
            }

            .cta-buttons .btn {
                width: 100%;
            }

            .benefits-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 575.98px) {
            .hero h1 {
                font-size: 1.8rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .badge-feature {
                font-size: 0.8rem;
                padding: 6px 15px;
            }

            .section-title {
                font-size: 1.6rem;
            }

            .section-subtitle {
                font-size: 0.9rem;
            }

            .section-description {
                font-size: 1rem;
            }

            .stat-card h2 {
                font-size: 2.2rem;
            }


            .testimonial-card {
                padding: 30px 20px;
            }
        }

        /* ===== Modern How It Works Section ===== */
        .how-it-works-section {
            padding: 80px 0;
            position: relative;
            background-color: #FFF0F5;
        }

        .timeline-container {
            position: relative;
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px 0;
        }

        .timeline-track {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 2px;
            background: linear-gradient(to bottom, rgba(94, 53, 177, 0.2) 0%, rgba(0, 188, 212, 0.2) 100%);
            transform: translateX(-50%);
            z-index: 1;
        }

        .timeline-item {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            position: relative;
            margin-bottom: 80px;
        }

        .timeline-item:nth-child(even) {
            flex-direction: row-reverse;
        }

        .timeline-content {
            width: 45%;
            padding: 30px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            position: relative;
            z-index: 2;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .timeline-content:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .timeline-number {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-weight: 700;
            font-size: 1.3rem;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            z-index: 3;
            border: 2px solid rgba(94, 53, 177, 0.2);
        }

        .timeline-icon {
            color: var(--primary);
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .timeline-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark-text);
        }

        .timeline-description {
            color: var(--light-text);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        @media (max-width: 991.98px) {
            .timeline-track {
                left: 20px;
            }

            .timeline-item, .timeline-item:nth-child(even) {
                flex-direction: row;
                justify-content: flex-start;
                margin-left: 40px;
            }

            .timeline-content {
                width: calc(100% - 60px);
            }

            .timeline-number {
                left: 20px;
                transform: translateX(-50%);
            }
        }

        /* Registration Instructions Section */
        .registration-section {
            padding: 80px 0;
            background-color: #E8F5E9;
            position: relative;
            overflow: hidden;
        }

        .registration-shape-1 {
            position: absolute;
            top: -200px;
            right: -200px;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.05) 0%, rgba(0, 188, 212, 0.05) 100%);
            z-index: 0;
        }

        .registration-shape-2 {
            position: absolute;
            bottom: -200px;
            left: -200px;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(0, 188, 212, 0.05) 0%, rgba(76, 175, 80, 0.05) 100%);
            z-index: 0;
        }

        .registration-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        .registration-card {
            background: white;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            padding: 40px;
            width: 100%;
            max-width: 500px;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.03);
        }

        .registration-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
        }

        .registration-header {
            margin-bottom: 25px;
            position: relative;
        }

        .registration-icon {
            width: 70px;
            height: 70px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 20px;
            background: rgba(94, 53, 177, 0.1);
            color: var(--primary);
        }

        .registration-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark-text);
        }

        .registration-badge {
            position: absolute;
            top: 0;
            right: 0;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 5px 15px;
            font-size: 0.8rem;
            font-weight: 600;
            border-radius: 30px;
        }

        .registration-list {
            margin-bottom: 25px;
            padding-left: 0;
            list-style: none;
        }

        .registration-list li {
            padding: 10px 0;
            border-bottom: 1px dashed rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: flex-start;
        }

        .registration-list li i {
            color: var(--success);
            margin-right: 10px;
            font-size: 1rem;
            margin-top: 3px;
        }

        .registration-list li span {
            flex: 1;
            color: var(--dark-text);
            line-height: 1.5;
        }

        .registration-footer .btn {
            width: 100%;
        }

        .participant-icon {
            background: rgba(255, 87, 34, 0.1) !important;
            color: var(--accent) !important;
        }

        .organizer-icon {
            background: rgba(0, 188, 212, 0.1) !important;
            color: var(--secondary) !important;
        }

        .participant-badge {
            background: linear-gradient(135deg, var(--accent), #FF9800) !important;
        }

        .organizer-badge {
            background: linear-gradient(135deg, var(--secondary), var(--primary)) !important;
        }

        .participant-btn {
            background: linear-gradient(135deg, var(--accent), #FF9800);
            color: white;
        }

        .participant-btn:hover {
            background: linear-gradient(135deg, #E64A19, var(--accent));
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 87, 34, 0.2);
        }

        .organizer-btn {
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            color: white;
        }

        .organizer-btn:hover {
            background: linear-gradient(135deg, #0097A7, var(--secondary));
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 188, 212, 0.2);
        }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <span class="brand-text"><span class="e">e</span><span class="porikkha">Porikkha</span></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#features">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#how-it-works">How It Works</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#users">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#benefits">Benefits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testimonials">Testimonials</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-outline" href="{{route('login')}}">Login</a>
                </li>
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-primary" href="#">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- YouTube Video Modal -->
<div class="modal fade video-modal" id="watchVideoModal" tabindex="-1" aria-labelledby="watchVideoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="video-container">
                    <iframe id="youtube-frame" src="about:blank" title="ePorikkha Introduction" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hero Section -->
<section class="hero bg-shapes" id="home">
    <div class="bg-shape-1"></div>
    <div class="bg-shape-2"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                <span class="badge-feature">The Ultimate Examination Solution <span class="free-badge">100% FREE</span></span>
                <h1>Bangladesh's Leading Online Examination Platform</h1>
                <p>ePorikkha provides a comprehensive solution for creating, managing, and evaluating all types of online examinations, contests, and assessments with advanced jury-based evaluation capabilities - completely free of charge.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="#" class="btn btn-primary">Get Started</a>
                    <button type="button" class="btn-video" data-bs-toggle="modal" data-bs-target="#watchVideoModal">
                        <i class="fas fa-play"></i> Watch Video
                    </button>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="hero-img-container">
                    <div class="hero-badge hero-badge-1">
                        <div class="hero-badge-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="hero-badge-text">
                            <h5>Secure Exams</h5>
                            <p>Anti-cheating system</p>
                        </div>
                    </div>
                    <img src="Untitled design.png" alt="ePorikkha Platform" class="img-fluid hero-img">
                    <div class="hero-badge hero-badge-2">
                        <div class="hero-badge-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="hero-badge-text">
                            <h5>Jury Assessment</h5>
                            <p>Fair evaluation</p>
                        </div>
                    </div>
                    <div class="hero-badge hero-badge-3">
                        <div class="hero-badge-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <div class="hero-badge-text">
                            <h5>All Contest Types</h5>
                            <p>Versatile platform</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card">
                    <h2>500+</h2>
                    <p>Organizations</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-card">
                    <h2>50K+</h2>
                    <p>Exams Conducted</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-card">
                    <h2>2M+</h2>
                    <p>Participants</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-card">
                    <h2>98%</h2>
                    <p>Satisfaction Rate</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- UPDATED SECTION: Registration Instructions -->
<section class="registration-section" id="registration">
    <div class="registration-shape-1"></div>
    <div class="registration-shape-2"></div>
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">Join ePorikkha</span>
            <h2 class="section-title">Get Started Today</h2>
            <p class="section-description">Begin your ePorikkha journey in minutes. Simple setup, powerful results.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="registration-tabs" data-aos="fade-up">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <div class="registration-tab-item active" data-aos="fade-right" data-aos-delay="100">
                                <div class="registration-tab-icon">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <div class="registration-tab-content">
                                    <h3>For Participants</h3>
                                    <p>Students & Contest Participants</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="registration-tab-item" data-aos="fade-left" data-aos-delay="200">
                                <div class="registration-tab-icon organizer-icon">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="registration-tab-content">
                                    <h3>For Organizers</h3>
                                    <p>Schools, Universities & Organizations</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="registration-content" data-aos="fade-up" data-aos-delay="300">
                    <div class="registration-panel active">
                        <div class="registration-steps">
                            <div class="step-item">
                                <div class="step-number">1</div>
                                <div class="step-info">
                                    <h4>Create Account</h4>
                                    <p>Sign up using your email, phone, or social media account</p>
                                </div>
                            </div>
                            <div class="step-item">
                                <div class="step-number">2</div>
                                <div class="step-info">
                                    <h4>Find Exams</h4>
                                    <p>Browse available exams or enter an access code</p>
                                </div>
                            </div>
                            <div class="step-item">
                                <div class="step-number">3</div>
                                <div class="step-info">
                                    <h4>Start Participating</h4>
                                    <p>Take exams with our secure, user-friendly interface</p>
                                </div>
                            </div>
                        </div>
                        <div class="registration-action">
                            <a href="#" class="btn participant-btn">Register as Participant</a>
                        </div>
                    </div>

                    <div class="registration-panel">
                        <div class="registration-steps">
                            <div class="step-item">
                                <div class="step-number">1</div>
                                <div class="step-info">
                                    <h4>Create Organization</h4>
                                    <p>Register your institution and verify your account</p>
                                </div>
                            </div>
                            <div class="step-item">
                                <div class="step-number">2</div>
                                <div class="step-info">
                                    <h4>Setup Your Team</h4>
                                    <p>Add administrators and jury members to your dashboard</p>
                                </div>
                            </div>
                            <div class="step-item">
                                <div class="step-number">3</div>
                                <div class="step-info">
                                    <h4>Create Examinations</h4>
                                    <p>Design and launch your first online assessment</p>
                                </div>
                            </div>
                        </div>
                        <div class="registration-action">
                            <a href="#" class="btn organizer-btn">Register as Organizer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Updated Registration Section Styles */
    .registration-section {
        padding: 80px 0;
        background-color: #F8FBFF;
        position: relative;
        overflow: hidden;
    }

    .registration-tabs {
        background-color: white;
        border-radius: 16px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        margin-bottom: 30px;
        overflow: hidden;
    }

    .registration-tab-item {
        display: flex;
        align-items: center;
        padding: 25px 30px;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        border-bottom: 3px solid transparent;
    }

    .registration-tab-item.active {
        background-color: rgba(94, 53, 177, 0.03);
        border-bottom: 3px solid var(--primary);
    }

    .registration-tab-icon {
        width: 50px;
        height: 50px;
        min-width: 50px;
        border-radius: 12px;
        background-color: rgba(255, 87, 34, 0.1);
        color: var(--accent);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        margin-right: 15px;
    }

    .registration-tab-icon.organizer-icon {
        background-color: rgba(0, 188, 212, 0.1);
        color: var(--secondary);
    }

    .registration-tab-content h3 {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 5px;
        color: var(--dark-text);
    }

    .registration-tab-content p {
        font-size: 0.9rem;
        color: var(--light-text);
        margin-bottom: 0;
    }

    .registration-content {
        background-color: white;
        border-radius: 16px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        padding: 40px;
        position: relative;
    }

    .registration-panel {
        display: none;
    }

    .registration-panel.active {
        display: block;
    }

    .registration-steps {
        margin-bottom: 30px;
    }

    .step-item {
        display: flex;
        align-items: center;
        margin-bottom: 25px;
    }

    .step-item:last-child {
        margin-bottom: 0;
    }

    .step-number {
        width: 40px;
        height: 40px;
        min-width: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        margin-right: 20px;
        box-shadow: 0 5px 15px rgba(94, 53, 177, 0.2);
    }

    .step-info h4 {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 5px;
        color: var(--dark-text);
    }

    .step-info p {
        font-size: 0.95rem;
        color: var(--light-text);
        margin-bottom: 0;
    }

    .registration-action {
        text-align: center;
        margin-top: 20px;
    }

    .participant-btn {
        background: linear-gradient(135deg, var(--accent), #FF9800);
        color: white;
        padding: 12px 30px;
        border-radius: 30px;
        font-weight: 600;
        transition: all 0.3s;
        border: none;
        box-shadow: 0 5px 15px rgba(255, 87, 34, 0.2);
    }

    .participant-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 87, 34, 0.3);
        background: linear-gradient(135deg, #FF7043, var(--accent));
        color: white;
    }

    .organizer-btn {
        background: linear-gradient(135deg, var(--secondary), var(--primary));
        color: white;
        padding: 12px 30px;
        border-radius: 30px;
        font-weight: 600;
        transition: all 0.3s;
        border: none;
        box-shadow: 0 5px 15px rgba(0, 188, 212, 0.2);
    }

    .organizer-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 188, 212, 0.3);
        background: linear-gradient(135deg, #00ACC1, var(--secondary));
        color: white;
    }

    @media (max-width: 767.98px) {
        .registration-tab-item {
            padding: 20px;
        }

        .registration-content {
            padding: 30px 20px;
        }

        .registration-tab-icon {
            width: 40px;
            height: 40px;
            min-width: 40px;
            font-size: 1.1rem;
        }

        .registration-tab-content h3 {
            font-size: 1rem;
        }

        .registration-tab-content p {
            font-size: 0.8rem;
        }
    }
</style>

<script>
    // JavaScript for Registration Tabs
    document.addEventListener("DOMContentLoaded", function() {
        const tabItems = document.querySelectorAll('.registration-tab-item');
        const panels = document.querySelectorAll('.registration-panel');

        tabItems.forEach((tab, index) => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs and panels
                tabItems.forEach(item => item.classList.remove('active'));
                panels.forEach(panel => panel.classList.remove('active'));

                // Add active class to current tab and panel
                tab.classList.add('active');
                panels[index].classList.add('active');
            });
        });
    });
</script>

<!-- IMPROVED: Features Section -->
<section class="features-section" id="features">
    <div class="features-bg">
        <div class="features-shape-1"></div>
        <div class="features-shape-2"></div>
        <div class="features-shape-3"></div>
    </div>
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">What We Offer</span>
            <h2 class="section-title">Key Features</h2>
            <p class="section-description">Discover why ePorikkha is the preferred choice for educational institutions and organizations across Bangladesh.</p>
        </div>
        <div class="features-wrapper">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <h3>Diverse Question Types</h3>
                        <p>Support for MCQs, essay questions, coding challenges, file uploads, and more to comprehensively assess knowledge and skills for any type of exam or contest.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Jury-Based Assessment</h3>
                        <p>Sophisticated jury management system for fair and transparent evaluation of subjective responses with collaborative marking for competitions and contests.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Robust Security</h3>
                        <p>Advanced proctoring and anti-cheating measures to ensure integrity of examination results with real-time monitoring and secure browser technologies.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Detailed Analytics</h3>
                        <p>Comprehensive reports and analytics to gain insights into performance metrics and identify improvement areas with interactive dashboards and exportable results.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h3>Certification System</h3>
                        <p>Automated certificate generation for successful participants with customizable templates and verification via QR codes for all exam types and contests.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h3>All Contest Types</h3>
                        <p>Host a wide variety of contests including programming competitions, quiz bowls, essay contests, art competitions, and any other creative challenges - all on one platform.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modern "How It Works" Section (WITH ANIMATIONS ADDED) -->
<section class="how-it-works-section" id="how-it-works">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">Process</span>
            <h2 class="section-title">How It Works</h2>
            <p class="section-description">ePorikkha streamlines the entire examination process from creation to results with a simple workflow.</p>
        </div>

        <div class="timeline-container">
            <div class="timeline-track"></div>

            <div class="timeline-item" data-aos="fade-right" data-aos-delay="100">
                <div class="timeline-number">1</div>
                <div class="timeline-content">
                    <div class="timeline-icon">
                        <i class="fas fa-edit"></i>
                    </div>
                    <h3 class="timeline-title">Create Examination</h3>
                    <p class="timeline-description">Set up exams with customized questions, time limits, and evaluation criteria for any type of contest.</p>
                </div>
            </div>

            <div class="timeline-item" data-aos="fade-left" data-aos-delay="200">
                <div class="timeline-number">2</div>
                <div class="timeline-content">
                    <div class="timeline-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <h3 class="timeline-title">Student Participation</h3>
                    <p class="timeline-description">Participants take exams with secure access and anti-cheating measures ensuring integrity.</p>
                </div>
            </div>

            <div class="timeline-item" data-aos="fade-right" data-aos-delay="300">
                <div class="timeline-number">3</div>
                <div class="timeline-content">
                    <div class="timeline-icon">
                        <i class="fas fa-gavel"></i>
                    </div>
                    <h3 class="timeline-title">Evaluation Process</h3>
                    <p class="timeline-description">Automated grading and jury assessment with collaborative review for fairness.</p>
                </div>
            </div>

            <div class="timeline-item" data-aos="fade-left" data-aos-delay="400">
                <div class="timeline-number">4</div>
                <div class="timeline-content">
                    <div class="timeline-icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <h3 class="timeline-title">Results & Analytics</h3>
                    <p class="timeline-description">Comprehensive results with detailed performance metrics and downloadable reports.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modern "User Roles & Permissions" Section (WITH ANIMATIONS ADDED) -->
<section class="user-types-section" id="users">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">Platform Access</span>
            <h2 class="section-title">User Roles & Permissions</h2>
            <p class="section-description">ePorikkha is designed to cater to different stakeholders in the examination process with tailored interfaces and capabilities.</p>
        </div>

        <div class="roles-container">
            <div class="role-card" data-aos="fade-up" data-aos-delay="100">
                <span class="role-badge organizer-badge">Organizer</span>
                <div class="role-icon-wrapper">
                    <div class="role-icon organizer-icon">
                        <i class="fas fa-building"></i>
                    </div>
                </div>
                <h4 class="role-title">Organizers</h4>
                <p class="role-description">Create and manage exams or contests with complete configuration options.</p>
                <ul class="role-features">
                    <li><i class="fas fa-check-circle"></i> Custom exam creation</li>
                    <li><i class="fas fa-check-circle"></i> Question management</li>
                    <li><i class="fas fa-check-circle"></i> Results publishing</li>
                    <li><i class="fas fa-check-circle"></i> Jury member assignment</li>
                    <li><i class="fas fa-check-circle"></i> Configure timer & settings</li>
                </ul>
            </div>

            <div class="role-card" data-aos="fade-up" data-aos-delay="200">
                <span class="role-badge jury-badge">Jury</span>
                <div class="role-icon-wrapper">
                    <div class="role-icon jury-icon">
                        <i class="fas fa-gavel"></i>
                    </div>
                </div>
                <h4 class="role-title">Jury / Evaluators</h4>
                <p class="role-description">Fair assessment of subjective answers with collaborative evaluation tools.</p>
                <ul class="role-features">
                    <li><i class="fas fa-check-circle"></i> Subjective answer evaluation</li>
                    <li><i class="fas fa-check-circle"></i> Marking and grading</li>
                    <li><i class="fas fa-check-circle"></i> Detailed feedback provision</li>
                    <li><i class="fas fa-check-circle"></i> Manual marking for non-automated tests</li>
                    <li><i class="fas fa-check-circle"></i> Collaborative assessment</li>
                </ul>
            </div>

            <div class="role-card" data-aos="fade-up" data-aos-delay="300">
                <span class="role-badge student-badge">Student</span>
                <div class="role-icon-wrapper">
                    <div class="role-icon student-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                </div>
                <h4 class="role-title">Participants / Students</h4>
                <p class="role-description">Seamless exam experience with intuitive interface and instant feedback.</p>
                <ul class="role-features">
                    <li><i class="fas fa-check-circle"></i> Exam participation</li>
                    <li><i class="fas fa-check-circle"></i> Result viewing</li>
                    <li><i class="fas fa-check-circle"></i> Certificate downloads</li>
                    <li><i class="fas fa-check-circle"></i> Performance analytics</li>
                    <li><i class="fas fa-check-circle"></i> Feedback review</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="benefits-section" id="benefits">
    <div class="benefits-bg">
        <div class="benefits-shape-1"></div>
        <div class="benefits-shape-2"></div>
    </div>
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">Advantages</span>
            <h2 class="section-title">Why Choose ePorikkha?</h2>
            <p class="section-description">Experience the transformative benefits of our comprehensive and completely free online examination platform.</p>
        </div>
        <div class="benefits-grid">
            <div class="benefit-card" data-aos="fade-up" data-aos-delay="100">
                <div class="benefit-icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h4>All Contest Types</h4>
                <p>Host any type of competition or assessment on a single versatile platform.</p>
                <ul class="benefit-list">
                    <li><i class="fas fa-check-circle"></i> Academic exams and quizzes</li>
                    <li><i class="fas fa-check-circle"></i> Programming competitions</li>
                    <li><i class="fas fa-check-circle"></i> Creative writing contests</li>
                    <li><i class="fas fa-check-circle"></i> Talent competitions</li>
                </ul>
            </div>

            <div class="benefit-card" data-aos="fade-up" data-aos-delay="200">
                <div class="benefit-icon">
                    <i class="fas fa-coins"></i>
                </div>
                <h4>Completely Free</h4>
                <p>Full-featured platform with no hidden costs or premium tiers.</p>
                <ul class="benefit-list">
                    <li><i class="fas fa-check-circle"></i> No subscription fees</li>
                    <li><i class="fas fa-check-circle"></i> Unlimited participants</li>
                    <li><i class="fas fa-check-circle"></i> All features included</li>
                    <li><i class="fas fa-check-circle"></i> Free technical support</li>
                </ul>
            </div>

            <div class="benefit-card" data-aos="fade-up" data-aos-delay="300">
                <div class="benefit-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h4>Time-Saving</h4>
                <p>Automate tedious tasks and focus on what matters most.</p>
                <ul class="benefit-list">
                    <li><i class="fas fa-check-circle"></i> Automatic grading</li>
                    <li><i class="fas fa-check-circle"></i> Instant result generation</li>
                    <li><i class="fas fa-check-circle"></i> Efficient jury management</li>
                    <li><i class="fas fa-check-circle"></i> One-click certificate creation</li>
                </ul>
            </div>

            <div class="benefit-card" data-aos="fade-up" data-aos-delay="400">
                <div class="benefit-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h4>Enhanced Security</h4>
                <p>Advanced protection to maintain assessment integrity.</p>
                <ul class="benefit-list">
                    <li><i class="fas fa-check-circle"></i> Anti-cheating measures</li>
                    <li><i class="fas fa-check-circle"></i> Secure browser technology</li>
                    <li><i class="fas fa-check-circle"></i> Encrypted submissions</li>
                    <li><i class="fas fa-check-circle"></i> Plagiarism detection</li>
                </ul>
            </div>

            <div class="benefit-card" data-aos="fade-up" data-aos-delay="500">
                <div class="benefit-icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <h4>Data-Driven Insights</h4>
                <p>Comprehensive analytics to improve educational outcomes.</p>
                <ul class="benefit-list">
                    <li><i class="fas fa-check-circle"></i> Performance trends</li>
                    <li><i class="fas fa-check-circle"></i> Question difficulty analysis</li>
                    <li><i class="fas fa-check-circle"></i> Participant engagement metrics</li>
                    <li><i class="fas fa-check-circle"></i> Exportable reports</li>
                </ul>
            </div>

            <div class="benefit-card" data-aos="fade-up" data-aos-delay="600">
                <div class="benefit-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <h4>Accessibility</h4>
                <p>Breaking barriers to reach participants anywhere.</p>
                <ul class="benefit-list">
                    <li><i class="fas fa-check-circle"></i> Remote participation</li>
                    <li><i class="fas fa-check-circle"></i> Mobile compatibility</li>
                    <li><i class="fas fa-check-circle"></i> Low bandwidth options</li>
                    <li><i class="fas fa-check-circle"></i> Multi-language support</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section" id="testimonials">
    <div class="testimonials-bg">
        <div class="testimonials-shape-1"></div>
        <div class="testimonials-shape-2"></div>
    </div>
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">Success Stories</span>
            <h2 class="section-title">What Our Users Say</h2>
            <p class="section-description">Hear from educational institutions and organizations that have transformed their examination process with ePorikkha.</p>
        </div>
        <div class="testimonials-container">
            <div class="testimonial-card" data-aos="fade-up" data-aos-delay="100">
                <div class="testimonial-quote">
                    "ePorikkha revolutionized our university's examination process. The platform is intuitive, secure, and the analytics have given us valuable insights into student performance."
                </div>
                <div class="client-info">
                    <div class="client-img">
                        <img src="https://placebeard.it/100x100" alt="Client" class="img-fluid">
                    </div>
                    <div class="client-details">
                        <h5>Dr. Rahman</h5>
                        <p>University Professor</p>
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card" data-aos="fade-up" data-aos-delay="200">
                <div class="testimonial-quote">
                    "As a jury member, the evaluation system makes it easy to assess submissions fairly. The collaboration tools ensure consistency across the jury board."
                </div>
                <div class="client-info">
                    <div class="client-img">
                        <img src="https://placebeard.it/100x100" alt="Client" class="img-fluid">
                    </div>
                    <div class="client-details">
                        <h5>Fariha Islam</h5>
                        <p>Evaluation Expert</p>
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card" data-aos="fade-up" data-aos-delay="300">
                <div class="testimonial-quote">
                    "Our competitive programming contests have reached a new level with ePorikkha. The platform handles thousands of submissions simultaneously without any issues."
                </div>
                <div class="client-info">
                    <div class="client-img">
                        <img src="https://placebeard.it/100x100" alt="Client" class="img-fluid">
                    </div>
                    <div class="client-details">
                        <h5>Kamal Hossain</h5>
                        <p>Contest Organizer</p>
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content" data-aos="zoom-in">
            <h2 class="cta-title">Ready to Transform Your Examination Process?</h2>
            <p class="cta-text">Join hundreds of institutions across Bangladesh that have already embraced the future of assessments with ePorikkha - 100% free, forever.</p>
            <div class="cta-buttons">
                <a href="#" class="btn btn-light">Start Your Free Account</a>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <a href="#" class="footer-brand"><span class="e">e</span><span class="porikkha">Porikkha</span></a>
                <p class="footer-text">The complete free online examination platform tailored for Bangladesh's educational and competitive needs. Host any type of exam or contest with ease.</p>
                <div class="social-links">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-4 mb-md-0 footer-links">
                <h5>Quick Links</h5>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#users">Users</a></li>
                    <li><a href="#benefits">Benefits</a></li>
                    <li><a href="#testimonials">Testimonials</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-4 mb-4 mb-md-0 footer-links">
                <h5>Our Services</h5>
                <ul>
                    <li><a href="#">Online Exams</a></li>
                    <li><a href="#">Competitive Events</a></li>
                    <li><a href="#">Jury Management</a></li>
                    <li><a href="#">Analytics</a></li>
                    <li><a href="#">Certifications</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 footer-links">
                <h5>Contact Us</h5>
                <div class="contact-info">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-text">
                        <strong>Address</strong>
                        123 Digital Avenue, Dhaka, Bangladesh
                    </div>
                </div>
                <div class="contact-info">
                    <div class="contact-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="contact-text">
                        <strong>Phone</strong>
                        +880 123 456 7890
                    </div>
                </div>
                <div class="contact-info">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="contact-text">
                        <strong>Email</strong>
                        info@eporikkha.com
                    </div>
                </div>
                <div class="contact-info">
                    <div class="contact-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="contact-text">
                        <strong>Working Hours</strong>
                        Monday-Friday: 9:00 AM - 6:00 PM
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>© 2025 <a href="#">ePorikkha</a>. All rights reserved. Designed with <i class="fas fa-heart" style="color: var(--accent);"></i> in Bangladesh</p>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- AOS Animation Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    // Initialize AOS animations
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
    });

    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // YouTube Video Modal
    const videoModal = document.getElementById('watchVideoModal');
    const videoFrame = document.getElementById('youtube-frame');

    // YouTube video ID - replace with your video ID
    const youtubeVideoId = "YOUR_YOUTUBE_VIDEO_ID";

    videoModal.addEventListener('show.bs.modal', function () {
        // Set the YouTube src when modal is about to show
        videoFrame.setAttribute('src', `https://www.youtube.com/embed/${youtubeVideoId}?autoplay=1&rel=0`);
    });

    videoModal.addEventListener('hidden.bs.modal', function () {
        // Reset the YouTube src when modal is hidden
        videoFrame.setAttribute('src', 'about:blank');
    });
</script>
</body>
</html>
