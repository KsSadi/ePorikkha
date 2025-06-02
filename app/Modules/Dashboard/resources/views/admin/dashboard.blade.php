@extends('layouts.admin.app')

@push('styles')
    <style>

        /* Enhanced Action Cards */
        .action-btn {
            background: white;
            border: 1px solid rgba(226, 232, 240, 0.6);
            border-radius: 16px;
            padding: 32px 24px;
            text-align: center;
            text-decoration: none;
            color: var(--text-dark);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: block;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .action-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(5, 150, 105, 0.03), transparent);
            transition: left 0.6s ease;
        }

        .action-btn:hover::before {
            left: 100%;
        }

        .action-btn:hover {
            color: var(--primary-color);
            transform: translateY(-6px);
            box-shadow: 0 12px 40px rgba(5, 150, 105, 0.15);
            border-color: rgba(5, 150, 105, 0.3);
        }

        .action-btn i {
            font-size: 3rem;
            margin-bottom: 20px;
            display: block;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .action-btn:hover i {
            transform: scale(1.1) rotate(-5deg);
        }
        @media (max-width: 768px) {
            .action-btn {
                padding: 24px 20px;
            }

            .action-btn i {
                font-size: 2.5rem;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="dashboard-card stat-card primary">
                <div class="stat-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="stat-number">156</div>
                <div class="stat-label">Total Exams</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    <span>+18% from last month</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="dashboard-card stat-card success">
                <div class="stat-icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <div class="stat-number">24</div>
                <div class="stat-label">Active Contests</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    <span>+12% from last month</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="dashboard-card stat-card info">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number">2,847</div>
                <div class="stat-label">Total Students</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    <span>+32% from last month</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="dashboard-card stat-card warning">
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-number">14</div>
                <div class="stat-label">Pending Reviews</div>
                <div class="stat-change negative">
                    <i class="fas fa-arrow-down"></i>
                    <span>-6% from last month</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="#" class="action-btn">
                <i class="fas fa-plus-circle text-primary"></i>
                <div class="btn-title">Create New Exam</div>
                <div class="btn-desc">Design SSC, HSC or admission test papers</div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="#" class="action-btn">
                <i class="fas fa-trophy text-success"></i>
                <div class="btn-title">Launch Contest</div>
                <div class="btn-desc">Start inter-school programming competition</div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="#" class="action-btn">
                <i class="fas fa-user-plus" style="color: var(--accent-color);"></i>
                <div class="btn-title">Add Students</div>
                <div class="btn-desc">Register new students to the platform</div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="#" class="action-btn">
                <i class="fas fa-chart-line text-warning"></i>
                <div class="btn-title">View Reports</div>
                <div class="btn-desc">Analyze exam performance and trends</div>
            </a>
        </div>
    </div>

    <!-- Activity and Stats -->
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="activity-metrics-card">
                <div class="card-header-custom">
                    <h5 class="card-title">Recent Activity</h5>
                    <a href="#" class="view-all-btn">
                        <span>View All</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="activity-item">
                    <div class="activity-icon exam">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">HSC Physics Final Exam created for Dhaka College</div>
                        <div class="activity-time">
                            <i class="fas fa-clock"></i>
                            <span>2 hours ago</span>
                        </div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon user">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">45 new students registered from Notre Dame College</div>
                        <div class="activity-time">
                            <i class="fas fa-clock"></i>
                            <span>4 hours ago</span>
                        </div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon contest">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Inter-School Programming Contest started</div>
                        <div class="activity-time">
                            <i class="fas fa-clock"></i>
                            <span>6 hours ago</span>
                        </div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon result">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">SSC Mathematics Exam results published</div>
                        <div class="activity-time">
                            <i class="fas fa-clock"></i>
                            <span>1 day ago</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="activity-metrics-card">
                <div class="card-header-custom">
                    <h5 class="card-title">Performance Metrics</h5>
                    <span class="badge bg-success">Live</span>
                </div>

                <div class="progress-item">
                    <div class="progress-header">
                        <span class="progress-label">Exam Completion Rate</span>
                        <span class="progress-value">89%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: 89%"></div>
                    </div>
                    <div class="progress-change text-success">
                        <i class="fas fa-arrow-up"></i>
                        <span>+7% from last week</span>
                    </div>
                </div>

                <div class="progress-item">
                    <div class="progress-header">
                        <span class="progress-label">Active Students</span>
                        <span class="progress-value">94%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-success" style="width: 94%"></div>
                    </div>
                    <div class="progress-change text-success">
                        <i class="fas fa-arrow-up"></i>
                        <span>+5% from last week</span>
                    </div>
                </div>

                <div class="progress-item">
                    <div class="progress-header">
                        <span class="progress-label">Contest Participation</span>
                        <span class="progress-value">76%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" style="width: 76%"></div>
                    </div>
                    <div class="progress-change text-danger">
                        <i class="fas fa-arrow-down"></i>
                        <span>-3% from last week</span>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="#" class="analytics-btn">
                        <i class="fas fa-chart-line"></i>
                        <span>View Detailed Analytics</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
