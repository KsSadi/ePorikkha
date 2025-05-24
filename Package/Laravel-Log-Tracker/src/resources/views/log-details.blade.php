@extends('log-tracker::layouts.app')

@section('content')
    @push('styles')
        <style>
            :root {
                --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
                --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
                --danger-gradient: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
                --dark-gradient: linear-gradient(135deg, #2d3748 0%, #1a202c 100%);
                --shadow-soft: 0 10px 25px rgba(0,0,0,0.08);
                --shadow-hover: 0 15px 35px rgba(0,0,0,0.15);
                --border-radius: 15px;
                --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            body {
                background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
                min-height: 100vh;
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', system-ui, sans-serif;
            }

            /* Modern Breadcrumb */
            .breadcrumb-container {
                background: rgba(255,255,255,0.9);
                backdrop-filter: blur(10px);
                border-radius: 50px;
                padding: 0.75rem 1.5rem;
                margin-bottom: 2rem;
                border: 1px solid rgba(255,255,255,0.2);
                box-shadow: var(--shadow-soft);
            }

            .breadcrumb {
                margin-bottom: 0;
                background: none;
                padding: 0;
            }

            .breadcrumb-item a {
                color: #667eea;
                text-decoration: none;
                font-weight: 500;
                transition: var(--transition);
            }

            .breadcrumb-item a:hover {
                color: #4f46e5;
            }

            .breadcrumb-item.active {
                color: #2d3748;
                font-weight: 600;
            }

            /* Enhanced Header */
            .page-header {
                background: var(--primary-gradient);
                border-radius: var(--border-radius);
                padding: 2rem;
                margin-bottom: 2rem;
                box-shadow: var(--shadow-soft);
                color: white;
                position: relative;
                overflow: hidden;
            }

            .page-header::before {
                content: '';
                position: absolute;
                top: -30%;
                right: -15%;
                width: 150px;
                height: 150px;
                background: rgba(255,255,255,0.1);
                border-radius: 50%;
                animation: float 6s ease-in-out infinite;
            }

            @keyframes float {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(-20px) rotate(180deg); }
            }

            .header-title {
                font-size: 1.75rem;
                font-weight: 700;
                margin-bottom: 0.5rem;
                display: flex;
                align-items: center;
                gap: 0.75rem;
            }

            .header-subtitle {
                opacity: 0.9;
                font-size: 1rem;
                margin-bottom: 0;
            }

            .header-actions {
                display: flex;
                gap: 0.75rem;
                flex-wrap: wrap;
            }

            .action-btn {
                background: rgba(255,255,255,0.2);
                border: 2px solid rgba(255,255,255,0.3);
                color: white;
                padding: 0.75rem 1.5rem;
                border-radius: 50px;
                font-weight: 600;
                text-decoration: none;
                transition: var(--transition);
                display: flex;
                align-items: center;
                gap: 0.5rem;
                backdrop-filter: blur(10px);
            }

            .action-btn:hover {
                background: rgba(255,255,255,0.3);
                border-color: rgba(255,255,255,0.5);
                color: white;
                transform: translateY(-2px);
                box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            }

            .action-btn.danger:hover {
                background: #dc3545;
                border-color: #dc3545;
            }

            /* Main Layout */
            .main-layout {
                display: grid;
                grid-template-columns: 350px 1fr;
                gap: 2rem;
                margin-bottom: 2rem;
            }

            /* Sidebar Styling */
            .sidebar {
                display: flex;
                flex-direction: column;
                gap: 1.5rem;
                position: sticky;
                top: 2rem;
                height: fit-content;
            }

            .stats-card {
                background: white;
                border-radius: var(--border-radius);
                padding: 0;
                box-shadow: var(--shadow-soft);
                overflow: hidden;
                border: 1px solid rgba(255,255,255,0.8);
            }

            .stats-header {
                background: var(--success-gradient);
                color: white;
                padding: 1.5rem;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .stats-header h5 {
                margin: 0;
                font-weight: 600;
            }

            .stats-body {
                padding: 2rem;
            }

            .stat-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 1rem 0;
                border-bottom: 1px solid #f1f5f9;
            }

            .stat-item:last-child {
                border-bottom: none;
                padding-bottom: 0;
            }

            .stat-label {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                color: #64748b;
                font-weight: 500;
            }

            .stat-value {
                font-weight: 700;
                color: #1e293b;
            }

            .stat-badge {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                padding: 0.5rem 1rem;
                border-radius: 20px;
                font-weight: 600;
                font-size: 0.9rem;
                min-width: 45px;
                text-align: center;
            }

            /* Filters Card */
            .filters-card {
                background: white;
                border-radius: var(--border-radius);
                box-shadow: var(--shadow-soft);
                overflow: hidden;
            }

            .filters-header {
                background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
                padding: 1.5rem;
                border-bottom: 1px solid #e2e8f0;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .filters-title {
                font-weight: 600;
                color: #1f2937;
                margin: 0;
            }

            .collapse-btn {
                background: none;
                border: 2px solid #e5e7eb;
                color: #6b7280;
                width: 35px;
                height: 35px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: var(--transition);
            }

            .collapse-btn:hover {
                border-color: #667eea;
                color: #667eea;
            }

            .filters-body {
                padding: 1.5rem;
            }

            .filter-section {
                margin-bottom: 1.5rem;
            }

            .filter-section:last-child {
                margin-bottom: 0;
            }

            .filter-label {
                font-weight: 600;
                color: #374151;
                margin-bottom: 1rem;
                display: block;
            }

            .level-switches {
                display: flex;
                flex-direction: column;
                gap: 0.75rem;
            }

            .level-switch {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 0.75rem;
                background: #f8fafc;
                border-radius: 10px;
                transition: var(--transition);
                cursor: pointer;
            }

            .level-switch:hover {
                background: #f1f5f9;
            }

            .level-switch.active {
                background: rgba(102, 126, 234, 0.1);
                border: 1px solid rgba(102, 126, 234, 0.3);
            }

            .level-info {
                display: flex;
                align-items: center;
                gap: 0.75rem;
            }

            .level-icon {
                width: 35px;
                height: 35px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 0.8rem;
            }

            .level-name {
                font-weight: 600;
                color: #374151;
            }

            .switch-toggle {
                position: relative;
                width: 50px;
                height: 25px;
                background: #cbd5e1;
                border-radius: 25px;
                transition: var(--transition);
                cursor: pointer;
            }

            .switch-toggle.active {
                background: #667eea;
            }

            .switch-toggle::after {
                content: '';
                position: absolute;
                top: 2px;
                left: 2px;
                width: 21px;
                height: 21px;
                background: white;
                border-radius: 50%;
                transition: var(--transition);
                box-shadow: 0 2px 4px rgba(0,0,0,0.2);
            }

            .switch-toggle.active::after {
                transform: translateX(25px);
            }

            .search-box {
                position: relative;
            }

            .search-input {
                width: 100%;
                padding: 0.75rem 1rem 0.75rem 2.5rem;
                border: 2px solid #e5e7eb;
                border-radius: 50px;
                font-size: 0.9rem;
                transition: var(--transition);
                background: #f9fafb;
            }

            .search-input:focus {
                outline: none;
                border-color: #667eea;
                background: white;
                box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            }

            .search-icon {
                position: absolute;
                left: 1rem;
                top: 50%;
                transform: translateY(-50%);
                color: #9ca3af;
            }

            /* Main Content */

            .content-card {
                background: white;
                border-radius: var(--border-radius);
                box-shadow: var(--shadow-soft);
                overflow: hidden;
                display: flex;
                flex-direction: column;
                height: calc(100vh - 100px);
            }


            .content-header {
                background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
                padding: 1.5rem 2rem;
                border-bottom: 1px solid #e2e8f0;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .content-title {
                font-size: 1.2rem;
                font-weight: 600;
                color: #1f2937;
                margin: 0;
            }

            .content-badge {
                background: var(--success-gradient);
                color: white;
                padding: 0.5rem 1rem;
                border-radius: 20px;
                font-weight: 600;
                font-size: 0.85rem;
            }

            .search-bar {
                padding: 1.5rem 2rem;
                background: #f8fafc;
                border-bottom: 1px solid #e2e8f0;
            }

            .search-bar-input {
                width: 100%;
                padding: 1rem 1.5rem 1rem 3rem;
                border: 2px solid #e5e7eb;
                border-radius: 50px;
                font-size: 1rem;
                transition: var(--transition);
                background: white;
                position: relative;
            }

            .search-bar-input:focus {
                outline: none;
                border-color: #667eea;
                box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            }

            .search-bar .search-icon {
                position: absolute;
                left: 3rem;
                top: 50%;
                transform: translateY(-50%);
                color: #9ca3af;
                font-size: 1.1rem;
            }

            /* Log Table */
            .log-container {
                position: relative;
                max-height: 70vh;
                overflow: auto;
                background: var(--dark-gradient);
            }

            .log-table {
                width: 100%;
                border-collapse: collapse;
            }

            .log-table th {
                background: rgba(255, 255, 255, 0.08);
                color: #cbd5e1;
                font-weight: 600;
                padding: 1rem 1.5rem;
                text-align: left;
                position: sticky;
                top: 0;
                z-index: 10;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                font-size: 0.85rem;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            .log-row {
                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
                transition: var(--transition);
            }

            .log-row:hover {
                background: rgba(255, 255, 255, 0.02);
            }

            .log-row td {
                padding: 1.25rem 1.5rem;
                vertical-align: middle;
                color: #e2e8f0;
            }

            .log-level-badge {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.5rem 1rem;
                border-radius: 20px;
                font-weight: 600;
                font-size: 0.75rem;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                color: white;
                min-width: 80px;
                justify-content: center;
            }

            .timestamp {
                color: #94a3b8;
                font-family: 'JetBrains Mono', 'Fira Code', monospace;
                font-size: 0.85rem;
                white-space: nowrap;
            }

            .log-message {
                font-family: 'JetBrains Mono', 'Fira Code', monospace;
                font-size: 0.9rem;
                line-height: 1.5;
                word-break: break-word;
                color: #f1f5f9;
            }

            .stack-btn {
                background: var(--success-gradient);
                border: none;
                color: white;
                padding: 0.5rem 1rem;
                border-radius: 20px;
                font-size: 0.75rem;
                font-weight: 600;
                cursor: pointer;
                transition: var(--transition);
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
            }

            .stack-btn:hover {
                transform: translateY(-1px);
                box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            }

            .stack-trace-row {
                background: #1e293b !important;
            }

            .stack-trace-row td {
                padding: 0 !important;
            }
            .stack-trace {
                background: #0f172a;
                margin: 1rem;
                padding: 1.5rem;
                border-radius: 10px;
                font-family: 'JetBrains Mono', 'Fira Code', monospace;
                font-size: 0.8rem;
                line-height: 1.6;
                color: #cbd5e1;
                white-space: pre-wrap; /* FIXED: Allow wrapping */
                word-break: break-word; /* FIXED: Break long words */
                overflow-x: hidden; /* FIXED: Prevent horizontal scroll */
                border: 1px solid rgba(255, 255, 255, 0.1);
                max-width: 100%; /* FIXED: Constrain width */
            }

            .no-data-row {
                text-align: center;
                padding: 3rem 2rem;
                color: #64748b;
                font-style: italic;
            }

            .no-data-icon {
                font-size: 3rem;
                margin-bottom: 1rem;
                opacity: 0.5;
            }

            /* Export Dropdown */
            .export-dropdown {
                position: relative;
                display: inline-block;
            }

            .export-btn {
                background: var(--warning-gradient);
                border: none;
                color: white;
                padding: 0.75rem 1.5rem;
                border-radius: 50px;
                font-weight: 600;
                cursor: pointer;
                transition: var(--transition);
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .export-btn:hover {
                transform: translateY(-2px);
                box-shadow: var(--shadow-hover);
            }

            .export-menu {
                position: absolute;
                top: 100%;
                right: 0;
                background: white;
                border-radius: 10px;
                box-shadow: 0 15px 35px rgba(0,0,0,0.2);
                padding: 0.75rem 0;
                min-width: 180px;
                z-index: 9999;
                opacity: 0;
                visibility: hidden;
                transform: translateY(-10px);
                transition: var(--transition);
                margin-top: 0.5rem;
            }

            .export-menu.show {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }

            .export-menu a {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                padding: 0.75rem 1.25rem;
                color: #374151;
                text-decoration: none;
                transition: var(--transition);
                font-weight: 500;
            }

            .export-menu a:hover {
                background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
                color: #1f2937;
            }

            .export-menu i {
                width: 16px;
                text-align: center;
            }

            /* Responsive Design */
            @media (max-width: 1200px) {
                .main-layout {
                    grid-template-columns: 320px 1fr;
                    gap: 1.5rem;
                }
            }

            @media (max-width: 1024px) {
                .main-layout {
                    grid-template-columns: 1fr;
                    gap: 1.5rem;
                }

                .sidebar {
                    position: static;
                    order: 2;
                }

                .content-card {
                    order: 1;
                }
            }

            @media (max-width: 768px) {
                .page-header {
                    padding: 1.5rem;
                }

                .header-title {
                    font-size: 1.5rem;
                }

                .header-actions {
                    width: 100%;
                    justify-content: center;
                    margin-top: 1rem;
                }

                .action-btn {
                    flex: 1;
                    justify-content: center;
                    min-width: 0;
                }

                .stats-body,
                .filters-body {
                    padding: 1rem;
                }

                .log-table th,
                .log-row td {
                    padding: 0.75rem;
                }

                .log-table th:nth-child(2),
                .log-row td:nth-child(2) {
                    display: none;
                }

                .log-message {
                    font-size: 0.8rem;
                }
            }

            @media (max-width: 480px) {
                .breadcrumb-container {
                    padding: 0.5rem 1rem;
                    border-radius: 25px;
                }

                .page-header {
                    padding: 1rem;
                }

                .header-actions {
                    flex-direction: column;
                    gap: 0.5rem;
                }

                .main-layout {
                    gap: 1rem;
                }
            }

            /* Custom Scrollbar */
            .log-container::-webkit-scrollbar {
                width: 8px;
            }

            .log-container::-webkit-scrollbar-track {
                background: rgba(255, 255, 255, 0.1);
            }

            .log-container::-webkit-scrollbar-thumb {
                background: rgba(255, 255, 255, 0.3);
                border-radius: 4px;
            }

            .log-container::-webkit-scrollbar-thumb:hover {
                background: rgba(255, 255, 255, 0.5);
            }

            /* Loading States */
            .loading {
                opacity: 0.6;
                pointer-events: none;
            }

            .spinner {
                display: inline-block;
                width: 16px;
                height: 16px;
                border: 2px solid rgba(255,255,255,0.3);
                border-radius: 50%;
                border-top-color: #ffffff;
                animation: spin 1s ease-in-out infinite;
            }

            @keyframes spin {
                to { transform: rotate(360deg); }
            }
        </style>
    @endpush

    <!-- Modern Breadcrumb -->
    <div class="breadcrumb-container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('log-tracker.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('log-tracker.index')}}">Log Files</a></li>
                <li class="breadcrumb-item active">{{ $logName }}</li>
            </ol>
        </nav>
    </div>

    <!-- Enhanced Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="header-title">
                    <i class="fas fa-file-code"></i>
                    {{ $logName }}
                </h1>
                <p class="header-subtitle">
                    Analyze and explore log entries with advanced filtering and export options
                </p>
            </div>
            <div class="col-lg-4">
                <div class="header-actions">
                    <a href="{{ url()->previous() }}" class="action-btn">
                        <i class="fas fa-arrow-left"></i>
                        <span>Back</span>
                    </a>

                    <a href="{{ route('log-tracker.download', ['logName' => $logName]) }}" class="action-btn">
                        <i class="fas fa-download"></i>
                        <span>Download</span>
                    </a>

                    <div class="export-dropdown">
                        <button class="export-btn" onclick="toggleExportMenu()">
                            <i class="fas fa-share-alt"></i>
                            <span>Export</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="export-menu" id="exportMenu">
                            <a href="{{ route('log-tracker.export.quick', [$logName, 'csv']) }}">
                                <i class="fas fa-table"></i>Export as CSV
                            </a>
                            <a href="{{ route('log-tracker.export.quick', [$logName, 'json']) }}">
                                <i class="fas fa-code"></i>Export as JSON
                            </a>
                            <a href="{{ route('log-tracker.export.quick', [$logName, 'excel']) }}">
                                <i class="fas fa-file-excel"></i>Export as Excel
                            </a>
                            <a href="{{ route('log-tracker.export.quick', [$logName, 'pdf']) }}">
                                <i class="fas fa-file-pdf"></i>Export as PDF
                            </a>
                        </div>
                    </div>

                    <form action="{{ route('log-tracker.delete', ['logName' => $logName]) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="action-btn danger" onclick="return confirm('Are you sure you want to delete this log file?')">
                            <i class="fas fa-trash"></i>
                            <span>Delete</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Layout -->
    <div class="main-layout">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Statistics Card -->
            <div class="stats-card">
                <div class="stats-header">
                    <i class="fas fa-chart-bar"></i>
                    <h5>Log Statistics</h5>
                </div>
                <div class="stats-body">
                    <div class="stat-item">
                        <div class="stat-label">
                            <i class="fas fa-list-ul"></i>
                            Total Entries
                        </div>
                        <div class="stat-badge">{{ number_format(count($entries)) }}</div>
                    </div>

                    <div class="stat-item">
                        <div class="stat-label">
                            <i class="fas fa-hdd"></i>
                            File Size
                        </div>
                        <div class="stat-value">{{ round(filesize(storage_path('logs/' . $logName)) / 1024, 2) }} KB</div>
                    </div>

                    @foreach($logLevels as $level => $config)
                        <div class="stat-item">
                            <div class="stat-label">
                                <i class="{{ $config['icon'] }}" style="color: {{ $config['color'] }};"></i>
                                {{ ucfirst($level) }} Logs
                            </div>
                            <div class="stat-badge" style="background-color: {{ $config['color'] }};">
                                {{ $counts[$level] ?? 0 }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Filters Card -->
            <div class="filters-card">
                <div class="filters-header">
                    <h5 class="filters-title">Smart Filters</h5>
                    <button class="collapse-btn" onclick="toggleFilters()">
                        <i class="fas fa-chevron-up" id="collapseIcon"></i>
                    </button>
                </div>
                <div class="filters-body" id="filtersBody">
                    <div class="filter-section">
                        <label class="filter-label">Log Levels</label>
                        <div class="level-switches">
                            @foreach($logLevels as $level => $config)
                                <div class="level-switch active" data-level="{{ $level }}" onclick="toggleLevel(this)">
                                    <div class="level-info">
                                        <div class="level-icon" style="background-color: {{ $config['color'] }};">
                                            <i class="{{ $config['icon'] }}"></i>
                                        </div>
                                        <span class="level-name">{{ ucfirst($level) }}</span>
                                    </div>
                                    <div class="switch-toggle active" data-level="{{ $level }}"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="filter-section">
                        <label class="filter-label">Search in Logs</label>
                        <div class="search-box">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" class="search-input" placeholder="Enter search term..." id="searchInput">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content-card">
            <div class="content-header">
                <h5 class="content-title">Log Entries</h5>
                <div class="content-badge" id="entriesCount">{{ number_format(count($entries)) }} entries</div>
            </div>

            <div class="search-bar">
                <div style="position: relative;">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" class="search-bar-input" placeholder="Search through log messages, timestamps, and more..." id="mainSearchInput">
                </div>
            </div>

            <div class="log-container">
                <table class="log-table">
                    <thead>
                    <tr>
                        <th style="width: 120px;">Level</th>
                        <th style="width: 180px;">Timestamp</th>
                        <th>Message</th>
                        <th style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="logTableBody">
                    @foreach ($entries as $index => $log)
                        <tr class="log-row" data-level="{{ strtolower($log['level']) }}" data-index="{{ $index }}">
                            <td>
                                <div class="log-level-badge" style="background-color: {{ $log['color'] }};">
                                    <i class="{{ $log['icon'] }}"></i>
                                    {{ strtoupper($log['level']) }}
                                </div>
                            </td>
                            <td>
                                <div class="timestamp">{{ $log['timestamp'] }}</div>
                            </td>
                            <td>
                                <div class="log-message">{{ $log['message'] }}</div>
                            </td>
                            <td>
                                @if (!empty($log['stack']))
                                    <button class="stack-btn" onclick="toggleStackTrace({{ $index }})">
                                        <i class="fas fa-code"></i>
                                        <span>Stack</span>
                                    </button>
                                @endif
                            </td>
                        </tr>
                        @if (!empty($log['stack']))
                            <tr id="stacktrace-{{ $index }}" class="stack-trace-row d-none">
                                <td colspan="4">
                                    <pre class="stack-trace">{{ $log['stack'] }}</pre>
                                </td>
                            </tr>
                        @endif
                    @endforeach

                    <!-- No Data Row -->
                    <tr id="noDataRow" class="no-data-row" style="display: none;">
                        <td colspan="4">
                            <div class="no-data-icon">
                                <i class="fas fa-search-minus"></i>
                            </div>
                            <h4>No matching logs found</h4>
                            <p>Try adjusting your search criteria or filters</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            class LogViewer {
                constructor() {
                    this.activeLevels = new Set();
                    this.init();
                }

                init() {
                    // Initialize all levels as active
                    document.querySelectorAll('[data-level]').forEach(element => {
                        const level = element.dataset.level;
                        this.activeLevels.add(level);
                    });

                    this.bindEvents();
                    this.hideNoDataRow();
                }

                bindEvents() {
                    // Search inputs
                    document.getElementById('searchInput').addEventListener('input', () => this.filterLogs());
                    document.getElementById('mainSearchInput').addEventListener('input', () => this.filterLogs());

                    // Close export menu when clicking outside
                    document.addEventListener('click', (e) => {
                        if (!e.target.closest('.export-dropdown')) {
                            document.getElementById('exportMenu').classList.remove('show');
                        }
                    });
                }

                toggleLevel(element) {
                    const level = element.dataset.level;
                    const toggle = element.querySelector('.switch-toggle');

                    if (this.activeLevels.has(level)) {
                        this.activeLevels.delete(level);
                        element.classList.remove('active');
                        toggle.classList.remove('active');
                    } else {
                        this.activeLevels.add(level);
                        element.classList.add('active');
                        toggle.classList.add('active');
                    }

                    this.filterLogs();
                }

                filterLogs() {
                    const searchTerm1 = document.getElementById('searchInput').value.toLowerCase();
                    const searchTerm2 = document.getElementById('mainSearchInput').value.toLowerCase();
                    const searchTerm = searchTerm1 || searchTerm2;

                    const logRows = document.querySelectorAll('.log-row');
                    let visibleCount = 0;

                    logRows.forEach(row => {
                        const level = row.dataset.level;
                        const text = row.textContent.toLowerCase();

                        const levelMatch = this.activeLevels.has(level);
                        const textMatch = !searchTerm || text.includes(searchTerm);

                        const shouldShow = levelMatch && textMatch;

                        if (shouldShow) {
                            row.style.display = '';
                            visibleCount++;

                            // Also show stack trace row if it exists and is expanded
                            const stackRow = document.getElementById(`stacktrace-${row.dataset.index}`);
                            if (stackRow && !stackRow.classList.contains('d-none')) {
                                stackRow.style.display = '';
                            }
                        } else {
                            row.style.display = 'none';

                            // Hide stack trace row
                            const stackRow = document.getElementById(`stacktrace-${row.dataset.index}`);
                            if (stackRow) {
                                stackRow.style.display = 'none';
                            }
                        }
                    });

                    this.updateEntriesCount(visibleCount);
                    this.toggleNoDataRow(visibleCount === 0);
                }

                updateEntriesCount(count) {
                    const badge = document.getElementById('entriesCount');
                    badge.textContent = `${count.toLocaleString()} ${count === 1 ? 'entry' : 'entries'}`;
                    badge.style.animation = 'pulse 0.3s ease-in-out';
                }

                toggleNoDataRow(show) {
                    const noDataRow = document.getElementById('noDataRow');
                    noDataRow.style.display = show ? '' : 'none';
                }

                hideNoDataRow() {
                    this.toggleNoDataRow(false);
                }

                showNotification(message, type = 'success') {
                    const notification = document.createElement('div');
                    notification.className = `alert alert-${type} position-fixed`;
                    notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; border-radius: 10px; box-shadow: 0 10px 25px rgba(0,0,0,0.2);';
                    notification.innerHTML = `
                        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
                        ${message}
                    `;

                    document.body.appendChild(notification);

                    setTimeout(() => {
                        notification.remove();
                    }, 4000);
                }
            }

            // Global functions
            function toggleStackTrace(index) {
                const stackRow = document.getElementById(`stacktrace-${index}`);
                stackRow.classList.toggle('d-none');
            }

            function toggleLevel(element) {
                logViewer.toggleLevel(element);
            }

            function toggleFilters() {
                const body = document.getElementById('filtersBody');
                const icon = document.getElementById('collapseIcon');

                if (body.style.display === 'none') {
                    body.style.display = 'block';
                    icon.className = 'fas fa-chevron-up';
                } else {
                    body.style.display = 'none';
                    icon.className = 'fas fa-chevron-down';
                }
            }

            function toggleExportMenu() {
                const menu = document.getElementById('exportMenu');
                menu.classList.toggle('show');
            }

            // Initialize
            let logViewer;
            document.addEventListener('DOMContentLoaded', function() {
                logViewer = new LogViewer();

                // Add loading states to export links
                document.querySelectorAll('.export-menu a').forEach(link => {
                    link.addEventListener('click', function(e) {
                        const icon = this.querySelector('i');
                        const originalClass = icon.className;
                        icon.className = 'fas fa-spinner fa-spin';

                        setTimeout(() => {
                            icon.className = originalClass;
                        }, 2000);

                        logViewer.showNotification('Export started! Download will begin shortly.', 'success');
                    });
                });

                // Keyboard shortcuts
                document.addEventListener('keydown', function(e) {
                    // Ctrl/Cmd + F to focus search
                    if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
                        e.preventDefault();
                        document.getElementById('mainSearchInput').focus();
                    }

                    // Escape to clear search
                    if (e.key === 'Escape') {
                        document.getElementById('searchInput').value = '';
                        document.getElementById('mainSearchInput').value = '';
                        logViewer.filterLogs();
                    }
                });
            });

            // Add CSS animations
            const style = document.createElement('style');
            style.textContent = `
                @keyframes pulse {
                    0%, 100% { transform: scale(1); }
                    50% { transform: scale(1.05); }
                }
            `;
            document.head.appendChild(style);
        </script>
    @endpush
@endsection
