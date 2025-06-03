<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Log Files Management - Log Tracker')</title>
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --success-color: #059669;
            --warning-color: #d97706;
            --danger-color: #dc2626;
            --info-color: #0284c7;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
            --border-radius: 8px;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --transition: all 0.2s ease-in-out;
        }

        body {
            background-color: var(--gray-50);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', system-ui, sans-serif;
            color: var(--gray-900);
            line-height: 1.6;
        }

        /* Clean Navigation */
        .navbar {
            background-color: white;
            border-bottom: 1px solid var(--gray-200);
            box-shadow: var(--shadow-sm);
            padding: 1rem 0;
        }

        .navbar-brand {
            color: var(--gray-900) !important;
            font-weight: 600;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .brand-icon {
            width: 32px;
            height: 32px;
            background-color: var(--primary-color);
            color: white;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .navbar-nav .nav-link {
            color: var(--gray-600) !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            transition: var(--transition);
            margin: 0 0.25rem;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-color) !important;
            background-color: var(--gray-100);
        }

        .navbar-nav .nav-link.active {
            color: var(--primary-color) !important;
            background-color: #dbeafe;
        }

        .navbar-toggler {
            border: 1px solid var(--gray-300);
            padding: 0.25rem 0.5rem;
        }

        /* Enhanced Page Header */
        .page-header {
            background-color: white;
            border: 1px solid var(--gray-200);
            border-radius: 12px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-sm);
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color) 0%, var(--info-color) 100%);
        }

        .page-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.75rem;
            letter-spacing: -0.025em;
        }

        .page-header h1 i {
            color: var(--primary-color);
            margin-right: 0.75rem;
        }

        .page-header p {
            color: var(--gray-600);
            margin-bottom: 0;
            font-size: 1.125rem;
            line-height: 1.6;
        }

        /* Enhanced Filter Section */
        .filters-section {
            background: white;
            border: 1px solid var(--gray-200);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-sm);
        }

        .filter-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--gray-200);
        }

        .filter-title {
            display: flex;
            align-items: center;
            font-weight: 600;
            color: var(--gray-900);
            font-size: 1.125rem;
        }

        .filter-title i {
            margin-right: 0.75rem;
            color: var(--primary-color);
        }

        .filter-controls {
            display: grid;
            grid-template-columns: 2fr 1fr auto;
            gap: 1rem;
            align-items: end;
        }

        .search-box {
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            z-index: 2;
        }

        .search-input {
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: 1px solid var(--gray-300);
            border-radius: var(--border-radius);
            font-size: 0.875rem;
            transition: var(--transition);
            width: 100%;
            background: white;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .date-filter {
            padding: 0.75rem 1rem;
            border: 1px solid var(--gray-300);
            border-radius: var(--border-radius);
            font-size: 0.875rem;
            transition: var(--transition);
            background: white;
            cursor: pointer;
        }

        .date-filter:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .apply-btn {
            background-color: var(--primary-color);
            border: 1px solid var(--primary-color);
            padding: 0.75rem 1.5rem;
            border-radius: var(--border-radius);
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
        }

        .apply-btn:hover {
            background-color: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: var(--shadow);
        }

        /* Stats Overview */
        .stats-overview {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--gray-200);
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--primary-color);
        }

        .stat-label {
            color: var(--gray-600);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-size: 0.875rem;
        }

        /* Modern Log Cards */
        .logs-container {
            background: white;
            border: 1px solid var(--gray-200);
            border-radius: 12px;
            padding: 0;
            box-shadow: var(--shadow-sm);
            overflow: hidden;
        }

        .logs-header {
            background-color: var(--gray-50);
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--gray-200);
        }

        .logs-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--gray-900);
        }

        .file-count-badge {
            background-color: var(--primary-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .logs-grid {
            display: grid;
            gap: 0;
            padding-bottom: 2rem;
        }

        .logs-header-row {
            display: grid;
            grid-template-columns: 2fr repeat(4, 1fr) 1fr 1.5fr;
            align-items: center;
            padding: 1rem 2rem;
            background-color: var(--gray-50);
            border-bottom: 1px solid var(--gray-200);
            font-weight: 600;
            color: var(--gray-700);
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .header-cell {
            text-align: center;
        }

        .header-cell:first-child {
            text-align: left;
        }

        .header-cell:last-child {
            text-align: center;
        }

        .log-card {
            display: grid;
            grid-template-columns: 2fr repeat(4, 1fr) 1fr 1.5fr;
            align-items: center;
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--gray-200);
            transition: var(--transition);
            cursor: pointer;
            position: relative;
            z-index: 1;
        }

        .log-card:hover {
            background-color: var(--gray-50);
            transform: translateX(4px);
        }

        .log-card:last-child {
            border-bottom: none;
        }

        .log-card.active-dropdown {
            z-index: 1001;
        }

        .log-info {
            display: flex;
            flex-direction: column;
        }

        .log-filename {
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 0.25rem;
            font-size: 1rem;
        }

        .log-date {
            color: var(--gray-500);
            font-size: 0.875rem;
        }

        .log-stat {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.25rem;
        }

        .stat-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 45px;
            height: 30px;
            border-radius: 15px;
            font-weight: 600;
            font-size: 0.8rem;
            color: white;
        }

        .stat-badge.total { background-color: var(--primary-color); }
        .stat-badge.error { background-color: var(--danger-color); }
        .stat-badge.warning { background-color: var(--warning-color); }
        .stat-badge.info { background-color: var(--info-color); }

        .stat-label {
            font-size: 0.75rem;
            color: var(--gray-500);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .file-size {
            color: var(--gray-600);
            font-weight: 500;
            font-size: 0.875rem;
            text-align: center;
        }

        /* Enhanced Actions */
        .log-actions {
            display: flex;
            gap: 0.5rem;
            justify-content: center;
        }

        .action-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            transition: var(--transition);
            cursor: pointer;
            text-decoration: none;
            background: white;
        }

        .action-btn.view {
            border-color: var(--info-color);
            color: var(--info-color);
        }

        .action-btn.view:hover {
            background-color: var(--info-color);
            color: white;
            transform: scale(1.1);
        }

        .action-btn.download {
            border-color: var(--success-color);
            color: var(--success-color);
        }

        .action-btn.download:hover {
            background-color: var(--success-color);
            color: white;
            transform: scale(1.1);
        }

        .action-btn.delete {
            border-color: var(--danger-color);
            color: var(--danger-color);
        }

        .action-btn.delete:hover {
            background-color: var(--danger-color);
            color: white;
            transform: scale(1.1);
        }

        /* Export Dropdown */
        .export-dropdown {
            position: relative;
        }

        .export-toggle {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .export-toggle:hover {
            background-color: var(--primary-color);
            color: white;
            transform: scale(1.1);
        }

        .export-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border: 1px solid var(--gray-200);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
            padding: 0.5rem 0;
            min-width: 140px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: var(--transition);
            margin-top: 5px;
            z-index: 1000;
        }

        .export-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .export-menu::before {
            content: '';
            position: absolute;
            top: -6px;
            right: 18px;
            width: 12px;
            height: 12px;
            background: white;
            border-left: 1px solid var(--gray-200);
            border-top: 1px solid var(--gray-200);
            transform: rotate(45deg);
        }

        .export-menu a {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: var(--gray-700);
            text-decoration: none;
            transition: var(--transition);
            font-size: 0.875rem;
            font-weight: 500;
        }

        .export-menu a:hover {
            background-color: var(--gray-50);
            color: var(--gray-900);
        }

        .export-menu i {
            margin-right: 0.75rem;
            width: 16px;
            font-size: 0.875rem;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--gray-500);
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--gray-400);
        }

        .empty-state h3 {
            color: var(--gray-700);
            margin-bottom: 0.5rem;
        }

        /* Success/Error Messages */
        .alert {
            border-radius: var(--border-radius);
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid;
            font-weight: 500;
        }

        .alert-success {
            background-color: #f0fdf4;
            border-color: #bbf7d0;
            color: #166534;
        }

        .alert-danger {
            background-color: #fef2f2;
            border-color: #fecaca;
            color: #991b1b;
        }

        /* Bulk Export Button */
        .btn-outline-primary {
            background: white;
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            padding: 0.75rem 1.5rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-1px);
            box-shadow: var(--shadow);
        }

        /* Modal Styling */
        .modal-content {
            border-radius: 12px;
            border: 1px solid var(--gray-200);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .modal-header {
            border-bottom: 1px solid var(--gray-200);
            padding: 1.5rem;
        }

        .modal-title {
            font-weight: 600;
            color: var(--gray-900);
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-footer {
            border-top: 1px solid var(--gray-200);
            padding: 1.5rem;
        }

        .form-label {
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 1px solid var(--gray-300);
            border-radius: var(--border-radius);
            padding: 0.75rem 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            outline: none;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            border: 1px solid;
            transition: var(--transition);
            cursor: pointer;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: var(--shadow);
        }

        .btn-secondary {
            background-color: var(--gray-500);
            border-color: var(--gray-500);
            color: white;
        }

        .btn-secondary:hover {
            background-color: var(--gray-600);
        }

        .btn-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--gray-400);
            cursor: pointer;
        }

        /* Footer */
        .footer {
            background-color: white;
            border-top: 1px solid var(--gray-200);
            margin-top: 3rem;
            padding: 1.5rem 0;
        }

        .footer-content {
            text-align: center;
            color: var(--gray-600);
            font-size: 0.875rem;
        }

        .footer-brand {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .filter-controls {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .logs-header-row,
            .log-card {
                grid-template-columns: 1fr;
                gap: 1rem;
                text-align: left;
            }

            .logs-header-row {
                display: none;
            }

            .log-actions {
                justify-content: flex-start;
            }

            .log-stat {
                text-align: left;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                padding: 0.5rem;
                background-color: var(--gray-50);
                border-radius: var(--border-radius);
            }

            .stat-badge {
                min-width: 35px;
                height: 25px;
                font-size: 0.75rem;
            }

            .stat-label {
                font-size: 0.8rem;
                text-transform: none;
                letter-spacing: normal;
                color: var(--gray-700);
                font-weight: 600;
            }
        }

        @media (max-width: 768px) {
            .page-header {
                padding: 1.5rem;
                text-align: center;
            }

            .filters-section {
                padding: 1.5rem;
            }

            .stats-overview {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }

            .logs-header {
                padding: 1rem;
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .log-card {
                padding: 1rem;
            }

            .action-btn {
                width: 32px;
                height: 32px;
                font-size: 0.8rem;
            }
        }

        @media (max-width: 480px) {
            .stats-overview {
                grid-template-columns: 1fr;
            }

            .log-actions {
                gap: 0.25rem;
            }

            .action-btn {
                width: 30px;
                height: 30px;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        @keyframes slideOutRight {
            to { transform: translateX(100%); opacity: 0; }
        }

        /* Smooth transitions */
        .page-content {
            animation: fadeIn 0.3s ease-out;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: var(--gray-100);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gray-300);
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--gray-400);
        }
    </style>
</head>
<body>
<!-- Clean Navigation -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        @if(Route::has('log-tracker.dashboard'))
            <a class="navbar-brand" href="{{ route('log-tracker.dashboard') }}">
                <div class="brand-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <span>Log Tracker</span>
            </a>
        @else
            <a class="navbar-brand" href="#">
                <div class="brand-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <span>Log Tracker</span>
            </a>
        @endif

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    @if(Route::has('log-tracker.dashboard'))
                        <a class="nav-link" href="{{ route('log-tracker.dashboard') }}">
                            <i class="fas fa-chart-line"></i>
                            Dashboard
                        </a>
                    @else
                        <a class="nav-link" href="#">
                            <i class="fas fa-chart-line"></i>
                            Dashboard
                        </a>
                    @endif
                </li>
                <li class="nav-item">
                    @if(Route::has('log-tracker.index'))
                        <a class="nav-link active" href="{{ route('log-tracker.index') }}">
                            <i class="fas fa-list"></i>
                            Log Files
                        </a>
                    @else
                        <a class="nav-link active" href="#">
                            <i class="fas fa-list"></i>
                            Log Files
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container my-4 page-content">
    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>{{ session('error') }}
        </div>
    @endif

    <!-- Modern Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1><i class="fas fa-list"></i>Log Files Management</h1>
                <p>Monitor, analyze, and manage your application logs efficiently</p>
            </div>
            <div class="col-md-4 text-end">
                <div style="font-size: 4rem; opacity: 0.1; color: var(--primary-color);">
                    <i class="fas fa-server"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Filter Section -->
    <div class="filters-section">
        <div class="filter-header">
            <div class="filter-title">
                <i class="fas fa-filter"></i>
                Smart Filters
            </div>
            @if(Route::has('log-tracker.export.form'))
                <a href="{{ route('log-tracker.export.form') }}" class="btn-outline-primary">
                    <i class="fas fa-download"></i>Bulk Export
                </a>
            @else
                <a href="#" class="btn-outline-primary">
                    <i class="fas fa-download"></i>Bulk Export
                </a>
            @endif
        </div>

        <div class="filter-controls">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchLogFiles" class="search-input" placeholder="Search log files by name or date...">
            </div>

            <select class="date-filter" id="dateFilter">
                <option value="all">All Time</option>
                <option value="today">Today</option>
                <option value="last7">Last 7 Days</option>
                <option value="last30">Last 30 Days</option>
                <option value="custom">Custom Range</option>
            </select>

            <button class="apply-btn" onclick="applyFilters()">
                <i class="fas fa-search"></i>
                <span>Apply</span>
            </button>
        </div>
    </div>

    <!-- Stats Overview -->
    <div class="stats-overview">
        <div class="stat-card">
            <div class="stat-number">{{ $totalFiles ?? 0 }}</div>
            <div class="stat-label">Total Files</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{ isset($counts) ? number_format(array_sum(array_column($counts, 'total'))) : 0 }}</div>
            <div class="stat-label">Total Logs</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{ isset($counts) ? number_format(array_sum(array_column($counts, 'error'))) : 0 }}</div>
            <div class="stat-label">Total Errors</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">
                @if(isset($logFiles) && is_array($logFiles))
                    {{ round(array_sum(array_map(function($file) { return file_exists(storage_path('logs/' . $file)) ? filesize(storage_path('logs/' . $file)) : 0; }, $logFiles)) / 1024 / 1024, 2) }}MB
                @else
                    0MB
                @endif
            </div>
            <div class="stat-label">Total Size</div>
        </div>
    </div>

    <!-- Modern Log Cards -->
    <div class="logs-container">
        <div class="logs-header">
            <div class="logs-title">Log Files</div>
            <div class="file-count-badge" id="fileCountBadge">{{ $totalFiles ?? 0 }} files</div>
        </div>

        <div class="logs-grid" id="logsGrid">
            <!-- Header Row -->
            <div class="logs-header-row">
                <div class="header-cell">File Information</div>
                <div class="header-cell">Total</div>
                <div class="header-cell">Errors</div>
                <div class="header-cell">Warnings</div>
                <div class="header-cell">Info</div>
                <div class="header-cell">Size</div>
                <div class="header-cell">Actions</div>
            </div>

            @forelse($logFiles ?? [] as $file)
                <div class="log-card" data-log-date="{{ $file }}" data-search-text="{{ strtolower($file) }}">
                    <div class="log-info">
                        <div class="log-filename">{{ isset($formattedFileNames[$file]) ? $formattedFileNames[$file] : $file }}</div>
                        <div class="log-date">
                            @php
                                $dateString = 'Unknown date';
                                if (preg_match('/laravel-(\d{4})-(\d{2})-(\d{2})\.log/', $file, $matches)) {
                                    try {
                                        $dateString = \Carbon\Carbon::createFromFormat('Y-m-d', $matches[1] . '-' . $matches[2] . '-' . $matches[3])->format('M d, Y');
                                    } catch (Exception $e) {
                                        $dateString = 'Invalid date';
                                    }
                                } elseif ($file === 'laravel.log') {
                                    $dateString = 'Current log';
                                }
                            @endphp
                            {{ $dateString }}
                        </div>
                    </div>

                    <div class="log-stat">
                        <div class="stat-badge total">{{ isset($counts[$file]['total']) ? $counts[$file]['total'] : 0 }}</div>
                        <div class="stat-label">Total</div>
                    </div>

                    <div class="log-stat">
                        <div class="stat-badge error">{{ isset($counts[$file]['error']) ? $counts[$file]['error'] : 0 }}</div>
                        <div class="stat-label">Errors</div>
                    </div>

                    <div class="log-stat">
                        <div class="stat-badge warning">{{ isset($counts[$file]['warning']) ? $counts[$file]['warning'] : 0 }}</div>
                        <div class="stat-label">Warnings</div>
                    </div>

                    <div class="log-stat">
                        <div class="stat-badge info">{{ isset($counts[$file]['info']) ? $counts[$file]['info'] : 0 }}</div>
                        <div class="stat-label">Info</div>
                    </div>

                    <div class="file-size">{{ isset($fileSizes[$file]) ? $fileSizes[$file] : 'Unknown' }}</div>

                    <div class="log-actions">
                        @if(Route::has('log-tracker.show'))
                            <a href="{{ route('log-tracker.show', ['logName' => $file]) }}"
                               class="action-btn view"
                               title="View Details">
                                <i class="fas fa-eye"></i>
                            </a>
                        @else
                            <a href="#" class="action-btn view" title="View Details">
                                <i class="fas fa-eye"></i>
                            </a>
                        @endif

                        @if(Route::has('log-tracker.download'))
                            <a href="{{ route('log-tracker.download', ['logName' => $file]) }}"
                               class="action-btn download"
                               title="Download">
                                <i class="fas fa-download"></i>
                            </a>
                        @else
                            <a href="#" class="action-btn download" title="Download">
                                <i class="fas fa-download"></i>
                            </a>
                        @endif

                        <div class="export-dropdown">
                            <button class="export-toggle" onclick="toggleExportMenu(this)" title="Export Options">
                                <i class="fas fa-share-alt"></i>
                            </button>
                            <div class="export-menu">
                                @if(Route::has('log-tracker.export.quick'))
                                    <a href="{{ route('log-tracker.export.quick', [$file, 'csv']) }}">
                                        <i class="fas fa-table"></i>CSV
                                    </a>
                                    <a href="{{ route('log-tracker.export.quick', [$file, 'json']) }}">
                                        <i class="fas fa-code"></i>JSON
                                    </a>
                                    <a href="{{ route('log-tracker.export.quick', [$file, 'excel']) }}">
                                        <i class="fas fa-file-excel"></i>Excel
                                    </a>
                                    <a href="{{ route('log-tracker.export.quick', [$file, 'pdf']) }}">
                                        <i class="fas fa-file-pdf"></i>PDF
                                    </a>
                                @else
                                    <a href="#">
                                        <i class="fas fa-table"></i>CSV
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-code"></i>JSON
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-file-excel"></i>Excel
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-file-pdf"></i>PDF
                                    </a>
                                @endif
                            </div>
                        </div>

                        @if(Route::has('log-tracker.delete') && config('log-tracker.allow_delete', false))
                            <form action="{{ route('log-tracker.delete', ['logName' => $file]) }}"
                                  method="POST"
                                  style="display: inline;">
                                @csrf
                                <button type="button"
                                        class="action-btn delete"
                                        title="Delete"
                                        onclick="confirmDelete(this, '{{ $file }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        @else
                            <button type="button"
                                    class="action-btn delete"
                                    title="Delete"
                                    onclick="showDeleteDisabled()">
                                <i class="fas fa-trash"></i>
                            </button>
                        @endif
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <i class="fas fa-inbox"></i>
                    <h3>No Log Files Found</h3>
                    <p>There are no log files to display at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <p class="mb-0">
                © <span id="year">{{ date('Y') }}</span>
                <a href="https://github.com/KsSadi/Laravel-Log-Tracker" class="footer-brand" target="_blank">
                    Log Tracker
                </a>
                - Efficient logging, effortless insights.
            </p>
        </div>
    </div>
</footer>

<!-- Custom Date Range Modal -->
<div class="modal fade" id="dateRangeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-calendar-alt me-2" style="color: var(--primary-color);"></i>Select Date Range
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="startDate" class="form-label">Start Date</label>
                        <input type="date" id="startDate" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="endDate" class="form-label">End Date</label>
                        <input type="date" id="endDate" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="applyCustomDateRange()">Apply Filter</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>

<script>
    class LogFilesManager {
        constructor() {
            this.init();
        }

        init() {
            this.bindEvents();
            this.setupRealtimeSearch();
        }

        bindEvents() {
            document.getElementById('searchLogFiles').addEventListener('input', () => this.performSearch());
            document.getElementById('dateFilter').addEventListener('change', () => this.handleDateFilter());
            document.addEventListener('click', (e) => this.closeExportMenus(e));
            document.addEventListener('keydown', (e) => this.handleKeyboard(e));
        }

        setupRealtimeSearch() {
            let timeout;
            document.getElementById('searchLogFiles').addEventListener('input', () => {
                clearTimeout(timeout);
                timeout = setTimeout(() => this.performSearch(), 300);
            });
        }

        performSearch() {
            const searchTerm = document.getElementById('searchLogFiles').value.toLowerCase();
            const dateFilter = document.getElementById('dateFilter').value;
            const logCards = document.querySelectorAll('.log-card');
            let visibleCount = 0;

            logCards.forEach(card => {
                const searchText = card.dataset.searchText;
                const logDate = card.dataset.logDate;

                let showCard = true;

                if (searchTerm && !searchText.includes(searchTerm)) {
                    showCard = false;
                }

                if (!this.passesDateFilter(logDate, dateFilter)) {
                    showCard = false;
                }

                if (showCard) {
                    card.style.display = 'grid';
                    card.style.animation = 'fadeIn 0.3s ease-in-out';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            this.updateFileCount(visibleCount);
            this.toggleEmptyState(visibleCount === 0);
        }

        passesDateFilter(logFileName, filter) {
            if (filter === 'all') return true;

            const match = logFileName.match(/laravel-(\d{4})-(\d{2})-(\d{2})\.log/);
            if (!match) return true;

            const fileDate = new Date(`${match[1]}-${match[2]}-${match[3]}`);
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            switch (filter) {
                case 'today':
                    return fileDate.toDateString() === today.toDateString();
                case 'last7':
                    const last7Days = new Date(today);
                    last7Days.setDate(today.getDate() - 7);
                    return fileDate >= last7Days;
                case 'last30':
                    const last30Days = new Date(today);
                    last30Days.setDate(today.getDate() - 30);
                    return fileDate >= last30Days;
                case 'custom':
                    const startDate = document.getElementById('startDate').value;
                    const endDate = document.getElementById('endDate').value;
                    if (!startDate || !endDate) return true;
                    return fileDate >= new Date(startDate) && fileDate <= new Date(endDate);
                default:
                    return true;
            }
        }

        handleDateFilter() {
            const dateFilter = document.getElementById('dateFilter').value;

            if (dateFilter === 'custom') {
                const modal = new bootstrap.Modal(document.getElementById('dateRangeModal'));
                modal.show();
            } else {
                this.performSearch();
            }
        }

        updateFileCount(count) {
            const badge = document.getElementById('fileCountBadge');
            badge.textContent = `${count} ${count === 1 ? 'file' : 'files'}`;
            badge.style.animation = 'pulse 0.3s ease-in-out';
        }

        toggleEmptyState(show) {
            const grid = document.getElementById('logsGrid');
            let emptyState = grid.querySelector('.empty-state:not(.original-empty)');

            if (show && !emptyState) {
                emptyState = document.createElement('div');
                emptyState.className = 'empty-state search-empty';
                emptyState.innerHTML = `
                    <i class="fas fa-search"></i>
                    <h3>No Files Found</h3>
                    <p>Try adjusting your search criteria.</p>
                `;
                grid.appendChild(emptyState);
            } else if (!show && emptyState) {
                emptyState.remove();
            }
        }

        closeExportMenus(event) {
            if (!event.target.closest('.export-dropdown')) {
                document.querySelectorAll('.export-menu').forEach(menu => {
                    menu.classList.remove('show');
                });
                document.querySelectorAll('.log-card').forEach(card => card.classList.remove('active-dropdown'));
            }
        }

        handleKeyboard(event) {
            if ((event.ctrlKey || event.metaKey) && event.key === 'f') {
                event.preventDefault();
                document.getElementById('searchLogFiles').focus();
            }

            if (event.key === 'Escape') {
                document.getElementById('searchLogFiles').value = '';
                this.performSearch();
            }
        }

        showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.className = `alert alert-${type} position-fixed`;
            notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
            notification.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
                ${message}
            `;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.style.animation = 'slideOutRight 0.3s ease-in-out forwards';
                setTimeout(() => notification.remove(), 300);
            }, 4000);
        }
    }

    // Global functions
    function toggleExportMenu(button) {
        const menu = button.nextElementSibling;
        const card = button.closest('.log-card');
        const isOpen = menu.classList.contains('show');

        // Close all other export menus
        document.querySelectorAll('.export-menu').forEach(m => m.classList.remove('show'));
        document.querySelectorAll('.log-card').forEach(c => c.classList.remove('active-dropdown'));

        if (!isOpen) {
            menu.classList.add('show');
            card.classList.add('active-dropdown');

            setTimeout(() => {
                const rect = menu.getBoundingClientRect();
                const windowWidth = window.innerWidth;

                if (rect.right > windowWidth - 10) {
                    menu.style.right = '0';
                    menu.style.left = 'auto';
                }

                if (rect.bottom > window.innerHeight - 20) {
                    menu.style.top = 'auto';
                    menu.style.bottom = '100%';
                    menu.style.marginTop = '0';
                    menu.style.marginBottom = '5px';
                }
            }, 10);
        }
    }

    function applyFilters() {
        logManager.performSearch();
    }

    function applyCustomDateRange() {
        const modal = bootstrap.Modal.getInstance(document.getElementById('dateRangeModal'));
        modal.hide();
        logManager.performSearch();
    }

    function confirmDelete(button, fileName) {
        if (confirm(`Are you sure you want to delete "${fileName}"?\n\nThis action cannot be undone.`)) {
            const icon = button.querySelector('i');
            if (icon) {
                icon.className = 'fas fa-spinner fa-spin';
            }
            button.disabled = true;

            const form = button.closest('form');
            form.submit();
        }
    }

    function showDeleteDisabled() {
        alert('File deletion is disabled. Please check your configuration to enable this feature.');
    }

    // Initialize
    let logManager;
    document.addEventListener('DOMContentLoaded', function() {
        logManager = new LogFilesManager();

        document.querySelectorAll('.export-menu a').forEach(link => {
            link.addEventListener('click', function() {
                const icon = this.querySelector('i');
                const originalClass = icon.className;
                icon.className = 'fas fa-spinner fa-spin';

                setTimeout(() => {
                    icon.className = originalClass;
                }, 2000);
            });
        });
    });
</script>
</body>
</html>
