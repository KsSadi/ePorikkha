<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ePorikkha - Professional Dashboard</title>

    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ePorikkha Dashboard Master Stylesheet */
        /* dashboard-master.css - Global stylesheet for all dashboard pages */

        :root {
            /* Color Palette - Professional */
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --primary-light: #818cf8;
            --primary-bg: rgba(79, 70, 229, 0.08);
            --secondary: #8b5cf6;
            --secondary-dark: #7c3aed;
            --secondary-light: #a78bfa;
            --secondary-bg: rgba(139, 92, 246, 0.08);
            --accent: #f97316;
            --success: #10b981;
            --success-bg: rgba(16, 185, 129, 0.08);
            --warning: #f59e0b;
            --warning-bg: rgba(245, 158, 11, 0.08);
            --danger: #ef4444;
            --danger-bg: rgba(239, 68, 68, 0.08);
            --info: #3b82f6;
            --info-bg: rgba(59, 130, 246, 0.08);
            --dark: #111827;
            --dark-50: rgba(17, 24, 39, 0.5);
            --dark-25: rgba(17, 24, 39, 0.25);
            --light: #f9fafb;
            --body-bg: #f3f4f6;
            --card-bg: #ffffff;
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

            /* Layout */
            --header-height: 70px;
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 80px;
            --border-radius-sm: 0.375rem;
            --border-radius: 0.5rem;
            --border-radius-lg: 0.75rem;
            --border-radius-xl: 1rem;
            --border-radius-2xl: 1.5rem;

            /* Shadows */
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);

            /* Transitions */
            --transition-normal: all 0.3s ease;
            --transition-fast: all 0.15s ease;
        }

        /* Base Styles */
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--body-bg);
            color: var(--gray-700);
            overflow-x: hidden;
            line-height: 1.6;
            position: relative;
            min-height: 100vh;
        }

        /* Typography */
        h1, h2, h3, h4, h5, h6 {
            color: var(--gray-900);
            font-weight: 700;
            line-height: 1.2;
        }

        p {
            color: var(--gray-600);
        }

        a {
            color: var(--primary);
            text-decoration: none;
            transition: var(--transition-normal);
        }

        a:hover {
            color: var(--primary-dark);
        }

        /* Utilities */
        .text-primary { color: var(--primary) !important; }
        .text-secondary { color: var(--secondary) !important; }
        .text-success { color: var(--success) !important; }
        .text-warning { color: var(--warning) !important; }
        .text-danger { color: var(--danger) !important; }
        .text-info { color: var(--info) !important; }
        .text-dark { color: var(--dark) !important; }
        .text-muted { color: var(--gray-500) !important; }

        .bg-primary { background-color: var(--primary) !important; }
        .bg-secondary { background-color: var(--secondary) !important; }
        .bg-success { background-color: var(--success) !important; }
        .bg-warning { background-color: var(--warning) !important; }
        .bg-danger { background-color: var(--danger) !important; }
        .bg-info { background-color: var(--info) !important; }
        .bg-dark { background-color: var(--dark) !important; }

        .bg-primary-light { background-color: var(--primary-bg) !important; }
        .bg-secondary-light { background-color: var(--secondary-bg) !important; }
        .bg-success-light { background-color: var(--success-bg) !important; }
        .bg-warning-light { background-color: var(--warning-bg) !important; }
        .bg-danger-light { background-color: var(--danger-bg) !important; }
        .bg-info-light { background-color: var(--info-bg) !important; }

        .bg-gradient-primary {
            background: linear-gradient(145deg, var(--primary) 0%, var(--primary-dark) 100%);
        }

        .bg-gradient-secondary {
            background: linear-gradient(145deg, var(--secondary) 0%, var(--secondary-dark) 100%);
        }

        .bg-gradient-primary-secondary {
            background: linear-gradient(145deg, var(--primary) 0%, var(--secondary) 100%);
        }

        .border-primary { border-color: var(--primary) !important; }
        .border-secondary { border-color: var(--secondary) !important; }
        .border-success { border-color: var(--success) !important; }
        .border-warning { border-color: var(--warning) !important; }
        .border-danger { border-color: var(--danger) !important; }

        .rounded-sm { border-radius: var(--border-radius-sm) !important; }
        .rounded-md { border-radius: var(--border-radius) !important; }
        .rounded-lg { border-radius: var(--border-radius-lg) !important; }
        .rounded-xl { border-radius: var(--border-radius-xl) !important; }
        .rounded-2xl { border-radius: var(--border-radius-2xl) !important; }

        .shadow-hover {
            transition: var(--transition-normal);
        }

        .shadow-hover:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-3px);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulseEffect {
            0% { box-shadow: 0 0 0 0 rgba(79, 70, 229, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(79, 70, 229, 0); }
            100% { box-shadow: 0 0 0 0 rgba(79, 70, 229, 0); }
        }

        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.7; }
            100% { opacity: 1; }
        }

        @keyframes shine {
            0% { transform: translateX(-100%); }
            20%, 100% { transform: translateX(100%); }
        }

        @keyframes progressShine {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        /* Navbar Styles */
        .navbar {
            padding: 0.75rem 1.5rem;
            background-color: white;
            box-shadow: var(--shadow);
            position: fixed;
            top: 0;
            right: 0;
            left: var(--sidebar-width);
            z-index: 1000;
            height: var(--header-height);
            transition: var(--transition-normal);
        }

        .navbar-compact {
            left: var(--sidebar-collapsed-width);
        }

        .navbar-full {
            left: 0;
        }

        .navbar-search {
            position: relative;
            width: 320px;
        }

        .navbar-search .search-input {
            width: 100%;
            padding: 0.65rem 1rem 0.65rem 2.75rem;
            border-radius: var(--border-radius-lg);
            border: 1px solid var(--gray-200);
            background-color: var(--gray-50);
            font-size: 0.925rem;
            transition: var(--transition-normal);
            color: var(--gray-700);
        }

        .navbar-search .search-input:focus {
            background-color: white;
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
            outline: none;
        }

        .navbar-search .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-500);
            font-size: 0.9rem;
        }

        .navbar-actions {
            display: flex;
            align-items: center;
        }

        .navbar-action {
            width: 42px;
            height: 42px;
            border-radius: var(--border-radius-lg);
            background-color: var(--gray-50);
            color: var(--gray-700);
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            margin-left: 0.75rem;
            position: relative;
            transition: var(--transition-normal);
            border: none;
        }

        .navbar-action:hover {
            background-color: var(--primary-bg);
            color: var(--primary);
            transform: translateY(-2px);
        }

        .navbar-action .badge {
            position: absolute;
            top: -5px;
            right: -5px;
            height: 20px;
            min-width: 20px;
            padding: 0 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.65rem;
            font-weight: 700;
            border-radius: 10px;
            background-color: var(--danger);
            color: white;
            box-shadow: var(--shadow-sm);
        }

        .navbar-action.has-notification {
            animation: pulseEffect 2s infinite;
        }

        .user-dropdown {
            display: flex;
            align-items: center;
            margin-left: 1.25rem;
            cursor: pointer;
            padding: 0.35rem;
            border-radius: var(--border-radius-lg);
            transition: var(--transition-normal);
            border: 1px solid var(--gray-100);
        }

        .user-dropdown:hover {
            background-color: var(--gray-50);
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: var(--border-radius);
            overflow: hidden;
            margin-right: 0.75rem;
            position: relative;
        }

        .user-avatar::after {
            content: '';
            position: absolute;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: var(--success);
            bottom: 2px;
            right: 2px;
            border: 1.5px solid white;
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-info {
            line-height: 1.2;
        }

        .user-name {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--gray-800);
        }

        .user-role {
            font-size: 0.75rem;
            color: var(--gray-500);
        }

        .dropdown-toggle {
            display: flex;
            align-items: center;
            color: var(--gray-600);
            margin-left: 0.5rem;
        }

        .toggle-sidebar-btn {
            border: none;
            padding: 0;
            width: 42px;
            height: 42px;
            border-radius: var(--border-radius-lg);
            background-color: var(--gray-50);
            color: var(--gray-700);
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition-normal);
            margin-right: 1rem;
        }

        .toggle-sidebar-btn:hover {
            background-color: var(--primary-bg);
            color: var(--primary);
        }

        .toggle-sidebar-btn:focus {
            outline: none;
            box-shadow: none;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background-color: white;
            box-shadow: var(--shadow);
            z-index: 1010;
            transition: var(--transition-normal);
            overflow-y: auto;
            overflow-x: hidden;
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background-color: var(--gray-100);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background-color: var(--gray-300);
            border-radius: 10px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background-color: var(--gray-400);
        }

        .sidebar-header {
            padding: 0.75rem 1.5rem;
            height: var(--header-height);
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--gray-100);
        }

        .sidebar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            letter-spacing: -0.5px;
            text-decoration: none;
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
        }

        .sidebar-brand span:first-child {
            color: var(--primary);
        }

        .sidebar-brand span:last-child {
            color: var(--secondary);
            position: relative;
        }

        .sidebar-brand span:last-child::after {
            content: '';
            position: absolute;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: var(--accent);
            bottom: 5px;
            right: -8px;
        }

        .sidebar-close {
            width: 32px;
            height: 32px;
            border-radius: var(--border-radius);
            background-color: var(--gray-100);
            color: var(--gray-600);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition-normal);
            border: none;
        }

        .sidebar-close:hover {
            background-color: var(--primary-bg);
            color: var(--primary);
        }

        .sidebar-profile {
            padding: 1.5rem;
            display: flex;
            align-items: center;
            transition: var(--transition-normal);
            border-bottom: 1px solid var(--gray-100);
        }

        .sidebar-profile-avatar {
            width: 50px;
            height: 50px;
            border-radius: var(--border-radius);
            overflow: hidden;
            position: relative;
            flex-shrink: 0;
        }

        .sidebar-profile-avatar::after {
            content: '';
            position: absolute;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: var(--success);
            bottom: 2px;
            right: 2px;
            border: 2px solid white;
        }

        .sidebar-profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .sidebar-profile-info {
            margin-left: 1rem;
            transition: var(--transition-normal);
            opacity: 1;
            white-space: nowrap;
        }

        .collapsed .sidebar-profile-info {
            opacity: 0;
            width: 0;
            margin-left: 0;
        }

        .sidebar-profile-name {
            font-weight: 600;
            color: var(--gray-900);
            font-size: 1rem;
            margin-bottom: 0.25rem;
        }

        .sidebar-profile-role {
            color: var(--gray-600);
            font-size: 0.85rem;
        }

        .sidebar-menu {
            padding: 1.25rem 0;
        }

        .sidebar-menu-title {
            color: var(--gray-400);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0 1.5rem;
            margin-bottom: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: var(--transition-normal);
            white-space: nowrap;
        }

        .collapsed .sidebar-menu-title {
            opacity: 0;
        }

        .sidebar-item {
            margin-bottom: 0.25rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            color: var(--gray-700);
            transition: var(--transition-normal);
            position: relative;
            font-weight: 500;
        }

        .sidebar-link:hover {
            color: var(--primary);
            background-color: var(--primary-bg);
        }

        .sidebar-link.active {
            color: var(--primary);
            background-color: var(--primary-bg);
            font-weight: 600;
        }

        .sidebar-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background-color: var(--primary);
            border-radius: 0 4px 4px 0;
        }

        .sidebar-icon {
            width: 22px;
            text-align: center;
            margin-right: 1rem;
            font-size: 1.1rem;
            transition: var(--transition-normal);
        }

        .collapsed .sidebar-icon {
            margin-right: 0;
            font-size: 1.25rem;
        }

        .sidebar-text {
            transition: var(--transition-normal);
            opacity: 1;
            white-space: nowrap;
        }

        .collapsed .sidebar-text {
            opacity: 0;
            width: 0;
        }

        .sidebar-badge {
            margin-left: auto;
            font-size: 0.75rem;
            font-weight: 600;
            background-color: var(--danger-bg);
            color: var(--danger);
            padding: 0.15rem 0.5rem;
            border-radius: 10px;
            transition: var(--transition-normal);
        }

        .collapsed .sidebar-badge {
            opacity: 0;
            width: 0;
            margin-left: 0;
        }

        .sidebar-divider {
            height: 1px;
            background-color: var(--gray-100);
            margin: 1.25rem 1.5rem;
        }

        /* Main Content Styles */
        .main-content {
            transition: var(--transition-normal);
            margin-left: var(--sidebar-width);
            padding-top: var(--header-height);
            min-height: 100vh;
            background-color: var(--body-bg);
        }

        .main-content.sidebar-collapsed {
            margin-left: var(--sidebar-collapsed-width);
        }

        .main-content.full-width {
            margin-left: 0;
        }

        .dashboard-container {
            padding: 2rem 2rem;
        }

        .page-header {
            margin-bottom: 2rem;
            animation: fadeIn 0.6s ease;
        }

        .welcome-message {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
            position: relative;
            display: inline-block;
        }

        .welcome-message::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 40%;
            height: 3px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
            border-radius: 10px;
        }

        .welcome-subtitle {
            font-size: 1rem;
            color: var(--gray-600);
        }

        /* Cards */
        .card-dashboard {
            background-color: var(--card-bg);
            border-radius: var(--border-radius-xl);
            box-shadow: var(--shadow);
            border: none;
            margin-bottom: 1.75rem;
            overflow: hidden;
            transition: var(--transition-normal);
        }

        .card-dashboard:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-3px);
        }

        .card-header {
            padding: 1.5rem 1.75rem;
            background-color: var(--card-bg);
            border-bottom: 1px solid var(--gray-100);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0;
            position: relative;
            padding-left: 1rem;
        }

        .card-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 18px;
            background: linear-gradient(180deg, var(--primary) 0%, var(--secondary) 100%);
            border-radius: 2px;
        }

        .card-tools {
            display: flex;
            align-items: center;
        }

        .card-tool {
            width: 34px;
            height: 34px;
            border-radius: var(--border-radius);
            background-color: white;
            border: 1px solid var(--gray-100);
            color: var(--gray-700);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            margin-left: 0.5rem;
            transition: var(--transition-normal);
        }

        .card-tool:hover {
            background-color: var(--primary-bg);
            color: var(--primary);
            border-color: transparent;
            transform: translateY(-2px);
        }

        .card-body {
            padding: 1.75rem;
        }

        /* Animation for cards */
        .animate-cards .col-md-3:nth-child(1) .stat-card { animation: fadeIn 0.3s ease; }
        .animate-cards .col-md-3:nth-child(2) .stat-card { animation: fadeIn 0.4s ease; }
        .animate-cards .col-md-3:nth-child(3) .stat-card { animation: fadeIn 0.5s ease; }
        .animate-cards .col-md-3:nth-child(4) .stat-card { animation: fadeIn 0.6s ease; }

        /* Exam Items */
        .exam-item {
            display: flex;
            align-items: center;
            padding: 1.5rem;
            border-radius: var(--border-radius-xl);
            background-color: white;
            border: 1px solid var(--gray-100);
            margin-bottom: 1.25rem;
            transition: var(--transition-normal);
            position: relative;
            overflow: hidden;
        }

        .exam-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(180deg, var(--primary) 0%, var(--secondary) 100%);
            opacity: 0;
            transition: var(--transition-normal);
        }

        .exam-item:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-3px);
            border-color: var(--gray-200);
        }

        .exam-item:hover::before {
            opacity: 1;
        }

        .exam-item:last-child {
            margin-bottom: 0;
        }

        .exam-icon {
            width: 54px;
            height: 54px;
            border-radius: var(--border-radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: white;
            margin-right: 1.25rem;
            flex-shrink: 0;
            box-shadow: var(--shadow-sm);
            position: relative;
            overflow: hidden;
        }

        .exam-icon::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: linear-gradient(120deg, rgba(255,255,255,0) 30%, rgba(255,255,255,0.4) 38%, rgba(255,255,255,0) 48%);
            animation: shine 3s infinite linear;
            transform: translateX(-100%);
        }

        .exam-content {
            flex-grow: 1;
        }

        .exam-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 0.35rem;
            transition: var(--transition-normal);
        }

        .exam-item:hover .exam-title {
            color: var(--primary);
        }

        .exam-info {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            font-size: 0.85rem;
            color: var(--gray-600);
            margin-bottom: 0;
        }

        .exam-info span {
            display: flex;
            align-items: center;
            margin-right: 1.25rem;
            margin-bottom: 0.25rem;
            padding: 0.25rem 0;
        }

        .exam-info i {
            margin-right: 0.5rem;
            font-size: 0.9rem;
            color: var(--gray-500);
        }

        .exam-actions {
            display: flex;
            align-items: center;
            margin-left: 1rem;
        }

        .btn-primary, .btn-secondary {
            padding: 0.65rem 1.5rem;
            font-weight: 600;
            border-radius: var(--border-radius-lg);
            transition: var(--transition-normal);
            letter-spacing: 0.2px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-sm);
        }

        .btn-primary {
            background: linear-gradient(145deg, var(--primary) 0%, var(--primary-dark) 100%);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(145deg, var(--primary-dark) 0%, var(--primary) 100%);
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(79, 70, 229, 0.2);
        }

        .btn-secondary {
            background: linear-gradient(145deg, var(--secondary) 0%, var(--secondary-dark) 100%);
            border: none;
        }

        .btn-secondary:hover {
            background: linear-gradient(145deg, var(--secondary-dark) 0%, var(--secondary) 100%);
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(124, 58, 237, 0.2);
        }

        .btn-outline-primary {
            color: var(--primary);
            border: 1.5px solid var(--primary-light);
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            border-radius: var(--border-radius-lg);
            transition: var(--transition-normal);
            background-color: transparent;
            letter-spacing: 0.2px;
        }

        .btn-outline-primary:hover {
            background: linear-gradient(145deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(79, 70, 229, 0.2);
            border-color: transparent;
        }

        .btn-sm {
            padding: 0.45rem 1rem;
            font-size: 0.85rem;
        }

        .btn i {
            margin-right: 0.5rem;
            font-size: 0.9em;
        }

        /* Status Badges - FIXED DESIGN */
        .status-badge {
            padding: 0.4rem 1.2rem;
            border-radius: 50rem;
            font-size: 0.75rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            margin-left: 0.75rem;
            box-shadow: var(--shadow-sm);
            letter-spacing: 0.3px;
            text-transform: uppercase;
            position: relative;
            overflow: hidden;
            border: 1px solid transparent;
        }

        .status-badge::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: var(--transition-normal);
        }

        .status-badge:hover::before {
            left: 100%;
        }

        .status-badge.available {
            background: linear-gradient(135deg, var(--success) 0%, #059669 100%);
            color: white;
            border-color: var(--success);
        }

        .status-badge.scheduled {
            background: linear-gradient(135deg, var(--warning) 0%, #d97706 100%);
            color: white;
            border-color: var(--warning);
        }

        .status-badge.completed {
            background: linear-gradient(135deg, var(--gray-600) 0%, var(--gray-700) 100%);
            color: white;
            border-color: var(--gray-600);
        }

        .status-badge.in-progress {
            background: linear-gradient(135deg, var(--danger) 0%, #dc2626 100%);
            color: white;
            border-color: var(--danger);
            animation: pulse 1.5s infinite;
        }

        .status-badge.expired {
            background: linear-gradient(135deg, var(--gray-400) 0%, var(--gray-500) 100%);
            color: white;
            border-color: var(--gray-400);
        }

        .status-badge i {
            margin-right: 0.4rem;
            font-size: 0.8rem;
        }

        /* Results Card */
        .result-item {
            margin-bottom: 1.75rem;
            padding-bottom: 1.75rem;
            border-bottom: 1px solid var(--gray-100);
            transition: var(--transition-normal);
        }

        .result-item:hover {
            transform: translateX(5px);
        }

        .result-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .result-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0.75rem;
        }

        .result-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 0;
            transition: var(--transition-normal);
        }

        .result-item:hover .result-title {
            color: var(--primary);
        }

        .result-score {
            font-size: 1.1rem;
            font-weight: 800;
            margin-bottom: 0;
            background: linear-gradient(145deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
        }

        .result-info {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            font-size: 0.85rem;
            color: var(--gray-600);
            margin-bottom: 0.75rem;
        }

        .result-info span {
            display: flex;
            align-items: center;
            margin-right: 1.25rem;
            margin-bottom: 0.25rem;
            padding: 0.25rem 0;
        }

        .result-info i {
            margin-right: 0.5rem;
            font-size: 0.9rem;
            color: var(--gray-500);
        }

        .result-progress {
            margin-top: 0.75rem;
        }

        .progress {
            height: 8px;
            border-radius: 1rem;
            background-color: var(--gray-100);
            margin-bottom: 0.5rem;
            overflow: hidden;
        }

        .progress-bar {
            background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
            border-radius: 1rem;
            position: relative;
            overflow: hidden;
        }

        .progress-bar::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.3) 50%, rgba(255,255,255,0) 100%);
            animation: progressShine 2s infinite linear;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            font-size: 0.8rem;
            color: var(--gray-600);
        }

        .progress-info .score-label {
            font-weight: 600;
            color: var(--gray-700);
        }

        .progress-info .score-value {
            font-weight: 700;
            color: var(--primary);
        }

        /* Notification List - FIXED TIME BADGES */
        .notification-item {
            display: flex;
            padding: 1.25rem 0;
            border-bottom: 1px solid var(--gray-100);
            transition: var(--transition-normal);
        }

        .notification-item:hover {
            transform: translateX(5px);
        }

        .notification-item:first-child {
            padding-top: 0;
        }

        .notification-item:last-child {
            padding-bottom: 0;
            border-bottom: none;
        }

        .notification-icon {
            width: 42px;
            height: 42px;
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            color: white;
            margin-right: 1rem;
            flex-shrink: 0;
            box-shadow: var(--shadow-sm);
        }

        .notification-content {
            flex-grow: 1;
        }

        .notification-title {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 0.35rem;
            transition: var(--transition-normal);
        }

        .notification-item:hover .notification-title {
            color: var(--primary);
        }

        .notification-text {
            font-size: 0.85rem;
            color: var(--gray-600);
            margin-bottom: 0;
            line-height: 1.5;
        }

        /* IMPROVED Notification Time Badge */
        .notification-time {
            font-size: 0.7rem;
            color: var(--gray-600);
            margin-left: 0.75rem;
            white-space: nowrap;
            font-weight: 600;
            background: linear-gradient(135deg, var(--gray-50) 0%, var(--gray-100) 100%);
            padding: 0.35rem 0.8rem;
            border-radius: var(--border-radius-lg);
            border: 1px solid var(--gray-200);
            display: flex;
            align-items: center;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: var(--shadow-sm);
            transition: var(--transition-normal);
            min-height: 28px;
        }

        .notification-time:hover {
            background: linear-gradient(135deg, var(--primary-bg) 0%, var(--secondary-bg) 100%);
            color: var(--primary);
            border-color: var(--primary-light);
            transform: translateY(-1px);
        }

        .notification-time.now {
            background: linear-gradient(135deg, var(--danger-bg) 0%, rgba(239, 68, 68, 0.15) 100%);
            color: var(--danger);
            border-color: var(--danger);
            animation: pulse 2s infinite;
        }

        .notification-time.recent {
            background: linear-gradient(135deg, var(--warning-bg) 0%, rgba(245, 158, 11, 0.15) 100%);
            color: var(--warning);
            border-color: var(--warning);
        }

        /* Stats Cards */
        .stat-card {
            background-color: white;
            border-radius: var(--border-radius-xl);
            box-shadow: var(--shadow);
            border: none;
            padding: 1.5rem;
            height: 100%;
            transition: var(--transition-normal);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            width: 150px;
            height: 150px;
            background: linear-gradient(135deg, var(--primary-bg) 0%, rgba(255,255,255,0) 60%);
            border-radius: 50%;
            top: -30px;
            right: -30px;
            z-index: -1;
            opacity: 0.8;
            transition: var(--transition-normal);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .stat-card:hover::before {
            transform: scale(1.1);
            opacity: 1;
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            margin-bottom: 1.25rem;
            box-shadow: var(--shadow-sm);
            position: relative;
            overflow: hidden;
        }

        .stat-icon::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: linear-gradient(120deg, rgba(255,255,255,0) 30%, rgba(255,255,255,0.4) 38%, rgba(255,255,255,0) 48%);
            animation: shine 3s infinite linear;
            transform: translateX(-100%);
        }

        .stat-title {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--gray-600);
            margin-bottom: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-value {
            font-size: 1.85rem;
            font-weight: 800;
            color: var(--gray-900);
            margin-bottom: 0.25rem;
            background: linear-gradient(90deg, var(--gray-900) 30%, var(--primary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
        }

        .stat-description {
            font-size: 0.85rem;
            color: var(--gray-500);
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
        }

        .stat-description i {
            margin-right: 0.35rem;
        }

        .stat-trend-up {
            color: var(--success);
            font-weight: 600;
        }

        .stat-trend-down {
            color: var(--danger);
            font-weight: 600;
        }

        /* Calendar */
        .calendar-container {
            margin-bottom: 1.5rem;
        }

        .calendar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.25rem;
        }

        .calendar-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--gray-800);
        }

        .calendar-actions {
            display: flex;
            align-items: center;
        }

        .calendar-action {
            width: 34px;
            height: 34px;
            border-radius: var(--border-radius);
            background-color: white;
            border: 1px solid var(--gray-100);
            color: var(--gray-700);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            margin-left: 0.5rem;
            transition: var(--transition-normal);
            box-shadow: var(--shadow-sm);
        }

        .calendar-action:hover {
            background-color: var(--primary-bg);
            color: var(--primary);
            border-color: transparent;
            transform: translateY(-2px);
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 0.5rem;
        }

        .calendar-weekday {
            text-align: center;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--gray-500);
            margin-bottom: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .calendar-day {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 100%;
            border-radius: var(--border-radius);
            background-color: white;
            border: 1px solid var(--gray-100);
            transition: var(--transition-normal);
            cursor: pointer;
            box-shadow: var(--shadow-sm);
            overflow: hidden;
        }

        .calendar-day:hover {
            background-color: var(--primary-bg);
            border-color: var(--primary-light);
            transform: translateY(-3px);
            box-shadow: var(--shadow);
            z-index: 2;
        }

        .calendar-day.today {
            background-color: var(--primary-bg);
            border-color: var(--primary);
            box-shadow: 0 0 0 1px var(--primary);
            z-index: 2;
        }

        .calendar-day.has-exam {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            border-color: var(--primary);
            z-index: 2;
        }

        .calendar-day-content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .calendar-day-dot {
            position: absolute;
            bottom: 4px;
            left: 50%;
            transform: translateX(-50%);
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background-color: var(--primary);
        }

        /* Upcoming Exams List */
        .upcoming-exams {
            padding-top: 0.5rem;
        }

        .upcoming-exams h6 {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }

        .upcoming-exams h6::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 30px;
            height: 2px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
            border-radius: 10px;
        }

        .upcoming-exam-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            background-color: var(--gray-50);
            border-radius: var(--border-radius);
            margin-bottom: 0.75rem;
            transition: var(--transition-normal);
        }

        .upcoming-exam-item:hover {
            background-color: var(--primary-bg);
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .upcoming-exam-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 0.75rem;
        }

        .upcoming-exam-content {
            flex-grow: 1;
        }

        .upcoming-exam-title {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 0.25rem;
            line-height: 1.2;
        }

        .upcoming-exam-time {
            font-size: 0.75rem;
            color: var(--gray-500);
            display: flex;
            align-items: center;
        }

        .upcoming-exam-time i {
            margin-right: 0.35rem;
            font-size: 0.85rem;
        }

        /* Footer */
        .footer {
            padding: 2rem 0;
            text-align: center;
            color: var(--gray-500);
            font-size: 0.9rem;
            border-top: 1px solid var(--gray-200);
            margin-top: 2rem;
            background-color: white;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .footer-logo {
            font-weight: 800;
            font-size: 1.2rem;
            margin-bottom: 1rem;
            display: inline-block;
        }

        .footer-logo span:first-child {
            color: var(--primary);
        }

        .footer-logo span:last-child {
            color: var(--secondary);
        }

        .footer-nav {
            display: flex;
            justify-content: center;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .footer-nav a {
            color: var(--gray-600);
            margin: 0 1rem;
            font-size: 0.85rem;
            font-weight: 500;
            transition: var(--transition-normal);
        }

        .footer-nav a:hover {
            color: var(--primary);
        }

        .footer-social {
            display: flex;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .footer-social-link {
            width: 36px;
            height: 36px;
            border-radius: var(--border-radius);
            background-color: var(--gray-100);
            color: var(--gray-700);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 0.5rem;
            transition: var(--transition-normal);
        }

        .footer-social-link:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-3px);
        }

        .footer-copyright {
            font-size: 0.85rem;
            color: var(--gray-500);
        }

        /* Mobile Sidebar */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: var(--dark-50);
            z-index: 1005;
            display: none;
            animation: fadeIn 0.3s ease;
        }

        .sidebar-overlay.active {
            display: block;
        }

        /* Responsive Design */
        @media (max-width: 1199.98px) {
            .navbar-search {
                width: 250px;
            }

            .calendar-grid {
                gap: 0.35rem;
            }
        }

        @media (max-width: 991.98px) {
            :root {
                --sidebar-width: 260px;
            }

            .sidebar {
                transform: translateX(-100%);
                z-index: 1020;
            }

            .sidebar.mobile-active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .navbar {
                left: 0;
            }

            .welcome-message {
                font-size: 1.5rem;
            }

            .card-body {
                padding: 1.5rem;
            }

            .stat-card {
                margin-bottom: 1rem;
            }
        }

        @media (max-width: 767.98px) {
            .dashboard-container {
                padding: 1.5rem 1rem;
            }

            .exam-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .exam-icon {
                margin-bottom: 1rem;
            }

            .exam-actions {
                margin-left: 0;
                margin-top: 1rem;
                width: 100%;
                justify-content: flex-start;
            }

            .status-badge {
                position: absolute;
                top: 1.25rem;
                right: 1.25rem;
                margin-left: 0;
            }

            .user-info {
                display: none;
            }

            .user-dropdown {
                margin-left: 0.5rem;
            }

            .stat-card {
                padding: 1.25rem;
            }

            .stat-icon {
                width: 48px;
                height: 48px;
                font-size: 1.25rem;
                margin-bottom: 1rem;
            }

            .stat-value {
                font-size: 1.5rem;
            }

            .calendar-grid {
                gap: 0.25rem;
            }

            .calendar-weekday {
                font-size: 0.7rem;
            }

            .sidebar {
                width: 280px;
            }
        }

        @media (max-width: 575.98px) {
            .navbar {
                padding: 0.65rem 1rem;
            }

            .navbar-brand {
                font-size: 1.35rem;
            }

            .welcome-message {
                font-size: 1.35rem;
            }

            .welcome-subtitle {
                font-size: 0.9rem;
            }

            .card-header {
                padding: 1.25rem;
            }

            .card-body {
                padding: 1.25rem;
            }

            .card-title {
                font-size: 1rem;
            }

            .exam-title {
                font-size: 1rem;
            }

            .exam-info span {
                margin-right: 1rem;
            }

            .footer-nav a {
                margin: 0 0.5rem 0.5rem;
            }

            .sidebar {
                width: 280px;
            }
        }
    </style>
    <!-- Dashboard Master Stylesheet -->
    <link href="{{ asset('css/dashboard-master.css') }}" rel="stylesheet">
</head>
<body>
<!-- Sidebar Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <a class="sidebar-brand" href="#">
            <span>e</span><span>Porikkha</span>
        </a>
        <button class="sidebar-close d-lg-none" id="closeSidebar">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div class="sidebar-profile">
        <div class="sidebar-profile-avatar">
            <img src="/api/placeholder/80/80" alt="Student">
        </div>
        <div class="sidebar-profile-info">
            <div class="sidebar-profile-name">Rafsan Ahmed</div>
            <div class="sidebar-profile-role">Computer Science</div>
        </div>
    </div>

    <div class="sidebar-menu">
        <div class="sidebar-menu-title">Main Menu</div>
        <div class="sidebar-item">
            <a href="#" class="sidebar-link active">
                <span class="sidebar-icon"><i class="fas fa-home"></i></span>
                <span class="sidebar-text">Dashboard</span>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="#" class="sidebar-link">
                <span class="sidebar-icon"><i class="fas fa-file-alt"></i></span>
                <span class="sidebar-text">All Exams</span>
                <span class="sidebar-badge">3</span>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="#" class="sidebar-link">
                <span class="sidebar-icon"><i class="fas fa-pencil-alt"></i></span>
                <span class="sidebar-text">Active Exams</span>
                <span class="sidebar-badge">1</span>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="#" class="sidebar-link">
                <span class="sidebar-icon"><i class="fas fa-chart-bar"></i></span>
                <span class="sidebar-text">Results</span>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="#" class="sidebar-link">
                <span class="sidebar-icon"><i class="fas fa-medal"></i></span>
                <span class="sidebar-text">Certificates</span>
                <span class="sidebar-badge">2</span>
            </a>
        </div>

        <div class="sidebar-divider"></div>

        <div class="sidebar-menu-title">Academic</div>
        <div class="sidebar-item">
            <a href="#" class="sidebar-link">
                <span class="sidebar-icon"><i class="fas fa-book"></i></span>
                <span class="sidebar-text">Courses</span>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="#" class="sidebar-link">
                <span class="sidebar-icon"><i class="fas fa-calendar-alt"></i></span>
                <span class="sidebar-text">Schedule</span>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="#" class="sidebar-link">
                <span class="sidebar-icon"><i class="fas fa-graduation-cap"></i></span>
                <span class="sidebar-text">Grades</span>
            </a>
        </div>

        <div class="sidebar-divider"></div>

        <div class="sidebar-menu-title">Account</div>
        <div class="sidebar-item">
            <a href="#" class="sidebar-link">
                <span class="sidebar-icon"><i class="fas fa-user"></i></span>
                <span class="sidebar-text">Profile</span>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="#" class="sidebar-link">
                <span class="sidebar-icon"><i class="fas fa-cog"></i></span>
                <span class="sidebar-text">Settings</span>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="#" class="sidebar-link">
                <span class="sidebar-icon"><i class="fas fa-question-circle"></i></span>
                <span class="sidebar-text">Help Center</span>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="#" class="sidebar-link">
                <span class="sidebar-icon"><i class="fas fa-sign-out-alt"></i></span>
                <span class="sidebar-text">Sign out</span>
            </a>
        </div>
    </div>
</aside>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid px-0">
        <button class="toggle-sidebar-btn d-none d-lg-flex" id="toggleSidebar">
            <i class="fas fa-bars"></i>
        </button>

        <button class="toggle-sidebar-btn d-lg-none" id="openSidebar">
            <i class="fas fa-bars"></i>
        </button>

        <div class="navbar-search d-none d-lg-block">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-input" placeholder="Search exams, courses, results...">
        </div>

        <div class="navbar-actions ms-auto">
            <button class="navbar-action has-notification">
                <i class="far fa-bell"></i>
                <span class="badge">3</span>
            </button>
            <button class="navbar-action d-none d-lg-flex">
                <i class="far fa-calendar-alt"></i>
            </button>
            <button class="navbar-action d-none d-lg-flex">
                <i class="far fa-envelope"></i>
                <span class="badge">5</span>
            </button>

            <!-- WORKING DROPDOWN - USE THIS -->
            <div class="dropdown">
                <button class="btn btn-link dropdown-toggle p-0 border-0"
                        type="button"
                        id="dropdownMenuButton"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                    <div class="user-dropdown">
                        <div class="user-avatar">
                            <img src="/api/placeholder/80/80" alt="Student">
                        </div>
                        <div class="user-info">
                            <div class="user-name">Rafsan</div>
                            <div class="user-role">Student</div>
                        </div>
                        <i class="fas fa-chevron-down ms-2" style="font-size: 0.8rem;"></i>
                    </div>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow rounded-lg border-0" aria-labelledby="dropdownMenuButton">
                    <li><h6 class="dropdown-header">Account</h6></li>
                    <li><a class="dropdown-item py-2" href="#"><i class="fas fa-user me-2 text-primary"></i> Profile</a></li>
                    <li><a class="dropdown-item py-2" href="#"><i class="fas fa-cog me-2 text-secondary"></i> Settings</a></li>
                    <li><a class="dropdown-item py-2" href="#"><i class="fas fa-medal me-2 text-warning"></i> Achievements</a></li>
                    <li><a class="dropdown-item py-2" href="#"><i class="fas fa-bell me-2 text-info"></i> Notifications</a></li>
                    <li><hr class="dropdown-divider my-2"></li>
                    <li><a class="dropdown-item py-2 text-danger" href="#"><i class="fas fa-sign-out-alt me-2"></i> Sign out</a></li>
                </ul>
            </div>

        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <div class="dashboard-container">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="welcome-message">Welcome back, Rafsan!</h1>
            <p class="welcome-subtitle">Here's what's happening with your examination schedule.</p>
        </div>

        <!-- Stats Row -->
        <div class="row mb-4 animate-cards">
            <div class="col-md-3 col-sm-6 mb-3 mb-md-0">
                <div class="stat-card">
                    <div class="stat-icon bg-gradient-primary">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h6 class="stat-title">Total Exams</h6>
                    <h3 class="stat-value">24</h3>
                    <p class="stat-description"><i class="fas fa-arrow-right"></i> 3 upcoming</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3 mb-md-0">
                <div class="stat-card">
                    <div class="stat-icon bg-gradient-secondary">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h6 class="stat-title">Average Score</h6>
                    <h3 class="stat-value">82%</h3>
                    <p class="stat-description"><i class="fas fa-arrow-up"></i> <span class="stat-trend-up">+6%</span> from last exam</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3 mb-sm-0">
                <div class="stat-card">
                    <div class="stat-icon" style="background: linear-gradient(145deg, var(--warning) 0%, #f97316 100%);">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h6 class="stat-title">Certificates</h6>
                    <h3 class="stat-value">8</h3>
                    <p class="stat-description"><i class="fas fa-clock"></i> 2 pending approval</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="stat-icon" style="background: linear-gradient(145deg, var(--secondary) 0%, #6366f1 100%);">
                        <i class="fas fa-medal"></i>
                    </div>
                    <h6 class="stat-title">Class Ranking</h6>
                    <h3 class="stat-value">#12</h3>
                    <p class="stat-description"><i class="fas fa-arrow-up"></i> <span class="stat-trend-up">Top 10%</span> in your batch</p>
                </div>
            </div>
        </div>

        <!-- Main Dashboard Content -->
        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-8">
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
                <!-- Notifications Card with Improved Badge Design -->
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
                            <div class="notification-time now">Now</div>
                        </div>

                        <div class="notification-item">
                            <div class="notification-icon bg-warning">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <div class="notification-content">
                                <h6 class="notification-title">Exam Reminder</h6>
                                <p class="notification-text">Your Advanced Database Systems exam is scheduled for May 20, 2025 at 11:00 AM.</p>
                            </div>
                            <div class="notification-time recent">2 hrs ago</div>
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
                            <div class="notification-time old">3 days ago</div>
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

    <!-- Footer -->
    <div class="footer">
        <div class="footer-content">
            <a href="#" class="footer-logo">
                <span>e</span><span>Porikkha</span>
            </a>
            <div class="footer-nav">
                <a href="#">About</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Contact</a>
                <a href="#">Help Center</a>
            </div>
            <div class="footer-social">
                <a href="#" class="footer-social-link"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="footer-social-link"><i class="fab fa-twitter"></i></a>
                <a href="#" class="footer-social-link"><i class="fab fa-instagram"></i></a>
                <a href="#" class="footer-social-link"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <p class="footer-copyright">&copy; 2025 ePorikkha. All rights reserved.</p>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Fix Dropdown JavaScript -->
<script>
    // Wait for page to load completely
    window.addEventListener('load', function() {
        // Force initialize all dropdowns
        const dropdowns = document.querySelectorAll('[data-bs-toggle="dropdown"]');
        dropdowns.forEach(function(dropdown) {
            new bootstrap.Dropdown(dropdown);
        });

        // Alternative: Click handler for user dropdown
        const userDropdown = document.getElementById('headerUser');
        const dropdownMenu = userDropdown.nextElementSibling;

        userDropdown.addEventListener('click', function(e) {
            e.preventDefault();
            if (dropdownMenu.classList.contains('show')) {
                dropdownMenu.classList.remove('show');
            } else {
                // Close other dropdowns first
                document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                    menu.classList.remove('show');
                });
                dropdownMenu.classList.add('show');
            }
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!userDropdown.contains(e.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    });

    // Sidebar functionality
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const toggleSidebarBtn = document.getElementById('toggleSidebar');
        const navbar = document.querySelector('.navbar');

        if (toggleSidebarBtn) {
            toggleSidebarBtn.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('sidebar-collapsed');
                navbar.classList.toggle('navbar-compact');
            });
        }

        // Mobile sidebar
        const openSidebarBtn = document.getElementById('openSidebar');
        const closeSidebarBtn = document.getElementById('closeSidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function openSidebar() {
            sidebar.classList.add('mobile-active');
            sidebarOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeSidebar() {
            sidebar.classList.remove('mobile-active');
            sidebarOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        if (openSidebarBtn) {
            openSidebarBtn.addEventListener('click', openSidebar);
        }

        if (closeSidebarBtn) {
            closeSidebarBtn.addEventListener('click', closeSidebar);
        }

        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', closeSidebar);
        }

        // Responsive sidebar
        function handleResize() {
            if (window.innerWidth >= 992) {
                sidebar.classList.remove('mobile-active');
                sidebarOverlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        window.addEventListener('resize', handleResize);
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Bootstrap version:', bootstrap.Tooltip.VERSION);
        console.log('Dropdowns found:', document.querySelectorAll('[data-bs-toggle="dropdown"]').length);
    });
</script>
</body>
</html>
