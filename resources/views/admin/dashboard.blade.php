@extends('layouts.main')

@section('pageTitle', 'Dashboard')
@section('content')

    <div class="welcome-card">
        <div class="welcome-content">
            <h2 class="welcome-title" id="welcomeMessage">Welcome back, {{ Auth::user()->name }}!</h2>
            <p class="welcome-subtitle">Manage exams, create questions, monitor student performance from your dashboard.</p>
            <a href="{{route('admin.manage.exam')}}" >
            <button class="btn btn-light btn-custom">
                <i class="fas fa-plus btn-icon"></i> Manage Exam
            </button>
            </a>

        </div>
    </div>

    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-clipboard-list"></i>
            </div>
            <div class="stat-value">24</div>
            <div class="stat-label">Total Exams</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-user-graduate"></i>
            </div>
            <div class="stat-value">156</div>
            <div class="stat-label">Active Students</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-question-circle"></i>
            </div>
            <div class="stat-value">485</div>
            <div class="stat-label">Questions Created</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-chart-bar"></i>
            </div>
            <div class="stat-value">92%</div>
            <div class="stat-label">Completion Rate</div>
        </div>
    </div>

    <!-- Quick Actions Panel -->
    <div class="section-header">
        <h2 class="section-title">Quick Actions</h2>
    </div>

    <div class="exams-grid">
        <a href="{{route('admin.exam.create')}}" class="quick-action-card">
            <div class="quick-action-icon">
                <i class="fas fa-plus-circle"></i>
            </div>
            <div class="quick-action-title">Create New Exam</div>
            <div class="quick-action-desc">Set up a new exam with questions and time limits</div>
        </a>

     {{--   <a href="#" class="quick-action-card">
            <div class="quick-action-icon">
                <i class="fas fa-question-circle"></i>
            </div>
            <div class="quick-action-title">Question Bank</div>
            <div class="quick-action-desc">Manage your collection of questions</div>
        </a>--}}

        <a href="{{route('admin.student.create')}}" class="quick-action-card">
            <div class="quick-action-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <div class="quick-action-title">Add Students</div>
            <div class="quick-action-desc">Register new students or import from CSV</div>
        </a>

        <a href="#" class="quick-action-card">
            <div class="quick-action-icon">
                <i class="fas fa-chart-bar"></i>
            </div>
            <div class="quick-action-title">View Reports</div>
            <div class="quick-action-desc">Analyze exam performances and statistics</div>
        </a>
    </div>

    <div class="countdown-card">
        <h3 class="countdown-title">Next Exam: Advanced Mathematics</h3>
        <div class="countdown-display">
            <div class="countdown-item">
                <div class="countdown-value" id="daysValue">03</div>
                <div class="countdown-label">Days</div>
            </div>
            <div class="countdown-item">
                <div class="countdown-value" id="hoursValue">18</div>
                <div class="countdown-label">Hours</div>
            </div>
            <div class="countdown-item">
                <div class="countdown-value" id="minutesValue">45</div>
                <div class="countdown-label">Minutes</div>
            </div>
            <div class="countdown-item">
                <div class="countdown-value" id="secondsValue">22</div>
                <div class="countdown-label">Seconds</div>
            </div>
        </div>
    </div>


    <!-- Exam Available But Not Started State -->
    <div id="upcomingExamContainer">
        <div class="section-header">
            <h2 class="section-title">Upcoming Exams</h2>
            <a href="#" class="view-all">View All <i class="fas fa-chevron-right"></i></a>
        </div>

        <div class="exams-grid">
            <div class="exam-card">
                <div class="exam-card-header">
                    <div class="exam-subject-icon math-icon">
                        <i class="fas fa-square-root-alt"></i>
                    </div>
                    <div class="exam-info">
                        <div class="exam-title" id="examTitle">Advanced Mathematics</div>
                        <div class="exam-subtitle">30 questions • 2 hours</div>
                    </div>
                </div>

                <div class="exam-details">
                    <div class="detail-row">
                        <div class="detail-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="detail-text">May 10, 2025</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="detail-text">10:00 AM</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="detail-text">Prof. Johnson</div>
                    </div>
                </div>

                <div class="exam-status">
                    <span class="status-badge status-upcoming">Starts in 3 days</span>
                    <a href="countdown-timer.html?id=1" class="exam-action action-view">
                        <i class="fas fa-eye"></i> View Details
                    </a>
                </div>
            </div>

            <div class="exam-card">
                <div class="exam-card-header">
                    <div class="exam-subject-icon science-icon">
                        <i class="fas fa-flask"></i>
                    </div>
                    <div class="exam-info">
                        <div class="exam-title" id="examTitle">Basic Science</div>
                        <div class="exam-subtitle">25 questions • 1.5 hours</div>
                    </div>
                </div>

                <div class="exam-details">
                    <div class="detail-row">
                        <div class="detail-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="detail-text">May 15, 2025</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="detail-text">2:00 PM</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="detail-text">Dr. Williams</div>
                    </div>
                </div>

                <div class="exam-status">
                    <span class="status-badge status-upcoming">Starts in 8 days</span>
                    <a href="countdown-timer.html?id=2" class="exam-action action-view">
                        <i class="fas fa-eye"></i> View Details
                    </a>
                </div>
            </div>

            <div class="exam-card">
                <div class="exam-card-header">
                    <div class="exam-subject-icon cs-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <div class="exam-info">
                        <div class="exam-title" id="activeExamTitle">Computer Science 101</div>
                        <div class="exam-subtitle">40 questions • 2.5 hours</div>
                    </div>
                </div>

                <div class="exam-details">
                    <div class="detail-row">
                        <div class="detail-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="detail-text">Today</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="detail-text">9:00 AM</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="detail-text">Prof. Anderson</div>
                    </div>
                </div>

                <div class="exam-status">
                    <span class="status-badge status-active pulse-animation">Active Now</span>
                    <a href="#" class="exam-action action-start" id="startExamBtn">
                        <i class="fas fa-play"></i> Start Exam
                    </a>
                </div>
            </div>
        </div>


    </div>

    <!-- Exam Results Section -->
    <div class="section-header">
        <h2 class="section-title">Recent Results</h2>
        <a href="#" class="view-all">View All <i class="fas fa-chevron-right"></i></a>
    </div>

    <div class="recent-results">
        <div class="result-item">
            <div class="result-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="result-info">
                <div class="result-title">Physics Fundamentals</div>
                <div class="result-date">Completed on May 2, 2025</div>
            </div>
            <div class="result-score">92%</div>
        </div>

        <div class="result-item">
            <div class="result-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="result-info">
                <div class="result-title">English Literature</div>
                <div class="result-date">Completed on April 28, 2025</div>
            </div>
            <div class="result-score">85%</div>
        </div>

        <div class="result-item">
            <div class="result-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="result-info">
                <div class="result-title">History: Modern Era</div>
                <div class="result-date">Completed on April 22, 2025</div>
            </div>
            <div class="result-score">78%</div>
        </div>
    </div>

    <br>

@endsection
