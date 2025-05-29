<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ePorikkha - Upcoming Exams</title>
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
            --warning: #FF9800;
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

        /* Navbar styles (same as landing page) */
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

        /* Button styles */
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

        /* Hero Section */
        .hero {
            padding: 160px 0 100px;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(94, 53, 177, 0.03) 0%, rgba(0, 188, 212, 0.03) 100%);
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -250px;
            right: -250px;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(94, 53, 177, 0.05) 0%, rgba(0, 188, 212, 0.05) 100%);
            z-index: -1;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: -250px;
            left: -250px;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(0, 188, 212, 0.05) 0%, rgba(94, 53, 177, 0.05) 100%);
            z-index: -1;
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

        /* Filters Section */
        .filters-section {
            padding: 40px 0 60px;
            background: linear-gradient(135deg, rgba(94, 53, 177, 0.02) 0%, rgba(0, 188, 212, 0.02) 100%);
            position: relative;
        }

        .filters-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent 0%, var(--primary) 50%, transparent 100%);
        }

        .filters-container {
            background: white;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.02);
            position: relative;
            overflow: hidden;
        }

        .filters-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
        }

        .filter-section-title {
            text-align: center;
            margin-bottom: 35px;
        }

        .filter-section-title h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark-text);
            margin-bottom: 8px;
        }

        .filter-section-title p {
            color: var(--light-text);
            margin-bottom: 0;
            font-size: 1rem;
        }

        .filter-row {
            margin-bottom: 30px;
        }

        .filter-row:last-child {
            margin-bottom: 0;
        }

        .filter-group {
            background: rgba(94, 53, 177, 0.02);
            border-radius: 20px;
            padding: 25px;
            border: 1px solid rgba(94, 53, 177, 0.05);
            transition: var(--transition);
        }

        .filter-group:hover {
            background: rgba(94, 53, 177, 0.03);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(94, 53, 177, 0.05);
        }

        .filter-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .filter-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1.1rem;
        }

        .filter-label {
            font-weight: 700;
            color: var(--dark-text);
            margin-bottom: 5px;
            font-size: 1.1rem;
        }

        .filter-subtitle {
            color: var(--light-text);
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        .filter-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .filter-tag {
            padding: 12px 20px;
            border-radius: 30px;
            background: white;
            color: var(--dark-text);
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            border: 2px solid rgba(94, 53, 177, 0.1);
            position: relative;
            overflow: hidden;
        }

        .filter-tag::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            transition: left 0.3s ease;
            z-index: -1;
        }

        .filter-tag:hover::before,
        .filter-tag.active::before {
            left: 0;
        }

        .filter-tag:hover,
        .filter-tag.active {
            color: white;
            border-color: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(94, 53, 177, 0.2);
        }

        .search-section {
            background: rgba(0, 188, 212, 0.02);
            border-radius: 20px;
            padding: 25px;
            border: 1px solid rgba(0, 188, 212, 0.05);
            transition: var(--transition);
        }

        .search-section:hover {
            background: rgba(0, 188, 212, 0.03);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 188, 212, 0.05);
        }

        .search-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--secondary) 0%, var(--primary) 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1.1rem;
        }

        .search-box {
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 18px 60px 18px 24px;
            border: 2px solid rgba(0, 188, 212, 0.1);
            border-radius: 16px;
            font-size: 1rem;
            transition: var(--transition);
            background: white;
            color: var(--dark-text);
        }

        .search-input::placeholder {
            color: var(--light-text);
        }

        .search-input:focus {
            outline: none;
            border-color: var(--secondary);
            box-shadow: 0 0 0 4px rgba(0, 188, 212, 0.1);
            transform: translateY(-2px);
        }

        .search-btn {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, var(--secondary) 0%, var(--primary) 100%);
            color: white;
            border: none;
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            box-shadow: 0 4px 12px rgba(0, 188, 212, 0.2);
        }

        .search-btn:hover {
            transform: translateY(-50%) scale(1.05);
            box-shadow: 0 6px 20px rgba(0, 188, 212, 0.3);
        }

        .filter-stats {
            background: linear-gradient(135deg, rgba(94, 53, 177, 0.05) 0%, rgba(0, 188, 212, 0.05) 100%);
            border-radius: 16px;
            padding: 20px;
            margin-top: 25px;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            display: block;
        }

        .stat-label {
            font-size: 0.85rem;
            color: var(--light-text);
            margin-top: 2px;
        }

        .clear-filters-btn {
            background: rgba(255, 87, 34, 0.1);
            color: var(--accent);
            border: 2px solid rgba(255, 87, 34, 0.2);
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .clear-filters-btn:hover {
            background: var(--accent);
            color: white;
            border-color: var(--accent);
            transform: translateY(-2px);
        }

        /* Exams Section */
        .exams-section {
            padding: 80px 0;
            background-color: #F8FBFF;
        }

        .exam-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            height: 100%;
            border: 1px solid rgba(0, 0, 0, 0.03);
            position: relative;
            overflow: hidden;
        }

        .exam-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
        }

        .exam-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, rgba(94, 53, 177, 0.05), rgba(0, 188, 212, 0.05));
            border-radius: 0 0 0 100%;
        }

        .exam-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .exam-category {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            color: white;
        }

        .category-academic {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
        }

        .category-competitive {
            background: linear-gradient(135deg, var(--accent), var(--warning));
        }

        .category-skill {
            background: linear-gradient(135deg, var(--success), #8BC34A);
        }

        .exam-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark-text);
        }

        .exam-description {
            color: var(--light-text);
            margin-bottom: 20px;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .exam-details {
            margin-bottom: 25px;
        }

        .exam-detail-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-size: 0.9rem;
        }

        .exam-detail-item:last-child {
            margin-bottom: 0;
        }

        .detail-icon {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            background: rgba(94, 53, 177, 0.1);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-size: 0.9rem;
        }

        .detail-text {
            color: var(--dark-text);
            font-weight: 500;
        }

        .detail-value {
            color: var(--light-text);
            margin-left: auto;
        }

        .exam-stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
            padding: 15px;
            background: rgba(94, 53, 177, 0.03);
            border-radius: 12px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary);
            display: block;
        }

        .stat-label {
            font-size: 0.8rem;
            color: var(--light-text);
            margin-top: 2px;
        }

        .exam-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .exam-price {
            font-size: 1.1rem;
            font-weight: 700;
        }

        .price-free {
            color: var(--success);
        }

        .price-paid {
            color: var(--accent);
        }

        .register-btn {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: var(--transition);
            border: none;
        }

        .register-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(94, 53, 177, 0.2);
            color: white;
        }

        .register-btn:disabled {
            background: #ccc;
            color: #666;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        /* Status badges */
        .status-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
            z-index: 2;
        }

        .status-upcoming {
            background: rgba(255, 152, 0, 0.1);
            color: var(--warning);
            border: 1px solid rgba(255, 152, 0, 0.2);
        }

        .status-ongoing {
            background: rgba(76, 175, 80, 0.1);
            color: var(--success);
            border: 1px solid rgba(76, 175, 80, 0.2);
        }

        .status-closed {
            background: rgba(255, 87, 34, 0.1);
            color: var(--accent);
            border: 1px solid rgba(255, 87, 34, 0.2);
        }

        /* Load More Section */
        .load-more-section {
            padding: 40px 0;
            text-align: center;
        }

        /* Footer styles (same as landing page) */
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
                font-size: 2.5rem;
            }

            .exam-stats {
                flex-direction: column;
                gap: 15px;
            }

            .stat-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                text-align: left;
            }

            .filters-container {
                padding: 30px;
            }
        }

        @media (max-width: 991.98px) {
            .filter-row {
                margin-bottom: 25px;
            }

            .filter-stats {
                flex-direction: column;
                gap: 15px;
            }

            .filter-stats .stat-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                text-align: left;
                padding: 10px 0;
                border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            }

            .filter-stats .stat-item:last-child {
                border-bottom: none;
            }

            .filter-header {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
            }

            .filter-icon, .search-icon {
                margin-right: 0;
                margin-bottom: 10px;
            }

            .search-header {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
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

            .filters-container {
                padding: 25px 20px;
            }

            .filter-section-title h3 {
                font-size: 1.3rem;
            }

            .filter-group, .search-section {
                padding: 20px;
            }

            .filter-tags {
                justify-content: center;
            }

            .filter-tag {
                padding: 10px 16px;
                font-size: 0.85rem;
            }

            .exam-footer {
                flex-direction: column;
                gap: 15px;
            }

            .register-btn {
                width: 100%;
            }

            .filter-stats {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
                display: grid;
            }

            .clear-filters-btn {
                width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 575.98px) {
            .hero h1 {
                font-size: 1.8rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .exam-card {
                padding: 20px;
            }

            .filters-container {
                padding: 20px 15px;
            }

            .filter-section-title {
                margin-bottom: 25px;
            }

            .filter-section-title h3 {
                font-size: 1.2rem;
            }

            .filter-header, .search-header {
                margin-bottom: 15px;
            }

            .filter-icon, .search-icon {
                width: 35px;
                height: 35px;
                font-size: 1rem;
            }

            .filter-label {
                font-size: 1rem;
            }

            .filter-subtitle {
                font-size: 0.8rem;
            }

            .search-input {
                padding: 16px 50px 16px 20px;
            }

            .search-btn {
                width: 40px;
                height: 40px;
                right: 6px;
            }

            .filter-stats {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .filter-stats .stat-item {
                padding: 8px 0;
            }

            .stat-number {
                font-size: 1.2rem;
            }

            .stat-label {
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <span class="brand-text"><span class="e">e</span><span class="porikkha">Porikkha</span></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="upcoming-exams.html">Upcoming Exams</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="leaderboard.html">Results</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html#features">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html#contact">Contact</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-outline" href="#login">Login</a>
                </li>
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-primary" href="#register">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero" id="home">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                <span class="badge-feature">Discover & Participate</span>
                <h1>Upcoming Exams & Contests</h1>
                <p>Explore a wide range of examinations, competitions, and assessments. Find the perfect opportunity to showcase your skills and knowledge.</p>
            </div>
        </div>
    </div>
</section>

<!-- Filters Section -->
<section class="filters-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12" data-aos="fade-up">
                <div class="filters-container">
                    <div class="filter-section-title">
                        <h3><i class="fas fa-filter me-2"></i>Find Your Perfect Exam</h3>
                        <p>Filter and search through our comprehensive collection of examinations and contests</p>
                    </div>

                    <div class="row filter-row">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <div class="filter-group">
                                <div class="filter-header">
                                    <div class="filter-icon">
                                        <i class="fas fa-tags"></i>
                                    </div>
                                    <div>
                                        <div class="filter-label">Exam Categories</div>
                                        <p class="filter-subtitle">Choose your area of interest</p>
                                    </div>
                                </div>
                                <div class="filter-tags">
                                    <span class="filter-tag active" data-category="all">All Exams</span>
                                    <span class="filter-tag" data-category="academic">Academic</span>
                                    <span class="filter-tag" data-category="competitive">Programming</span>
                                    <span class="filter-tag" data-category="skill">Skill Assessment</span>
                                    <span class="filter-tag" data-category="language">Language</span>
                                    <span class="filter-tag" data-category="creative">Creative</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="filter-group">
                                <div class="filter-header">
                                    <div class="filter-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div>
                                        <div class="filter-label">Registration Status</div>
                                        <p class="filter-subtitle">Filter by availability</p>
                                    </div>
                                </div>
                                <div class="filter-tags">
                                    <span class="filter-tag active" data-status="all">All Status</span>
                                    <span class="filter-tag" data-status="upcoming">Upcoming</span>
                                    <span class="filter-tag" data-status="ongoing">Open</span>
                                    <span class="filter-tag" data-status="closed">Closed</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row filter-row">
                        <div class="col-lg-8 mb-4 mb-lg-0">
                            <div class="search-section">
                                <div class="search-header">
                                    <div class="search-icon">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <div>
                                        <div class="filter-label">Quick Search</div>
                                        <p class="filter-subtitle">Find exams by name, organizer, or keywords</p>
                                    </div>
                                </div>
                                <div class="search-box">
                                    <input type="text" class="search-input" placeholder="Type exam name, organizer, or keywords...">
                                    <button class="search-btn"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="filter-group">
                                <div class="filter-header">
                                    <div class="filter-icon">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <div>
                                        <div class="filter-label">Quick Actions</div>
                                        <p class="filter-subtitle">Manage your filters</p>
                                    </div>
                                </div>
                                <div style="display: flex; gap: 10px; align-items: center;">
                                    <button class="clear-filters-btn">Clear All Filters</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="filter-stats">
                        <div class="stat-item">
                            <span class="stat-number" id="totalExams">156</span>
                            <span class="stat-label">Total Exams</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number" id="filteredExams">6</span>
                            <span class="stat-label">Showing</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number" id="openRegistrations">47</span>
                            <span class="stat-label">Open Registration</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number" id="freeExams">89</span>
                            <span class="stat-label">Free Exams</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Exams Section -->
<section class="exams-section">
    <div class="container">
        <div class="row g-4" id="examsList">
            <!-- Exam Card 1 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="exam-card" data-category="academic" data-status="upcoming">
                    <div class="status-badge status-upcoming">Registration Open</div>
                    <div class="exam-header">
                        <div class="exam-category category-academic">Academic</div>
                    </div>
                    <h3 class="exam-title">National University Admission Test</h3>
                    <p class="exam-description">Comprehensive entrance examination for undergraduate programs across various disciplines.</p>

                    <div class="exam-details">
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-calendar-alt"></i></div>
                            <span class="detail-text">Exam Date</span>
                            <span class="detail-value">June 15, 2025</span>
                        </div>
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-clock"></i></div>
                            <span class="detail-text">Duration</span>
                            <span class="detail-value">3 hours</span>
                        </div>
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-question-circle"></i></div>
                            <span class="detail-text">Questions</span>
                            <span class="detail-value">100 MCQs</span>
                        </div>
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-building"></i></div>
                            <span class="detail-text">Organizer</span>
                            <span class="detail-value">National University</span>
                        </div>
                    </div>

                    <div class="exam-stats">
                        <div class="stat-item">
                            <span class="stat-number">5,432</span>
                            <span class="stat-label">Registered</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">15</span>
                            <span class="stat-label">Days Left</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">∞</span>
                            <span class="stat-label">Seats</span>
                        </div>
                    </div>

                    <div class="exam-footer">
                        <div class="exam-price price-free">FREE</div>
                        <button class="register-btn">Register Now</button>
                    </div>
                </div>
            </div>

            <!-- Exam Card 2 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="exam-card" data-category="competitive" data-status="upcoming">
                    <div class="status-badge status-upcoming">Registration Open</div>
                    <div class="exam-header">
                        <div class="exam-category category-competitive">Programming</div>
                    </div>
                    <h3 class="exam-title">Bangladesh Coding Championship</h3>
                    <p class="exam-description">Premier programming contest for students and professionals to showcase algorithmic skills.</p>

                    <div class="exam-details">
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-calendar-alt"></i></div>
                            <span class="detail-text">Exam Date</span>
                            <span class="detail-value">June 20, 2025</span>
                        </div>
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-clock"></i></div>
                            <span class="detail-text">Duration</span>
                            <span class="detail-value">5 hours</span>
                        </div>
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-code"></i></div>
                            <span class="detail-text">Problems</span>
                            <span class="detail-value">8 Algorithms</span>
                        </div>
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-building"></i></div>
                            <span class="detail-text">Organizer</span>
                            <span class="detail-value">TechBD Community</span>
                        </div>
                    </div>

                    <div class="exam-stats">
                        <div class="stat-item">
                            <span class="stat-number">1,284</span>
                            <span class="stat-label">Registered</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">20</span>
                            <span class="stat-label">Days Left</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">2000</span>
                            <span class="stat-label">Seats</span>
                        </div>
                    </div>

                    <div class="exam-footer">
                        <div class="exam-price price-free">FREE</div>
                        <button class="register-btn">Register Now</button>
                    </div>
                </div>
            </div>

            <!-- Exam Card 3 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="exam-card" data-category="skill" data-status="ongoing">
                    <div class="status-badge status-ongoing">Live Now</div>
                    <div class="exam-header">
                        <div class="exam-category category-skill">Skill Test</div>
                    </div>
                    <h3 class="exam-title">Digital Marketing Proficiency Test</h3>
                    <p class="exam-description">Comprehensive assessment of digital marketing knowledge and practical skills.</p>

                    <div class="exam-details">
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-calendar-alt"></i></div>
                            <span class="detail-text">Exam Date</span>
                            <span class="detail-value">May 30, 2025</span>
                        </div>
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-clock"></i></div>
                            <span class="detail-text">Duration</span>
                            <span class="detail-value">2 hours</span>
                        </div>
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-tasks"></i></div>
                            <span class="detail-text">Format</span>
                            <span class="detail-value">MCQ + Essay</span>
                        </div>
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-building"></i></div>
                            <span class="detail-text">Organizer</span>
                            <span class="detail-value">Marketing Institute BD</span>
                        </div>
                    </div>

                    <div class="exam-stats">
                        <div class="stat-item">
                            <span class="stat-number">892</span>
                            <span class="stat-label">Registered</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">Live</span>
                            <span class="stat-label">Status</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">1500</span>
                            <span class="stat-label">Seats</span>
                        </div>
                    </div>

                    <div class="exam-footer">
                        <div class="exam-price price-paid">৳500</div>
                        <button class="register-btn">Join Now</button>
                    </div>
                </div>
            </div>

            <!-- Exam Card 4 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="exam-card" data-category="creative" data-status="upcoming">
                    <div class="status-badge status-upcoming">Registration Open</div>
                    <div class="exam-header">
                        <div class="exam-category category-skill">Creative</div>
                    </div>
                    <h3 class="exam-title">National Essay Writing Competition</h3>
                    <p class="exam-description">Express your thoughts and creativity through compelling essay writing on current topics.</p>

                    <div class="exam-details">
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-calendar-alt"></i></div>
                            <span class="detail-text">Exam Date</span>
                            <span class="detail-value">June 25, 2025</span>
                        </div>
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-clock"></i></div>
                            <span class="detail-text">Duration</span>
                            <span class="detail-value">2.5 hours</span>
                        </div>
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-pen"></i></div>
                            <span class="detail-text">Format</span>
                            <span class="detail-value">Essay Writing</span>
                        </div>
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-building"></i></div>
                            <span class="detail-text">Organizer</span>
                            <span class="detail-value">Writers Association BD</span>
                        </div>
                    </div>

                    <div class="exam-stats">
                        <div class="stat-item">
                            <span class="stat-number">2,156</span>
                            <span class="stat-label">Registered</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">25</span>
                            <span class="stat-label">Days Left</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">5000</span>
                            <span class="stat-label">Seats</span>
                        </div>
                    </div>

                    <div class="exam-footer">
                        <div class="exam-price price-free">FREE</div>
                        <button class="register-btn">Register Now</button>
                    </div>
                </div>
            </div>

            <!-- Exam Card 5 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="exam-card" data-category="language" data-status="closed">
                    <div class="status-badge status-closed">Registration Closed</div>
                    <div class="exam-header">
                        <div class="exam-category category-academic">Language</div>
                    </div>
                    <h3 class="exam-title">IELTS Practice Test</h3>
                    <p class="exam-description">Comprehensive IELTS preparation test covering all four skills: Reading, Writing, Listening, and Speaking.</p>

                    <div class="exam-details">
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-calendar-alt"></i></div>
                            <span class="detail-text">Exam Date</span>
                            <span class="detail-value">June 1, 2025</span>
                        </div>
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-clock"></i></div>
                            <span class="detail-text">Duration</span>
                            <span class="detail-value">3 hours</span>
                        </div>
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-language"></i></div>
                            <span class="detail-text">Skills</span>
                            <span class="detail-value">4 Modules</span>
                        </div>
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-building"></i></div>
                            <span class="detail-text">Organizer</span>
                            <span class="detail-value">English Academy BD</span>
                        </div>
                    </div>

                    <div class="exam-stats">
                        <div class="stat-item">
                            <span class="stat-number">450</span>
                            <span class="stat-label">Registered</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">2</span>
                            <span class="stat-label">Days Left</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">500</span>
                            <span class="stat-label">Seats</span>
                        </div>
                    </div>

                    <div class="exam-footer">
                        <div class="exam-price price-paid">৳1,200</div>
                        <button class="register-btn" disabled>Registration Closed</button>
                    </div>
                </div>
            </div>

            <!-- Exam Card 6 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                <div class="exam-card" data-category="academic" data-status="upcoming">
                    <div class="status-badge status-upcoming">Registration Open</div>
                    <div class="exam-header">
                        <div class="exam-category category-academic">Mathematics</div>
                    </div>
                    <h3 class="exam-title">Bangladesh Mathematical Olympiad</h3>
                    <p class="exam-description">National mathematics competition for students to demonstrate problem-solving abilities.</p>

                    <div class="exam-details">
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-calendar-alt"></i></div>
                            <span class="detail-text">Exam Date</span>
                            <span class="detail-value">July 10, 2025</span>
                        </div>
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-clock"></i></div>
                            <span class="detail-text">Duration</span>
                            <span class="detail-value">4 hours</span>
                        </div>
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-calculator"></i></div>
                            <span class="detail-text">Problems</span>
                            <span class="detail-value">6 Math Problems</span>
                        </div>
                        <div class="exam-detail-item">
                            <div class="detail-icon"><i class="fas fa-building"></i></div>
                            <span class="detail-text">Organizer</span>
                            <span class="detail-value">Math Society BD</span>
                        </div>
                    </div>

                    <div class="exam-stats">
                        <div class="stat-item">
                            <span class="stat-number">3,247</span>
                            <span class="stat-label">Registered</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">42</span>
                            <span class="stat-label">Days Left</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">∞</span>
                            <span class="stat-label">Seats</span>
                        </div>
                    </div>

                    <div class="exam-footer">
                        <div class="exam-price price-free">FREE</div>
                        <button class="register-btn">Register Now</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Load More Section -->
        <div class="load-more-section" data-aos="fade-up">
            <button class="btn btn-primary btn-lg">Load More Exams</button>
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
                    <li><a href="index.html">Home</a></li>
                    <li><a href="upcoming-exams.html">Upcoming Exams</a></li>
                    <li><a href="leaderboard.html">Results</a></li>
                    <li><a href="index.html#features">Features</a></li>
                    <li><a href="index.html#benefits">Benefits</a></li>
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

    // Filter functionality
    document.addEventListener('DOMContentLoaded', function() {
        const categoryTags = document.querySelectorAll('[data-category]');
        const statusTags = document.querySelectorAll('[data-status]');
        const examCards = document.querySelectorAll('.exam-card');
        const searchInput = document.querySelector('.search-input');
        const searchBtn = document.querySelector('.search-btn');
        const clearFiltersBtn = document.querySelector('.clear-filters-btn');

        // Statistics elements
        const totalExamsEl = document.getElementById('totalExams');
        const filteredExamsEl = document.getElementById('filteredExams');
        const openRegistrationsEl = document.getElementById('openRegistrations');
        const freeExamsEl = document.getElementById('freeExams');

        let activeCategory = 'all';
        let activeStatus = 'all';
        let searchTerm = '';

        // Initial statistics
        updateStatistics();

        // Category filter
        categoryTags.forEach(tag => {
            tag.addEventListener('click', function() {
                // Remove active from all category tags
                categoryTags.forEach(t => t.classList.remove('active'));
                // Add active to clicked tag
                this.classList.add('active');
                activeCategory = this.getAttribute('data-category');
                filterExams();
            });
        });

        // Status filter
        statusTags.forEach(tag => {
            tag.addEventListener('click', function() {
                // Remove active from all status tags
                statusTags.forEach(t => t.classList.remove('active'));
                // Add active to clicked tag
                this.classList.add('active');
                activeStatus = this.getAttribute('data-status');
                filterExams();
            });
        });

        // Search functionality
        searchBtn.addEventListener('click', function() {
            searchTerm = searchInput.value.toLowerCase();
            filterExams();
        });

        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchTerm = this.value.toLowerCase();
                filterExams();
            }
        });

        // Real-time search
        searchInput.addEventListener('input', function() {
            searchTerm = this.value.toLowerCase();
            filterExams();
        });

        // Clear filters
        clearFiltersBtn.addEventListener('click', function() {
            // Reset category filters
            categoryTags.forEach(t => t.classList.remove('active'));
            document.querySelector('[data-category="all"]').classList.add('active');

            // Reset status filters
            statusTags.forEach(t => t.classList.remove('active'));
            document.querySelector('[data-status="all"]').classList.add('active');

            // Clear search
            searchInput.value = '';

            // Reset variables
            activeCategory = 'all';
            activeStatus = 'all';
            searchTerm = '';

            // Apply filters
            filterExams();

            // Add visual feedback
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
        });

        function filterExams() {
            let visibleCount = 0;

            examCards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');
                const cardStatus = card.getAttribute('data-status');
                const cardTitle = card.querySelector('.exam-title').textContent.toLowerCase();
                const cardOrganizer = card.querySelector('.detail-value').textContent.toLowerCase();

                let showCard = true;

                // Category filter
                if (activeCategory !== 'all' && cardCategory !== activeCategory) {
                    showCard = false;
                }

                // Status filter
                if (activeStatus !== 'all' && cardStatus !== activeStatus) {
                    showCard = false;
                }

                // Search filter
                if (searchTerm && !cardTitle.includes(searchTerm) && !cardOrganizer.includes(searchTerm)) {
                    showCard = false;
                }

                // Show/hide card with animation
                const cardContainer = card.parentElement;
                if (showCard) {
                    cardContainer.style.display = 'block';
                    cardContainer.style.opacity = '0';
                    cardContainer.style.transform = 'translateY(20px)';

                    setTimeout(() => {
                        cardContainer.style.transition = 'all 0.5s ease';
                        cardContainer.style.opacity = '1';
                        cardContainer.style.transform = 'translateY(0)';
                    }, visibleCount * 100);

                    visibleCount++;
                } else {
                    cardContainer.style.transition = 'all 0.3s ease';
                    cardContainer.style.opacity = '0';
                    cardContainer.style.transform = 'translateY(-20px)';

                    setTimeout(() => {
                        cardContainer.style.display = 'none';
                    }, 300);
                }
            });

            // Update filtered count
            filteredExamsEl.textContent = visibleCount;

            // Add pulse animation to filtered count
            filteredExamsEl.style.transform = 'scale(1.2)';
            filteredExamsEl.style.color = 'var(--secondary)';
            setTimeout(() => {
                filteredExamsEl.style.transform = 'scale(1)';
                filteredExamsEl.style.color = 'var(--primary)';
            }, 300);

            // Show "no results" message if needed
            showNoResultsMessage(visibleCount === 0);
        }

        function updateStatistics() {
            const totalExams = examCards.length;
            const openRegistrations = document.querySelectorAll('.status-upcoming, .status-ongoing').length;
            const freeExams = document.querySelectorAll('.price-free').length;

            totalExamsEl.textContent = totalExams;
            filteredExamsEl.textContent = totalExams;
            openRegistrationsEl.textContent = openRegistrations;
            freeExamsEl.textContent = freeExams;
        }

        function showNoResultsMessage(show) {
            let noResultsMsg = document.querySelector('.no-results-message');

            if (show && !noResultsMsg) {
                noResultsMsg = document.createElement('div');
                noResultsMsg.className = 'no-results-message col-12';
                noResultsMsg.innerHTML = `
                    <div class="text-center py-5">
                        <div class="mb-4">
                            <i class="fas fa-search" style="font-size: 4rem; color: var(--light-text); opacity: 0.5;"></i>
                        </div>
                        <h4 style="color: var(--dark-text); margin-bottom: 15px;">No Exams Found</h4>
                        <p style="color: var(--light-text); margin-bottom: 20px;">Try adjusting your filters or search terms</p>
                        <button class="btn btn-outline" onclick="document.querySelector('.clear-filters-btn').click()">
                            Clear All Filters
                        </button>
                    </div>
                `;
                document.getElementById('examsList').appendChild(noResultsMsg);
            } else if (!show && noResultsMsg) {
                noResultsMsg.remove();
            }
        }

        // Load more functionality
        document.querySelector('.load-more-section .btn').addEventListener('click', function() {
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Loading...';

            // Simulate loading
            setTimeout(() => {
                this.innerHTML = 'Load More Exams';
                alert('Load more functionality would be implemented here!');
            }, 1500);
        });

        // Register button functionality
        document.querySelectorAll('.register-btn:not([disabled])').forEach(btn => {
            btn.addEventListener('click', function() {
                const examTitle = this.closest('.exam-card').querySelector('.exam-title').textContent;

                // Add loading state
                const originalText = this.textContent;
                this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
                this.disabled = true;

                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                    alert(`Registration for "${examTitle}" would be processed here!`);
                }, 1500);
            });
        });

        // Add smooth scrolling to exams section when filters are applied
        let filterTimeout;
        const originalFilterExams = filterExams;
        filterExams = function() {
            clearTimeout(filterTimeout);
            filterTimeout = setTimeout(() => {
                originalFilterExams();
                // Smooth scroll to results
                document.querySelector('.exams-section').scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }, 300);
        };
    });
</script>
</body>
</html>
