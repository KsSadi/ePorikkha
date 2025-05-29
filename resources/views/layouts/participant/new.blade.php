<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ePorikkha - Admin Dashboard</title>

    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ========================================
           COMMON ADMIN PANEL STYLES
           ======================================== */

        :root {
            /* Primary Brand Colors */
            --ap-primary: #5a5af3;
            --ap-primary-light: #eeeeff;
            --ap-primary-dark: #4a4ae8;
            --ap-secondary: #ff7373;
            --ap-accent: #10b981;

            /* UI Colors */
            --ap-success: #4caf50;
            --ap-warning: #ff9800;
            --ap-danger: #f44336;
            --ap-info: #2196f3;

            /* Text Colors */
            --ap-text-primary: #333;
            --ap-text-secondary: #64748b;
            --ap-text-muted: #94a3b8;

            /* Background Colors */
            --ap-bg-primary: #ffffff;
            --ap-bg-secondary: #f8fafc;
            --ap-bg-light: #f1f5f9;
            --white: #ffffff;
            --black: #000000;
            --ap-bg-accent: #f3f4f6;
            --ap-bg-highlight: #e2e8f0;
            --ap-bg-overlay: rgba(255, 255, 255, 0.8);
            --ap-bg-gradient: linear-gradient(135deg, #f3f4f6, #e2e8f0);
            --ap-bg-gradient-dark: linear-gradient(135deg, #4a4ae8, #5a5af3);
            --ap-bg-gradient-light: linear-gradient(135deg, #eeeeff, #f1f5f9);
            --ap-bg-card: #ffffff;
            --ap-bg-card-hover: #f9fafb;
            --ap-bg-card-active: #f3f4f6;

            /* Border & Shadow */
            --ap-border: #e2e8f0;
            --ap-shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --ap-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --ap-shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            --ap-shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);

            /* Border Radius */
            --ap-radius: 12px;
            --ap-radius-lg: 16px;
            --ap-radius-xl: 20px;

            /* Spacing */
            --ap-space-xs: 0.5rem;
            --ap-space-sm: 1rem;
            --ap-space-md: 1.5rem;
            --ap-space-lg: 2rem;
            --ap-space-xl: 3rem;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--ap-bg-secondary);
            color: var(--ap-text-primary);
            line-height: 1.6;
        }

        /* ========================================
           COMMON LAYOUT COMPONENTS
           ======================================== */

        /* Admin Panel Container */
        .ap-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 var(--ap-space-sm);
        }

        /* Admin Panel Section */
        .ap-section {
            margin-bottom: var(--ap-space-xl);
        }

        .ap-section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--ap-space-lg);
            flex-wrap: wrap;
            gap: var(--ap-space-sm);
        }

        .ap-section-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--ap-text-primary);
            margin: 0;
        }

        /* ========================================
           NAVIGATION COMPONENTS
           ======================================== */

        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--ap-border);
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: var(--shadow);
        }

        /* Enhanced Logo Design */
        .navbar-brand {
            font-weight: 800;
            font-size: 1.75rem;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-brand i {
            background: linear-gradient(135deg, var(--ap-primary), var(--ap-primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 1.5rem;
        }

        .logo-text .e-letter {
            color: var(--ap-primary);
            font-weight: 900;
            font-size: 1.9rem;
        }

        .logo-text .porikkha-text {
            color: var(--ap-accent);
            font-weight: 700;
            font-size: 1.75rem;
        }

        .navbar-brand:hover .logo-text .e-letter {
            color: var(--ap-primary-dark);
        }

        .navbar-brand:hover .logo-text .porikkha-text {
            color: #059669;
        }

        .nav-link {
            color: var(--ap-text-secondary) !important;
            font-weight: 600;
            padding: 0.75rem 1.25rem !important;
            border-radius: var(--ap-radius);
            transition: all 0.2s ease;
            margin: 0 0.25rem;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--ap-primary) !important;
            background: var(--ap-primary-light);
            transform: translateY(-2px);
        }
        .notification-btn {
            position: relative;
            background: transparent;
            border: 2px solid var(--ap-border);
            color: var(--ap-text-secondary);
            font-size: 1.25rem;
            padding: 0.75rem;
            border-radius: 50%;
            transition: all 0.2s ease;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .notification-btn:hover {
            background: var(--ap-primary-light);
            color: var(--ap-primary);
            border-color: var(--ap-primary);
            transform: scale(1.1);
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 22px;
            height: 22px;
            background: var(--ap-secondary);
            color: white;
            border-radius: 50%;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            border: 2px solid white;
            animation: pulse 2s infinite;
        }

        /* Notification Dropdown */
        .notification-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            width: 350px;
            background: var(--white);
            border-radius: var(--ap-radius);
            box-shadow: var(--ap-shadow-lg);
            border: 1px solid var(--ap-border);
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.3s ease;
        }

        .notification-dropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .notification-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--ap-border);
        }

        .notification-header h6 {
            margin: 0;
            font-weight: 600;
        }

        .notification-list {
            max-height: 350px;
            overflow-y: auto;
        }

        .notification-item {
            display: flex;
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--ap-border-light);
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .notification-item:hover {
            background: var(--ap-primary-light);
        }

        .notification-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.75rem;
            flex-shrink: 0;
            font-size: 1rem;
        }

        .notification-content {
            flex: 1;
        }

        .notification-title {
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--ap-text);
            margin-bottom: 0.25rem;
        }

        .notification-text {
            font-size: 0.75rem;
            color: var(--ap-text-muted);
            margin-bottom: 0.25rem;
        }

        .notification-time {
            font-size: 0.7rem;
            color: var(--ap-text-muted);
        }

        .notification-footer {
            padding: 0.75rem 1rem;
            text-align: center;
            border-top: 1px solid var(--ap-border-light);
        }

        .notification-footer a {
            text-decoration: none;
            color: var(--ap-primary);
            font-weight: 600;
            font-size: 0.875rem;
        }

        .user-dropdown {
            border: 2px solid var(--ap-border);
            background: var(--ap-bg-primary);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 1rem;
            border-radius: var(--ap-radius);
            transition: all 0.2s ease;
        }

        .user-dropdown:hover {
            background: var(--ap-primary-light);
            border-color: var(--ap-primary);
            transform: translateY(-2px);
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--ap-primary), var(--ap-primary-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
            box-shadow: var(--ap-shadow);
        }

        /* ========================================
           MINIMAL WELCOME SECTION
           ======================================== */

        .minimal-welcome {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border-radius: var(--ap-radius-lg);
            padding: 2rem 1.5rem;
            margin: 1.5rem 0 2rem 0;
            border: 1px solid var(--ap-border);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.06);
            position: relative;
            overflow: hidden;
        }

        .minimal-welcome::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at top right, rgba(90, 90, 243, 0.03) 0%, transparent 50%),
            radial-gradient(circle at bottom left, rgba(255, 115, 115, 0.03) 0%, transparent 50%);
            pointer-events: none;
        }

        .minimal-welcome::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--ap-primary), var(--ap-secondary));
            border-radius: var(--ap-radius-lg) var(--ap-radius-lg) 0 0;
        }

        .welcome-header {
            text-align: center;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .welcome-greeting {
            font-size: 2rem;
            font-weight: 300;
            color: var(--ap-text-primary);
            margin-bottom: 0.5rem;
            letter-spacing: -0.5px;
        }

        .welcome-greeting .admin-name {
            font-weight: 700;
            color: var(--ap-primary);
            background: linear-gradient(135deg, var(--ap-primary), var(--ap-primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .welcome-subtitle {
            font-size: 0.95rem;
            color: var(--ap-text-secondary);
            font-weight: 400;
            max-width: 480px;
            margin: 0 auto;
            line-height: 1.5;
        }

        .welcome-time-date {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1.5rem;
            margin: 1.5rem 0;
            flex-wrap: wrap;
            position: relative;
            z-index: 1;
        }

        .time-block, .date-block {
            text-align: center;
            padding: 0.875rem 1.25rem;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border-radius: var(--ap-radius);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .time-block:hover, .date-block:hover {
            background: rgba(255, 255, 255, 0.9);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        }

        .time-value, .date-value {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--ap-text-primary);
            margin-bottom: 0.25rem;
        }

        .time-label, .date-label {
            font-size: 0.7rem;
            color: var(--ap-text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
        }

        .welcome-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(110px, 1fr));
            gap: 1rem;
            margin: 1.5rem 0;
            position: relative;
            z-index: 1;
        }

        .stat-item {
            text-align: center;
            padding: 1.25rem 0.75rem;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: var(--ap-radius);
            transition: all 0.3s ease;
            position: relative;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .stat-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
            background: rgba(255, 255, 255, 0.95);
            border-color: rgba(90, 90, 243, 0.2);
        }

        .stat-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 2px;
            background: linear-gradient(90deg, var(--ap-primary), var(--ap-secondary));
            border-radius: 2px;
        }

        .stat-value {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--ap-primary);
            margin-bottom: 0.25rem;
            line-height: 1;
            margin-top: 0.5rem;
        }

        .stat-label {
            font-size: 0.8rem;
            color: var(--ap-text-secondary);
            font-weight: 500;
        }

        .welcome-actions {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
            position: relative;
            z-index: 1;
        }

        .minimal-btn {
            padding: 0.75rem 2rem;
            border-radius: var(--ap-radius);
            font-weight: 500;
            font-size: 0.875rem;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: 2px solid transparent;
        }

        .minimal-btn-primary {
            background: var(--ap-primary);
            color: white;
            box-shadow: 0 2px 8px rgba(90, 90, 243, 0.2);
        }

        .minimal-btn-primary:hover {
            background: var(--ap-primary-dark);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(90, 90, 243, 0.3);
        }

        .minimal-btn-outline {
            background: transparent;
            color: var(--ap-text-primary);
            border-color: var(--ap-border);
        }

        .minimal-btn-outline:hover {
            background: var(--ap-bg-light);
            color: var(--ap-text-primary);
            border-color: var(--ap-primary);
            transform: translateY(-1px);
        }

        /* ========================================
           OTHER CARD COMPONENTS
           ======================================== */

        .ap-card {
            background: var(--ap-bg-primary);
            border-radius: var(--ap-radius);
            box-shadow: var(--ap-shadow);
            border: 1px solid var(--ap-border);
            transition: all 0.3s ease;
        }

        .ap-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--ap-shadow-lg);
        }

        .ap-card-body {
            padding: var(--ap-space-lg);
        }

        /* Stats Cards */
        .ap-stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: var(--ap-space-md);
            margin-bottom: var(--ap-space-xl);
        }

        .ap-stat-card {
            background: var(--ap-bg-primary);
            border-radius: var(--ap-radius);
            padding: var(--ap-space-lg);
            box-shadow: var(--ap-shadow);
            border-left: 4px solid var(--ap-primary);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .ap-stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 80px;
            height: 80px;
            background: var(--ap-primary-light);
            border-radius: 50%;
            transform: translate(30px, -30px);
            opacity: 0.5;
        }

        .ap-stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--ap-shadow-lg);
        }

        .ap-stat-card:nth-child(2) { border-left-color: var(--ap-success); }
        .ap-stat-card:nth-child(3) { border-left-color: var(--ap-warning); }
        .ap-stat-card:nth-child(4) { border-left-color: var(--ap-danger); }

        .ap-stat-card:nth-child(2)::before { background: #e8f5e9; }
        .ap-stat-card:nth-child(3)::before { background: #fff8e1; }
        .ap-stat-card:nth-child(4)::before { background: #ffebee; }

        .ap-stat-icon {
            width: 50px;
            height: 50px;
            background: var(--ap-primary-light);
            border-radius: var(--ap-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--ap-primary);
            font-size: 1.5rem;
            margin-bottom: var(--ap-space-sm);
            position: relative;
            z-index: 1;
        }

        .ap-stat-card:nth-child(2) .ap-stat-icon { background: #e8f5e9; color: var(--ap-success); }
        .ap-stat-card:nth-child(3) .ap-stat-icon { background: #fff8e1; color: var(--ap-warning); }
        .ap-stat-card:nth-child(4) .ap-stat-icon { background: #ffebee; color: var(--ap-danger); }

        .ap-stat-value {
            font-size: 2rem;
            font-weight: 800;
            color: var(--ap-primary);
            margin-bottom: 0.25rem;
            position: relative;
            z-index: 1;
        }

        .ap-stat-card:nth-child(2) .ap-stat-value { color: var(--ap-success); }
        .ap-stat-card:nth-child(3) .ap-stat-value { color: var(--ap-warning); }
        .ap-stat-card:nth-child(4) .ap-stat-value { color: var(--ap-danger); }

        .ap-stat-label {
            color: var(--ap-text-secondary);
            font-size: 1rem;
            font-weight: 600;
            position: relative;
            z-index: 1;
        }

        /* ========================================
           BUTTON COMPONENTS
           ======================================== */

        .ap-btn {
            border: none;
            border-radius: var(--ap-radius);
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            cursor: pointer;
        }

        .ap-btn-primary {
            background: var(--ap-primary);
            color: white;
            box-shadow: 0 4px 12px rgba(90, 90, 243, 0.3);
        }

        .ap-btn-primary:hover {
            background: var(--ap-primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(90, 90, 243, 0.4);
            color: white;
        }

        .ap-btn-outline {
            background: transparent;
            color: var(--ap-primary);
            border: 2px solid var(--ap-primary);
        }

        .ap-btn-outline:hover {
            background: var(--ap-primary);
            color: white;
        }

        .ap-view-all {
            color: var(--ap-primary);
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.25rem;
            border: 2px solid var(--ap-primary);
            border-radius: var(--ap-radius);
            transition: all 0.3s ease;
        }

        .ap-view-all:hover {
            background: var(--ap-primary);
            color: white;
            transform: translateY(-2px);
        }

        /* ========================================
           GRID COMPONENTS
           ======================================== */

        .ap-grid {
            display: grid;
            gap: var(--ap-space-md);
        }

        .ap-grid-2 { grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); }
        .ap-grid-3 { grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); }
        .ap-grid-4 { grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); }

        /* Quick Actions */
        .ap-action-card {
            background: var(--ap-bg-primary);
            border-radius: var(--ap-radius);
            box-shadow: var(--ap-shadow);
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
            display: block;
            padding: var(--ap-space-lg);
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .ap-action-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--ap-primary), var(--ap-secondary));
        }

        .ap-action-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--ap-shadow-lg);
            text-decoration: none;
            color: inherit;
        }

        .ap-action-icon {
            width: 50px;
            height: 50px;
            background: var(--ap-primary-light);
            border-radius: var(--ap-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--ap-primary);
            font-size: 1.25rem;
            margin-bottom: var(--ap-space-sm);
            box-shadow: var(--ap-shadow-sm);
        }

        .ap-action-title {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--ap-text-primary);
            margin-bottom: 0.5rem;
        }

        .ap-action-desc {
            color: var(--ap-text-secondary);
            font-size: 0.875rem;
            line-height: 1.6;
        }

        /* ========================================
           ENHANCED EXAM CARDS
           ======================================== */

        .ap-exam-card {
            background: var(--ap-bg-primary);
            border-radius: var(--ap-radius-lg);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            overflow: hidden;
            border: 1px solid var(--ap-border);
            position: relative;
        }

        .ap-exam-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--ap-primary), var(--ap-accent));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .ap-exam-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }

        .ap-exam-card:hover::before {
            opacity: 1;
        }

        .ap-exam-card-header {
            padding: 1.5rem 1.5rem 1rem;
            background: linear-gradient(135deg, rgba(255, 255, 255, 1), rgba(248, 250, 252, 0.8));
            position: relative;
        }

        .ap-exam-card-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 1.5rem;
            right: 1.5rem;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--ap-border), transparent);
        }

        .ap-exam-header {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .ap-exam-icon {
            width: 60px;
            height: 60px;
            border-radius: var(--ap-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .ap-exam-card:hover .ap-exam-icon {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .ap-exam-icon.math {
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            color: var(--ap-info);
            border: 2px solid rgba(33, 150, 243, 0.2);
        }
        .ap-exam-icon.science {
            background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
            color: var(--ap-success);
            border: 2px solid rgba(76, 175, 80, 0.2);
        }
        .ap-exam-icon.english {
            background: linear-gradient(135deg, #fff8e1, #ffecb3);
            color: var(--ap-warning);
            border: 2px solid rgba(255, 152, 0, 0.2);
        }
        .ap-exam-icon.cs {
            background: linear-gradient(135deg, var(--ap-primary-light), #d1c4e9);
            color: var(--ap-primary);
            border: 2px solid rgba(90, 90, 243, 0.2);
        }

        .ap-exam-info {
            flex: 1;
            min-width: 0;
        }

        .ap-exam-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--ap-text-primary);
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .ap-exam-subtitle {
            color: var(--ap-text-secondary);
            font-size: 0.875rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .ap-exam-subtitle .separator {
            width: 4px;
            height: 4px;
            background: var(--ap-text-muted);
            border-radius: 50%;
        }

        .ap-exam-body {
            padding: 0 1.5rem 1.5rem;
        }

        .ap-exam-details {
            margin-bottom: 1.5rem;
        }

        .ap-detail-row {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 0.75rem;
            padding: 0.5rem 0.75rem;
            background: var(--ap-bg-light);
            border-radius: var(--ap-radius);
            transition: all 0.2s ease;
        }

        .ap-detail-row:hover {
            background: var(--ap-primary-light);
            transform: translateX(4px);
        }

        .ap-detail-icon {
            color: var(--ap-primary);
            width: 16px;
            font-weight: 600;
        }

        .ap-detail-text {
            font-size: 0.875rem;
            color: var(--ap-text-secondary);
            font-weight: 500;
        }

        .ap-exam-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .ap-exam-footer .ap-badge {
            margin-bottom: 0;
            font-size: 0.75rem;
            padding: 0.4rem 0.8rem;
        }

        .ap-exam-footer .ap-btn {
            flex: 1;
            justify-content: center;
            padding: 0.75rem 1rem;
            font-weight: 600;
            border-radius: var(--ap-radius);
            min-width: 120px;
        }

        .ap-exam-footer .ap-btn-outline {
            border-width: 2px;
            transition: all 0.3s ease;
        }

        .ap-exam-footer .ap-btn-outline:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(90, 90, 243, 0.2);
        }

        .ap-exam-footer .ap-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(90, 90, 243, 0.3);
        }

        /* Enhanced Status Indicators */
        .ap-exam-status {
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.8);
        }

        .ap-exam-status.active {
            background: var(--ap-success);
            animation: pulse 2s infinite;
        }

        .ap-exam-status.upcoming {
            background: var(--ap-warning);
        }

        .ap-exam-status.completed {
            background: var(--ap-text-muted);
        }

        /* Progress Bar */
        .ap-exam-progress {
            margin: 1rem 0;
            background: var(--ap-bg-light);
            border-radius: 8px;
            overflow: hidden;
            height: 8px;
        }

        .ap-exam-progress-bar {
            height: 100%;
            background: linear-gradient(90deg, var(--ap-primary), var(--ap-accent));
            border-radius: 8px;
            transition: width 0.3s ease;
        }

        /* Countdown Section */
        .ap-countdown-card {
            background: var(--ap-bg-primary);
            border-radius: var(--ap-radius);
            box-shadow: var(--ap-shadow);
            text-align: center;
            padding: var(--ap-space-xl) var(--ap-space-lg);
            border: 2px solid var(--ap-primary-light);
        }

        .ap-countdown-display {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: var(--ap-space-sm);
            margin: var(--ap-space-lg) 0;
        }

        .ap-countdown-item {
            background: var(--ap-primary-light);
            padding: var(--ap-space-md) var(--ap-space-sm);
            border-radius: var(--ap-radius);
            border: 2px solid var(--ap-primary);
            transition: all 0.3s ease;
        }

        .ap-countdown-item:hover {
            transform: scale(1.05);
        }

        .ap-countdown-value {
            font-size: 2rem;
            font-weight: 800;
            color: var(--ap-primary);
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .ap-countdown-label {
            font-size: 0.75rem;
            color: var(--ap-primary);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        /* Status Badges */
        .ap-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: var(--ap-space-sm);
        }

        .ap-badge-warning {
            background: linear-gradient(135deg, #fff8e1, #ffecb3);
            color: var(--ap-warning);
            border: 2px solid rgba(255, 152, 0, 0.3);
        }

        .ap-badge-success {
            background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
            color: var(--ap-success);
            border: 2px solid rgba(76, 175, 80, 0.3);
            animation: pulse 2s infinite;
        }

        .ap-badge-info {
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            color: var(--ap-info);
            border: 2px solid rgba(33, 150, 243, 0.3);
        }

        /* ========================================
           RESPONSIVE DESIGN
           ======================================== */

        @media (max-width: 768px) {
            .ap-container {
                padding: 0 var(--ap-space-xs);
            }

            .minimal-welcome {
                padding: 1.5rem 1rem;
                margin: 1rem 0 1.5rem 0;
            }

            .welcome-greeting {
                font-size: 1.75rem;
            }

            .welcome-header {
                margin-bottom: 1rem;
            }

            .welcome-time-date {
                gap: 1rem;
                margin: 1rem 0;
            }

            .time-block, .date-block {
                padding: 0.75rem 1rem;
            }

            .welcome-stats {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.75rem;
                margin: 1rem 0;
            }

            .stat-item {
                padding: 1rem 0.5rem;
            }

            .welcome-actions {
                flex-direction: column;
                align-items: stretch;
                gap: 0.75rem;
            }

            .minimal-btn {
                justify-content: center;
            }

            .ap-section-header {
                flex-direction: column;
                align-items: stretch;
            }

            .ap-stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: var(--ap-space-sm);
            }

            .ap-grid-2,
            .ap-grid-3,
            .ap-grid-4 {
                grid-template-columns: 1fr;
            }

            .ap-countdown-display {
                grid-template-columns: repeat(2, 1fr);
            }

            .ap-exam-card-header,
            .ap-exam-body {
                padding: 1rem;
            }

            .ap-exam-header {
                gap: 0.75rem;
            }

            .ap-exam-icon {
                width: 50px;
                height: 50px;
                font-size: 1.25rem;
            }

            .ap-exam-title {
                font-size: 1.125rem;
            }

            .ap-exam-footer {
                flex-direction: column;
                align-items: stretch;
            }

            .ap-exam-footer .ap-btn {
                width: 100%;
            }
        }

        /* ========================================
           ANIMATIONS
           ======================================== */

        .ap-fade-in {
            animation: apFadeIn 0.6s ease-in-out;
        }

        @keyframes apFadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.05);
                opacity: 0.8;
            }
        }

        /* ========================================
           Footer
           ======================================== */
        .footer {
            background: var(--white);
            border-top: 2px solid var(--ap-primary);
            border-radius: var(--ap-radius) var(--ap-radius) 0 0;
            padding: 1rem 0;
            margin: 1.5rem 1rem 0;
            text-align: center;
            box-shadow: var(--ap-shadow-sm);
        }

        .footer-logo {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .footer-logo i {
            background: linear-gradient(45deg, var(--ap-primary), var(--ap-primary-dark));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            color: transparent;
        }

        .footer-logo .e-letter {
            color: var(--ap-primary);
            font-weight: 900;
        }

        .footer-logo .porikkha-text {
            color: var(--ap-accent);
            font-weight: 700;
        }

    </style>
</head>
<body>

<!-- Enhanced Navigation -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <i class="fas fa-graduation-cap"></i>
            <div class="logo-text">
                <span class="e-letter">e</span><span class="porikkha-text">Porikkha</span>
            </div>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="fas fa-bars text-secondary"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Create Exam</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Questions</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Students</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Reports</a></li>
            </ul>

            <div class="d-flex align-items-center gap-3">
                <div style="position: relative;">
                    <button class="notification-btn" id="notificationBtn">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </button>

                    <div class="notification-dropdown" id="notificationDropdown">
                        <div class="notification-header">
                            <h6>Notifications</h6>
                            <a href="#" style="font-size: 0.75rem; color: var(--ap-primary);">Mark all as read</a>
                        </div>
                        <div class="notification-list">
                            <a href="#" class="notification-item">
                                <div class="notification-icon" style="background: #e3f2fd; color: var(--ap-info);">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <div class="notification-content">
                                    <div class="notification-title">New Student Registration</div>
                                    <div class="notification-text">5 new students have registered today</div>
                                    <div class="notification-time">2 hours ago</div>
                                </div>
                            </a>
                            <a href="#" class="notification-item">
                                <div class="notification-icon" style="background: #e8f5e9; color: var(--ap-success);">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="notification-content">
                                    <div class="notification-title">Exam Completed</div>
                                    <div class="notification-text">Physics exam completed by 42 students</div>
                                    <div class="notification-time">4 hours ago</div>
                                </div>
                            </a>
                            <a href="#" class="notification-item">
                                <div class="notification-icon" style="background: #fff8e1; color: var(--ap-warning);">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <div class="notification-content">
                                    <div class="notification-title">System Alert</div>
                                    <div class="notification-text">Server maintenance scheduled for tonight</div>
                                    <div class="notification-time">6 hours ago</div>
                                </div>
                            </a>
                        </div>
                        <div class="notification-footer">
                            <a href="#">View All Notifications</a>
                        </div>
                    </div>
                </div>

                <div class="dropdown">
                    <button class="user-dropdown dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <div class="user-avatar">A</div>
                        <div class="d-none d-md-block text-start">
                            <div class="fw-bold" style="font-size: 0.875rem;">Admin</div>
                            <div class="text-muted" style="font-size: 0.75rem;">Administrator</div>
                        </div>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="ap-container">

    <!-- Minimal Welcome Section -->
    <div class="minimal-welcome ap-fade-in">
        <div class="welcome-header">
            <h1 class="welcome-greeting" id="greetingTitle">
                Good Morning, <span class="admin-name">Admin</span>
            </h1>
            <p class="welcome-subtitle">
                Welcome back to your dashboard. Here's an overview of your examination platform.
            </p>
        </div>

        <div class="welcome-time-date">
            <div class="time-block">
                <div class="time-value" id="currentTime">10:30 AM</div>
                <div class="time-label">Current Time</div>
            </div>
            <div class="date-block">
                <div class="date-value" id="currentDate">May 28, 2025</div>
                <div class="date-label">Today's Date</div>
            </div>
        </div>

        <div class="welcome-stats">
            <div class="stat-item">
                <div class="stat-value">12</div>
                <div class="stat-label">Active Exams</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">89</div>
                <div class="stat-label">Students Online</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">5</div>
                <div class="stat-label">Pending Reviews</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">94%</div>
                <div class="stat-label">Success Rate</div>
            </div>
        </div>

        <div class="welcome-actions">
            <a href="#" class="minimal-btn minimal-btn-primary">
                <i class="fas fa-plus"></i>
                Create New Exam
            </a>
            <a href="#" class="minimal-btn minimal-btn-outline">
                <i class="fas fa-chart-line"></i>
                View Analytics
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="ap-stats-grid">
        <div class="ap-stat-card ap-fade-in">
            <div class="ap-stat-icon">
                <i class="fas fa-clipboard-list"></i>
            </div>
            <div class="ap-stat-value">24</div>
            <div class="ap-stat-label">Total Exams</div>
        </div>
        <div class="ap-stat-card ap-fade-in">
            <div class="ap-stat-icon">
                <i class="fas fa-user-graduate"></i>
            </div>
            <div class="ap-stat-value">156</div>
            <div class="ap-stat-label">Active Students</div>
        </div>
        <div class="ap-stat-card ap-fade-in">
            <div class="ap-stat-icon">
                <i class="fas fa-question-circle"></i>
            </div>
            <div class="ap-stat-value">485</div>
            <div class="ap-stat-label">Questions</div>
        </div>
        <div class="ap-stat-card ap-fade-in">
            <div class="ap-stat-icon">
                <i class="fas fa-chart-bar"></i>
            </div>
            <div class="ap-stat-value">92%</div>
            <div class="ap-stat-label">Completion Rate</div>
        </div>
    </div>

    <!-- Quick Actions Section -->
    <div class="ap-section">
        <div class="ap-section-header">
            <h2 class="ap-section-title">Quick Actions</h2>
        </div>

        <div class="ap-grid ap-grid-4">
            <a href="#" class="ap-action-card ap-fade-in">
                <div class="ap-action-icon">
                    <i class="fas fa-plus-circle"></i>
                </div>
                <div class="ap-action-title">Create Exam</div>
                <div class="ap-action-desc">Set up new exam with questions and time limits</div>
            </a>
            <a href="#" class="ap-action-card ap-fade-in">
                <div class="ap-action-icon">
                    <i class="fas fa-question-circle"></i>
                </div>
                <div class="ap-action-title">Question Bank</div>
                <div class="ap-action-desc">Manage your collection of questions</div>
            </a>
            <a href="#" class="ap-action-card ap-fade-in">
                <div class="ap-action-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div class="ap-action-title">Add Students</div>
                <div class="ap-action-desc">Register new students or import from CSV</div>
            </a>
            <a href="#" class="ap-action-card ap-fade-in">
                <div class="ap-action-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div class="ap-action-title">View Reports</div>
                <div class="ap-action-desc">Analyze exam performances and statistics</div>
            </a>
        </div>
    </div>

    <!-- Enhanced Upcoming Exams Section -->
    <div class="ap-section">
        <div class="ap-section-header">
            <h2 class="ap-section-title">Upcoming Exams</h2>
            <a href="#" class="ap-view-all">
                View All <i class="fas fa-chevron-right"></i>
            </a>
        </div>

        <div class="ap-grid ap-grid-3">
            <div class="ap-exam-card ap-fade-in">
                <div class="ap-exam-status upcoming"></div>
                <div class="ap-exam-card-header">
                    <div class="ap-exam-header">
                        <div class="ap-exam-icon math">
                            <i class="fas fa-square-root-alt"></i>
                        </div>
                        <div class="ap-exam-info">
                            <div class="ap-exam-title">Advanced Mathematics</div>
                            <div class="ap-exam-subtitle">
                                <span>30 questions</span>
                                <div class="separator"></div>
                                <span>2 hours</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ap-exam-body">
                    <div class="ap-exam-details">
                        <div class="ap-detail-row">
                            <i class="fas fa-calendar-alt ap-detail-icon"></i>
                            <span class="ap-detail-text">June 10, 2025</span>
                        </div>
                        <div class="ap-detail-row">
                            <i class="fas fa-clock ap-detail-icon"></i>
                            <span class="ap-detail-text">10:00 AM - 12:00 PM</span>
                        </div>
                        <div class="ap-detail-row">
                            <i class="fas fa-user-tie ap-detail-icon"></i>
                            <span class="ap-detail-text">Prof. Johnson</span>
                        </div>
                        <div class="ap-detail-row">
                            <i class="fas fa-users ap-detail-icon"></i>
                            <span class="ap-detail-text">42 Students Enrolled</span>
                        </div>
                    </div>

                    <div class="ap-exam-progress">
                        <div class="ap-exam-progress-bar" style="width: 65%;"></div>
                    </div>

                    <div class="ap-exam-footer">
                        <div class="ap-badge ap-badge-warning">Starts in 13 days</div>
                        <button class="ap-btn ap-btn-outline">
                            <i class="fas fa-eye"></i>
                            View Details
                        </button>
                    </div>
                </div>
            </div>

            <div class="ap-exam-card ap-fade-in">
                <div class="ap-exam-status upcoming"></div>
                <div class="ap-exam-card-header">
                    <div class="ap-exam-header">
                        <div class="ap-exam-icon science">
                            <i class="fas fa-flask"></i>
                        </div>
                        <div class="ap-exam-info">
                            <div class="ap-exam-title">Basic Science</div>
                            <div class="ap-exam-subtitle">
                                <span>25 questions</span>
                                <div class="separator"></div>
                                <span>1.5 hours</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ap-exam-body">
                    <div class="ap-exam-details">
                        <div class="ap-detail-row">
                            <i class="fas fa-calendar-alt ap-detail-icon"></i>
                            <span class="ap-detail-text">June 15, 2025</span>
                        </div>
                        <div class="ap-detail-row">
                            <i class="fas fa-clock ap-detail-icon"></i>
                            <span class="ap-detail-text">2:00 PM - 3:30 PM</span>
                        </div>
                        <div class="ap-detail-row">
                            <i class="fas fa-user-tie ap-detail-icon"></i>
                            <span class="ap-detail-text">Dr. Williams</span>
                        </div>
                        <div class="ap-detail-row">
                            <i class="fas fa-users ap-detail-icon"></i>
                            <span class="ap-detail-text">38 Students Enrolled</span>
                        </div>
                    </div>

                    <div class="ap-exam-progress">
                        <div class="ap-exam-progress-bar" style="width: 45%;"></div>
                    </div>

                    <div class="ap-exam-footer">
                        <div class="ap-badge ap-badge-warning">Starts in 18 days</div>
                        <button class="ap-btn ap-btn-outline">
                            <i class="fas fa-eye"></i>
                            View Details
                        </button>
                    </div>
                </div>
            </div>

            <div class="ap-exam-card ap-fade-in">
                <div class="ap-exam-status active"></div>
                <div class="ap-exam-card-header">
                    <div class="ap-exam-header">
                        <div class="ap-exam-icon cs">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <div class="ap-exam-info">
                            <div class="ap-exam-title">Computer Science 101</div>
                            <div class="ap-exam-subtitle">
                                <span>40 questions</span>
                                <div class="separator"></div>
                                <span>2.5 hours</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ap-exam-body">
                    <div class="ap-exam-details">
                        <div class="ap-detail-row">
                            <i class="fas fa-calendar-alt ap-detail-icon"></i>
                            <span class="ap-detail-text">Today - May 28, 2025</span>
                        </div>
                        <div class="ap-detail-row">
                            <i class="fas fa-clock ap-detail-icon"></i>
                            <span class="ap-detail-text">9:00 AM - 11:30 AM</span>
                        </div>
                        <div class="ap-detail-row">
                            <i class="fas fa-user-tie ap-detail-icon"></i>
                            <span class="ap-detail-text">Prof. Anderson</span>
                        </div>
                        <div class="ap-detail-row">
                            <i class="fas fa-users ap-detail-icon"></i>
                            <span class="ap-detail-text">56 Students Active</span>
                        </div>
                    </div>

                    <div class="ap-exam-progress">
                        <div class="ap-exam-progress-bar" style="width: 85%;"></div>
                    </div>

                    <div class="ap-exam-footer">
                        <div class="ap-badge ap-badge-success">Live Now</div>
                        <button class="ap-btn ap-btn-primary">
                            <i class="fas fa-eye"></i>
                            Monitor Exam
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Countdown Timer Section -->
    <div class="ap-section">
        <div class="ap-countdown-card ap-fade-in">
            <h3 class="h4 fw-bold mb-2" style="color: var(--ap-primary);">Next Exam: Advanced Mathematics</h3>
            <p class="text-muted mb-4">Get ready for the upcoming mathematics examination</p>
            <div class="ap-countdown-display">
                <div class="ap-countdown-item">
                    <div class="ap-countdown-value" id="days">13</div>
                    <div class="ap-countdown-label">Days</div>
                </div>
                <div class="ap-countdown-item">
                    <div class="ap-countdown-value" id="hours">18</div>
                    <div class="ap-countdown-label">Hours</div>
                </div>
                <div class="ap-countdown-item">
                    <div class="ap-countdown-value" id="minutes">45</div>
                    <div class="ap-countdown-label">Minutes</div>
                </div>
                <div class="ap-countdown-item">
                    <div class="ap-countdown-value" id="seconds">22</div>
                    <div class="ap-countdown-label">Seconds</div>
                </div>
            </div>
            <button class="ap-btn ap-btn-primary">
                <i class="fas fa-bell"></i>
                Set Reminder
            </button>
        </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="ap-section">
        <div class="ap-section-header">
            <h2 class="ap-section-title">Recent Activity</h2>
            <a href="#" class="ap-view-all">
                View All <i class="fas fa-chevron-right"></i>
            </a>
        </div>

        <div class="ap-grid ap-grid-2">
            <div class="ap-card ap-fade-in">
                <div class="ap-card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="ap-action-icon me-3" style="margin-bottom: 0;">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">New Student Registration</h6>
                            <small class="text-muted">5 new students registered today</small>
                        </div>
                    </div>
                    <small class="text-muted"><i class="fas fa-clock me-2"></i>2 hours ago</small>
                </div>
            </div>

            <div class="ap-card ap-fade-in">
                <div class="ap-card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="ap-action-icon me-3" style="margin-bottom: 0; background: #e8f5e9; color: var(--ap-success);">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Exam Completed</h6>
                            <small class="text-muted">Physics exam completed by 42 students</small>
                        </div>
                    </div>
                    <small class="text-muted"><i class="fas fa-clock me-2"></i>4 hours ago</small>
                </div>
            </div>

            <div class="ap-card ap-fade-in">
                <div class="ap-card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="ap-action-icon me-3" style="margin-bottom: 0; background: #fff8e1; color: var(--ap-warning);">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">System Alert</h6>
                            <small class="text-muted">Server maintenance scheduled for tonight</small>
                        </div>
                    </div>
                    <small class="text-muted"><i class="fas fa-clock me-2"></i>6 hours ago</small>
                </div>
            </div>

            <div class="ap-card ap-fade-in">
                <div class="ap-card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="ap-action-icon me-3" style="margin-bottom: 0; background: #ffebee; color: var(--ap-danger);">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Report Generated</h6>
                            <small class="text-muted">Monthly performance report is ready</small>
                        </div>
                    </div>
                    <small class="text-muted"><i class="fas fa-clock me-2"></i>1 day ago</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enhanced Footer -->
<footer class="footer">
    <div class="ap-container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div class="footer-logo mb-2 mb-md-0">
                <i class="fas fa-graduation-cap"></i>
                <div>
                    <span class="e-letter">e</span><span class="porikkha-text">Porikkha</span>
                </div>
            </div>
            <div style="color: var(--text-muted); font-size: 0.875rem;">
                © 2025 ePorikkha. All rights reserved.
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>

<script>
    // Notification Dropdown
    document.addEventListener('DOMContentLoaded', function() {
        const notificationBtn = document.getElementById('notificationBtn');
        const notificationDropdown = document.getElementById('notificationDropdown');

        notificationBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            notificationDropdown.classList.toggle('show');
        });

        // Close dropdown when clicking elsewhere
        document.addEventListener('click', function(e) {
            if (!notificationDropdown.contains(e.target) && e.target !== notificationBtn) {
                notificationDropdown.classList.remove('show');
            }
        });
    });

    // Date and Time Display
    function updateDateTime() {
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };

        const dateElement = document.getElementById('currentDate');
        const timeElement = document.getElementById('currentTime');

        if (dateElement && timeElement) {
            dateElement.textContent = now.toLocaleDateString('en-US', options);
            timeElement.textContent = now.toLocaleTimeString('en-US', timeOptions);
        }
    }

    // Countdown Timer
    function updateCountdown() {
        const targetDate = new Date('2025-06-10T10:00:00').getTime();
        const now = new Date().getTime();
        const difference = targetDate - now;

        if (difference > 0) {
            const days = Math.floor(difference / (1000 * 60 * 60 * 24));
            const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((difference % (1000 * 60)) / 1000);

            const daysElement = document.getElementById('days');
            const hoursElement = document.getElementById('hours');
            const minutesElement = document.getElementById('minutes');
            const secondsElement = document.getElementById('seconds');

            if (daysElement) daysElement.textContent = days.toString().padStart(2, '0');
            if (hoursElement) hoursElement.textContent = hours.toString().padStart(2, '0');
            if (minutesElement) minutesElement.textContent = minutes.toString().padStart(2, '0');
            if (secondsElement) secondsElement.textContent = seconds.toString().padStart(2, '0');
        }
    }

    // Greeting based on time
    function updateGreeting() {
        const hour = new Date().getHours();
        let greeting = 'Good Evening';

        if (hour < 12) greeting = 'Good Morning';
        else if (hour < 17) greeting = 'Good Afternoon';

        const greetingElement = document.getElementById('greetingTitle');
        if (greetingElement) {
            greetingElement.innerHTML = `${greeting}, <span class="admin-name">Admin</span>`;
        }
    }

    // Animated stats counter
    function animateStats() {
        const stats = document.querySelectorAll('.stat-value');
        stats.forEach((stat, index) => {
            const originalText = stat.textContent;
            const hasPercent = originalText.includes('%');
            const finalValue = parseInt(originalText);
            let currentValue = 0;
            const increment = finalValue / 50;

            const timer = setInterval(() => {
                currentValue += increment;
                if (currentValue >= finalValue) {
                    stat.textContent = finalValue + (hasPercent ? '%' : '');
                    clearInterval(timer);
                } else {
                    stat.textContent = Math.floor(currentValue) + (hasPercent ? '%' : '');
                }
            }, 30 + index * 10);
        });
    }

    // Initialize all functions
    document.addEventListener('DOMContentLoaded', function() {
        updateDateTime();
        updateCountdown();
        updateGreeting();

        // Set up intervals
        setInterval(() => {
            updateDateTime();
            updateCountdown();
        }, 1000);

        setInterval(updateGreeting, 60000);

        // Mobile menu auto-close
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                const navbarCollapse = document.querySelector('.navbar-collapse');
                const navbarToggler = document.querySelector('.navbar-toggler');
                if (navbarCollapse && navbarCollapse.classList.contains('show') && navbarToggler) {
                    navbarToggler.click();
                }
            });
        });

        // Trigger stats animation after page load
        setTimeout(animateStats, 500);
    });
</script>
</body>
</html>
