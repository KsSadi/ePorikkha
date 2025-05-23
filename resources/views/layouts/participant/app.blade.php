<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ePorikkha - Modern Participant Dashboard</title>
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  @include('layouts.participant.partials.style')




</head>
<body>

<!-- Navbar for Both Desktop and Mobile -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container-fluid">
        <!-- Brand logo - stays on left -->
        <a class="navbar-brand" href="#">
            <span style="color: var(--primary); font-weight: 800;">e</span><span style="color: var(--secondary); font-weight: 800;">Porikkha</span>
        </a>

        <!-- Desktop Menu - Will be visible on lg screens and above -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="fas fa-home me-1"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-file-alt me-1"></i> Exams</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-chart-bar me-1"></i> Results</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-certificate me-1"></i> Certificates</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-question-circle me-1"></i> Help</a>
                </li>
            </ul>

            <!-- Desktop Search box -->


            <div class="navbar-search me-3">
                <input type="text" class="search-input form-control" placeholder="Search exams, courses, results...">
                <i class="fas fa-search search-icon"></i>
            </div>
        </div>

        <!-- Right-aligned content for both mobile and desktop -->
        <div class="d-flex align-items-center ms-auto">
            <!-- Notification bell - visible on all devices -->
            <div class="position-relative me-2">
                <button class="navbar-action has-notification">
                    <i class="far fa-bell"></i>
                    <span class="badge">3</span>
                </button>
            </div>

            <!-- Calendar icon - only visible on desktop -->
            <button class="navbar-action bg-gray-50 d-none d-lg-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px; border-radius: 8px; border: none;">
                <i class="far fa-calendar"></i>
            </button>

            <!-- User avatar - visible on all devices -->
            <div class="user-dropdown dropdown me-2">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="headerUser" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="user-avatar" style="width: 40px; height: 40px; border-radius: 8px; overflow: hidden;">
                        <img src="/api/placeholder/80/80" alt="Student" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="user-info d-none d-lg-block ms-2">
                        <div class="user-name">Rafsan Ahmed</div>
                        <div class="user-role">Computer Science</div>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow rounded-lg border-0" aria-labelledby="headerUser">
                    <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-medal me-2"></i> Achievements</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i> Sign out</a></li>
                </ul>
            </div>

            <!-- Mobile menu toggle button - only visible on mobile -->
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation" style="border: none; box-shadow: none;">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</nav>

<!-- Sidebar Offcanvas Menu - only for mobile -->
<div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">
            <span style="color: var(--primary); font-weight: 800;">e</span><span style="color: var(--secondary); font-weight: 800;">Porikkha</span>
        </h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="d-flex align-items-center mb-4 bg-gray-50 p-3 rounded-lg">
            <div style="width: 48px; height: 48px; border-radius: 8px; overflow: hidden; margin-right: 12px;">
                <img src="/api/placeholder/80/80" alt="Student" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div>
                <div style="font-weight: 700; color: var(--gray-800);">Rafsan Ahmed</div>
                <div style="font-size: 0.8rem; color: var(--gray-600);">Computer Science</div>
            </div>
        </div>

        <!-- Search in sidebar for mobile -->
        <div class="position-relative mb-4">
            <input type="text" class="form-control bg-gray-50 py-2 ps-4 pe-3" placeholder="Search..." style="border-radius: 8px; border: 1px solid var(--gray-200);">
            <i class="fas fa-search position-absolute" style="left: 12px; top: 50%; transform: translateY(-50%); color: var(--gray-500);"></i>
        </div>


        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link active d-flex align-items-center py-2 px-3" href="#" style="background-color: var(--primary-bg); color: var(--primary); border-radius: 8px;">
                    <i class="fas fa-home me-3"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center py-2 px-3" href="#" style="color: var(--gray-700); border-radius: 8px;">
                    <i class="fas fa-file-alt me-3"></i> Exams
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center py-2 px-3" href="#" style="color: var(--gray-700); border-radius: 8px;">
                    <i class="fas fa-chart-bar me-3"></i> Results
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center py-2 px-3" href="#" style="color: var(--gray-700); border-radius: 8px;">
                    <i class="fas fa-certificate me-3"></i> Certificates
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center py-2 px-3" href="#" style="color: var(--gray-700); border-radius: 8px;">
                    <i class="fas fa-question-circle me-3"></i> Help
                </a>
            </li>
        </ul>

        <hr class="my-4">

        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center py-2 px-3" href="#" style="color: var(--gray-700); border-radius: 8px;">
                    <i class="fas fa-cog me-3"></i> Settings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center py-2 px-3" href="#" style="color: var(--danger); border-radius: 8px;">
                    <i class="fas fa-sign-out-alt me-3"></i> Sign Out
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- Mobile Bottom Tabs - only for mobile -->
<div class="mobile-tabs d-lg-none">
    <a href="#" class="mobile-tab active">
        <i class="fas fa-home"></i>
        <span>Home</span>
    </a>
    <a href="#" class="mobile-tab">
        <i class="fas fa-file-alt"></i>
        <span>Exams</span>
    </a>
    <a href="#" class="mobile-tab">
        <i class="fas fa-chart-bar"></i>
        <span>Results</span>
    </a>
    <a href="#" class="mobile-tab">
        <i class="fas fa-bell"></i>
        <span>Alerts</span>
        <span class="badge bg-danger rounded-pill">3</span>
    </a>
    <a href="#" class="mobile-tab">
        <i class="fas fa-user"></i>
        <span>Profile</span>
    </a>
</div>
<!-- Main Content -->
<div class="main-content">
    <div class="container">
        <div class="dashboard-container">
            <!-- Modern Welcome Card -->
            <div class="welcome-card">
                <div class="welcome-card__background"></div>
                <div class="welcome-card__decoration"></div>
                <div class="welcome-card__content">
                    <div class="welcome-card__left">
                        <h1 class="welcome-title">Welcome back, Rafsan!</h1>
                        <p class="welcome-subtitle">Track your progress, manage your exams, and boost your academic performance with our advanced tools.</p>

                        <div class="welcome-actions">
                            <a href="#" class="btn btn-welcome btn-primary-gradient">
                                <i class="fas fa-play-circle"></i>
                                Continue Exam
                            </a>
                            <a href="#" class="btn btn-welcome btn-outline">
                                <i class="fas fa-calendar-plus"></i>
                                View Schedule
                            </a>
                        </div>

                        <div class="welcome-card__stats">
                            <div class="welcome-stat">
                                <div class="welcome-stat__value">24</div>
                                <div class="welcome-stat__label">Total Exams</div>
                            </div>
                            <div class="welcome-stat">
                                <div class="welcome-stat__value">82%</div>
                                <div class="welcome-stat__label">Avg Score</div>
                            </div>
                            <div class="welcome-stat">
                                <div class="welcome-stat__value">#12</div>
                                <div class="welcome-stat__label">Ranking</div>
                            </div>
                        </div>
                    </div>

                    <div class="welcome-card__right">
                        <div class="welcome-card__illustration">
                            <img src="https://picsum.photos/150/150" alt="Illustration" style="max-width: 90%; max-height: 90%; border-radius: 8px;">
                        </div>
                    </div>
                </div>

                <div class="welcome-card__date">
                    <i class="far fa-calendar-alt"></i>
                    <span class="date-text">Thursday, May 22, 2025</span>
                </div>
            </div>


            <!-- Stats Row -->
            <div class="row mb-4 animate-cards">
                <div class="col-lg-3 col-md-6 col-sm-6 mb-3 mb-lg-0">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: linear-gradient(145deg, var(--primary) 0%, var(--primary-dark) 100%);">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h6 class="stat-title">Total Exams</h6>
                        <h3 class="stat-value">24</h3>
                        <p class="stat-description">
                            <i class="fas fa-calendar text-primary"></i>
                            <span class="ms-1">3 upcoming</span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-3 mb-lg-0">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: linear-gradient(145deg, var(--success) 0%, #16a34a 100%);">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h6 class="stat-title">Average Score</h6>
                        <h3 class="stat-value">82%</h3>
                        <p class="stat-description">
                            <i class="fas fa-arrow-up text-success"></i>
                            <span class="ms-1 text-success">8% this month</span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-3 mb-lg-0">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: linear-gradient(145deg, var(--warning) 0%, #f97316 100%);">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h6 class="stat-title">Certificates</h6>
                        <h3 class="stat-value">8</h3>
                        <p class="stat-description">
                            <i class="fas fa-clock text-warning"></i>
                            <span class="ms-1">2 pending approval</span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-3 mb-md-0">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: linear-gradient(145deg, var(--secondary) 0%, #6366f1 100%);">
                            <i class="fas fa-medal"></i>
                        </div>
                        <h6 class="stat-title">Class Ranking</h6>
                        <h3 class="stat-value">#12</h3>
                        <p class="stat-description">
                            <i class="fas fa-users text-secondary"></i>
                            <span class="ms-1">Top 10% in your batch</span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Main Dashboard Content -->
            <div class="row g-3">
                <!-- Left Column -->
                <div class="col-lg-8 mb-3 mb-lg-0">
                    <!-- Live & Upcoming Exams Card -->
                    <div class="card-dashboard">
                        <div class="card-header">
                            <h5 class="card-title">Live & Upcoming Exams</h5>
                            <div class="card-tools">
                                <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="exam-item">
                                <div class="exam-icon bg-danger">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div class="exam-content">
                                    <h6 class="exam-title">Final Year Computer Science Examination</h6>
                                    <div class="exam-info">
                                        <span><i class="far fa-calendar"></i> May 18, 2025 (Today)</span>
                                        <span><i class="far fa-clock"></i> 10:00 AM - 01:00 PM</span>
                                        <span><i class="fas fa-book"></i> CS Program</span>
                                    </div>
                                </div>
                                <div class="status-badge in-progress">
                                    <i class="fas fa-circle"></i> In Progress
                                </div>
                                <div class="exam-actions">
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-play-circle"></i> Continue</a>
                                </div>
                            </div>

                            <div class="exam-item">
                                <div class="exam-icon bg-warning">
                                    <i class="fas fa-database"></i>
                                </div>
                                <div class="exam-content">
                                    <h6 class="exam-title">Advanced Database Systems</h6>
                                    <div class="exam-info">
                                        <span><i class="far fa-calendar"></i> May 20, 2025</span>
                                        <span><i class="far fa-clock"></i> 11:00 AM - 01:00 PM</span>
                                        <span><i class="fas fa-book"></i> CS Program</span>
                                    </div>
                                </div>
                                <div class="status-badge scheduled">
                                    <i class="fas fa-clock"></i> Upcoming
                                </div>
                                <div class="exam-actions">
                                    <a href="#" class="btn btn-outline-primary btn-sm"><i class="fas fa-info-circle"></i> Details</a>
                                </div>
                            </div>

                            <div class="exam-item">
                                <div class="exam-icon bg-secondary">
                                    <i class="fas fa-code"></i>
                                </div>
                                <div class="exam-content">
                                    <h6 class="exam-title">Software Engineering Principles</h6>
                                    <div class="exam-info">
                                        <span><i class="far fa-calendar"></i> May 25, 2025</span>
                                        <span><i class="far fa-clock"></i> 09:00 AM - 12:00 PM</span>
                                        <span><i class="fas fa-book"></i> CS Program</span>
                                    </div>
                                </div>
                                <div class="status-badge scheduled">
                                    <i class="fas fa-clock"></i> Upcoming
                                </div>
                                <div class="exam-actions">
                                    <a href="#" class="btn btn-outline-primary btn-sm"><i class="fas fa-info-circle"></i> Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Results Card -->
                    <div class="card-dashboard">
                        <div class="card-header">
                            <h5 class="card-title">Recent Results</h5>
                            <div class="card-tools">
                                <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="result-item">
                                <div class="result-header">
                                    <h6 class="result-title">Data Structures and Algorithms</h6>
                                    <span class="result-score">92/100</span>
                                </div>
                                <div class="result-info">
                                    <span><i class="far fa-calendar"></i> May 10, 2025</span>
                                    <span><i class="fas fa-book"></i> CS Program</span>
                                    <span><i class="fas fa-medal"></i> Rank: 3/76</span>
                                </div>
                                <div class="result-progress">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 92%" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress-info">
                                        <span class="score-label">Your Score</span>
                                        <span class="score-value">92%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="result-item">
                                <div class="result-header">
                                    <h6 class="result-title">Operating Systems Principles</h6>
                                    <span class="result-score">88/100</span>
                                </div>
                                <div class="result-info">
                                    <span><i class="far fa-calendar"></i> May 5, 2025</span>
                                    <span><i class="fas fa-book"></i> CS Program</span>
                                    <span><i class="fas fa-medal"></i> Rank: 7/82</span>
                                </div>
                                <div class="result-progress">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress-info">
                                        <span class="score-label">Your Score</span>
                                        <span class="score-value">88%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="result-item">
                                <div class="result-header">
                                    <h6 class="result-title">Computer Networks</h6>
                                    <span class="result-score">76/100</span>
                                </div>
                                <div class="result-info">
                                    <span><i class="far fa-calendar"></i> April 28, 2025</span>
                                    <span><i class="fas fa-book"></i> CS Program</span>
                                    <span><i class="fas fa-medal"></i> Rank: 15/78</span>
                                </div>
                                <div class="result-progress">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 76%" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress-info">
                                        <span class="score-label">Your Score</span>
                                        <span class="score-value">76%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-4">
                    <!-- Notifications Card -->
                    <div class="card-dashboard">
                        <div class="card-header">
                            <h5 class="card-title">Notifications</h5>
                            <div class="card-tools">
                                <button class="card-tool">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="notification-item">
                                <div class="notification-icon bg-danger">
                                    <i class="fas fa-bell"></i>
                                </div>
                                <div class="notification-content">
                                    <h6 class="notification-title">Examination Started</h6>
                                    <p class="notification-text">Final Year Computer Science Examination has started. Please login to take the exam.</p>
                                </div>
                                <div class="notification-time">Now</div>
                            </div>

                            <div class="notification-item">
                                <div class="notification-icon bg-warning">
                                    <i class="fas fa-exclamation-circle"></i>
                                </div>
                                <div class="notification-content">
                                    <h6 class="notification-title">Exam Reminder</h6>
                                    <p class="notification-text">Your Advanced Database Systems exam is scheduled for May 20, 2025 at 11:00 AM.</p>
                                </div>
                                <div class="notification-time">2 hrs ago</div>
                            </div>

                            <div class="notification-item">
                                <div class="notification-icon bg-success">
                                    <i class="fas fa-certificate"></i>
                                </div>
                                <div class="notification-content">
                                    <h6 class="notification-title">Certificate Available</h6>
                                    <p class="notification-text">Your Data Structures and Algorithms certificate is now available for download.</p>
                                </div>
                                <div class="notification-time">Yesterday</div>
                            </div>

                            <div class="notification-item">
                                <div class="notification-icon bg-primary">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="notification-content">
                                    <h6 class="notification-title">Result Published</h6>
                                    <p class="notification-text">Operating Systems Principles exam result has been published.</p>
                                </div>
                                <div class="notification-time">3 days ago</div>
                            </div>
                        </div>
                    </div>

                    <!-- Exam Calendar Card -->
                    <div class="card-dashboard">
                        <div class="card-header">
                            <h5 class="card-title">Exam Calendar</h5>
                            <div class="card-tools">
                                <button class="card-tool">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="calendar-container">
                                <div class="calendar-header">
                                    <div class="calendar-title">May 2025</div>
                                    <div class="calendar-actions">
                                        <button class="calendar-action">
                                            <i class="fas fa-chevron-left"></i>
                                        </button>
                                        <button class="calendar-action">
                                            <i class="fas fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="calendar-grid">
                                    <div class="calendar-weekday">Su</div>
                                    <div class="calendar-weekday">Mo</div>
                                    <div class="calendar-weekday">Tu</div>
                                    <div class="calendar-weekday">We</div>
                                    <div class="calendar-weekday">Th</div>
                                    <div class="calendar-weekday">Fr</div>
                                    <div class="calendar-weekday">Sa</div>

                                    <!-- Calendar Days -->
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">28</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">29</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">30</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">1</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">2</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">3</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">4</div>
                                    </div>

                                    <div class="calendar-day">
                                        <div class="calendar-day-content">5</div>
                                        <div class="calendar-day-dot"></div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">6</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">7</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">8</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">9</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">10</div>
                                        <div class="calendar-day-dot"></div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">11</div>
                                    </div>

                                    <div class="calendar-day">
                                        <div class="calendar-day-content">12</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">13</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">14</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">15</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">16</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">17</div>
                                    </div>
                                    <div class="calendar-day today has-exam">
                                        <div class="calendar-day-content">18</div>
                                    </div>

                                    <div class="calendar-day">
                                        <div class="calendar-day-content">19</div>
                                    </div>
                                    <div class="calendar-day has-exam">
                                        <div class="calendar-day-content">20</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">21</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">22</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">23</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">24</div>
                                    </div>
                                    <div class="calendar-day has-exam">
                                        <div class="calendar-day-content">25</div>
                                    </div>

                                    <div class="calendar-day">
                                        <div class="calendar-day-content">26</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">27</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">28</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">29</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">30</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">31</div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-content">1</div>
                                    </div>
                                </div>
                            </div>

                            <div class="upcoming-exams mt-4">
                                <h6>Upcoming Exams</h6>
                                <div class="upcoming-exam-item">
                                    <div class="upcoming-exam-indicator bg-danger"></div>
                                    <div class="upcoming-exam-content">
                                        <div class="upcoming-exam-title">Final Year CS Exam</div>
                                        <div class="upcoming-exam-time"><i class="far fa-clock"></i> Today, 10:00 AM</div>
                                    </div>
                                </div>

                                <div class="upcoming-exam-item">
                                    <div class="upcoming-exam-indicator bg-primary"></div>
                                    <div class="upcoming-exam-content">
                                        <div class="upcoming-exam-title">Advanced Database Systems</div>
                                        <div class="upcoming-exam-time"><i class="far fa-clock"></i> May 20, 11:00 AM</div>
                                    </div>
                                </div>

                                <div class="upcoming-exam-item">
                                    <div class="upcoming-exam-indicator bg-secondary"></div>
                                    <div class="upcoming-exam-content">
                                        <div class="upcoming-exam-title">Software Engineering</div>
                                        <div class="upcoming-exam-time"><i class="far fa-clock"></i> May 25, 09:00 AM</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  @include('layouts.participant.partials.footer')
</div>
@include('layouts.participant.partials.script')
</body>
</html>
