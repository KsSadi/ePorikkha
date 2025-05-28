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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;0,800;0,900;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800;900&display=swap" rel="stylesheet">

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

        .navbar-brand {
            font-weight: 800;
            font-size: 1.75rem;
            color: var(--ap-primary) !important;
            text-decoration: none;
            position: relative;
            display: flex;
            align-items: center;
            padding: 0.25rem 0.5rem;
            border-radius: var(--ap-radius);
            transition: all 0.3s ease;
            letter-spacing: -0.03em;
        }

        .navbar-brand .logo-icon {
            position: relative;
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--ap-primary), var(--ap-primary-dark));
            border-radius: 12px;
            margin-right: 0.75rem;
            box-shadow: 0 4px 10px rgba(90, 90, 243, 0.25);
            transition: all 0.3s ease;
            z-index: 2;
        }

        .navbar-brand:hover .logo-icon {
            transform: rotate(5deg) scale(1.05);
            box-shadow: 0 6px 15px rgba(90, 90, 243, 0.35);
        }

        .navbar-brand .logo-icon i {
            font-size: 1.4rem;
            color: white;
        }

        .navbar-brand .logo-text {
            position: relative;
            z-index: 2;
            font-family: 'Montserrat', sans-serif;
            letter-spacing: -0.02em;
            display: flex;
            align-items: center;
        }

        .navbar-brand .logo-text .e-part {
            color: var(--ap-secondary);
            font-weight: 800;
            position: relative;
            text-shadow: 0px 1px 1px rgba(0,0,0,0.1);
            font-size: 1.85rem;
            letter-spacing: -0.03em;
            transform: skewX(-5deg);
            display: inline-block;
            margin-right: -0.1rem;
        }

        .navbar-brand .logo-text .porikkha-part {
            background: linear-gradient(45deg, var(--ap-primary), var(--ap-primary-dark));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
            font-weight: 800;
            text-shadow: 0px 1px 1px rgba(0,0,0,0.05);
            font-family: 'Montserrat', sans-serif;
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
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            position: relative;
            overflow: hidden;
        }

        .user-dropdown::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.8) 0%, rgba(255,255,255,0) 70%);
            opacity: 0;
            transform: scale(0.5);
            transition: transform 0.5s ease, opacity 0.5s ease;
        }

        .user-dropdown:hover {
            background: var(--ap-primary-light);
            border-color: var(--ap-primary);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(90, 90, 243, 0.1);
        }

        .user-dropdown:hover::after {
            opacity: 0.3;
            transform: scale(1);
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
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .user-avatar::before {
            content: '';
            position: absolute;
            top: -10px;
            left: -10px;
            width: 150%;
            height: 40%;
            background: linear-gradient(90deg, rgba(255,255,255,0), rgba(255,255,255,0.3), rgba(255,255,255,0));
            transform: rotate(45deg) translateX(-100px);
            transition: all 0.6s ease;
        }

        .user-dropdown:hover .user-avatar {
            transform: scale(1.05);
        }

        .user-dropdown:hover .user-avatar::before {
            transform: rotate(45deg) translateX(200px);
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
        .ap-grid-3 { grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); }
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

        /* Exam Cards */
        .ap-exam-card {
            background: var(--ap-bg-primary);
            border-radius: var(--ap-radius);
            box-shadow: var(--ap-shadow);
            transition: all 0.3s ease;
            overflow: hidden;
            padding: var(--ap-space-lg);
            border: 2px solid transparent;
        }

        .ap-exam-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--ap-shadow-lg);
            border-color: var(--ap-primary-light);
        }

        .ap-exam-header {
            display: flex;
            align-items: center;
            gap: var(--ap-space-sm);
            margin-bottom: var(--ap-space-md);
        }

        .ap-exam-icon {
            width: 50px;
            height: 50px;
            border-radius: var(--ap-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            box-shadow: var(--ap-shadow-sm);
        }

        .ap-exam-icon.math { background: #e3f2fd; color: var(--ap-info); }
        .ap-exam-icon.science { background: #e8f5e9; color: var(--ap-success); }
        .ap-exam-icon.english { background: #fff8e1; color: var(--ap-warning); }
        .ap-exam-icon.cs { background: var(--ap-primary-light); color: var(--ap-primary); }

        .ap-exam-title {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--ap-text-primary);
            margin-bottom: 0.25rem;
        }

        .ap-exam-subtitle {
            color: var(--ap-text-secondary);
            font-size: 0.875rem;
        }

        .ap-exam-details {
            margin-bottom: var(--ap-space-md);
        }

        .ap-detail-row {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 0.5rem;
        }

        .ap-detail-icon {
            color: var(--ap-text-secondary);
            width: 16px;
        }

        .ap-detail-text {
            font-size: 0.875rem;
            color: var(--ap-text-secondary);
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
            background: #fff8e1;
            color: var(--ap-warning);
            border: 2px solid var(--ap-warning);
        }

        .ap-badge-success {
            background: #e8f5e9;
            color: var(--ap-success);
            border: 2px solid var(--ap-success);
            animation: pulse 2s infinite;
        }

        .ap-badge-info {
            background: #e3f2fd;
            color: var(--ap-info);
            border: 2px solid var(--ap-info);
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
            }
            50% {
                transform: scale(1.05);
            }
        }

        @keyframes dropdownFadeIn {
            from {
                opacity: 0;
                transform: translateY(10px) scale(0.98);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes menuItemFadeIn {
            from {
                opacity: 0;
                transform: translateX(-10px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .dropdown-item:nth-child(1) { animation: menuItemFadeIn 0.3s ease-out 0.05s both; }
        .dropdown-item:nth-child(2) { animation: menuItemFadeIn 0.3s ease-out 0.1s both; }
        .dropdown-item:nth-child(3) { animation: menuItemFadeIn 0.3s ease-out 0.15s both; }
        .dropdown-item:nth-child(4) { animation: menuItemFadeIn 0.3s ease-out 0.2s both; }
        .dropdown-item:nth-child(5) { animation: menuItemFadeIn 0.3s ease-out 0.25s both; }
        .dropdown-item:nth-child(6) { animation: menuItemFadeIn 0.3s ease-out 0.3s both; }
        .dropdown-item:nth-child(7) { animation: menuItemFadeIn 0.3s ease-out 0.35s both; }

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
            color: var(--ap-primary);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            letter-spacing: -0.02em;
            cursor: pointer;
        }

        .footer-logo:hover {
            transform: translateY(-2px);
        }

        .footer-logo .logo-icon {
            position: relative;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--ap-primary), var(--ap-primary-dark));
            border-radius: 10px;
            margin-right: 0.75rem;
            box-shadow: 0 3px 8px rgba(90, 90, 243, 0.25);
            transition: all 0.3s ease;
        }

        .footer-logo:hover .logo-icon {
            transform: rotate(5deg) scale(1.05);
            box-shadow: 0 5px 12px rgba(90, 90, 243, 0.35);
        }

        .footer-logo .logo-icon i {
            font-size: 1.2rem;
            color: white;
        }

        .footer-logo .logo-text {
            display: flex;
            align-items: center;
            font-family: 'Montserrat', sans-serif;
            letter-spacing: -0.03em;
            position: relative;
        }

        .footer-logo .logo-text .e-part {
            color: var(--ap-secondary);
            font-weight: 800;
            transform: skewX(-5deg);
            display: inline-block;
            margin-right: -0.1rem;
            text-shadow: 0px 1px 1px rgba(0,0,0,0.1);
        }

        .footer-logo .logo-text .porikkha-part {
            background: linear-gradient(45deg, var(--ap-primary), var(--ap-primary-dark));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
            text-shadow: 0px 1px 1px rgba(0,0,0,0.05);
        }

        .footer-logo .logo-text::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(to right, var(--ap-secondary) 15%, var(--ap-primary) 15%, var(--ap-primary-dark));
            border-radius: 10px;
            transition: width 0.5s cubic-bezier(0.22, 1, 0.36, 1);
            opacity: 0.7;
        }

        .footer-logo:hover .logo-text::after {
            width: 100%;
        }

        /* Enhanced User Dropdown Menu */
        .dropdown-menu {
            border: 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            border-radius: var(--ap-radius);
            overflow: hidden;
            padding: 0;
            min-width: 260px;
            animation: dropdownFadeIn 0.3s ease-out;
            border: 1px solid var(--ap-border);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.98);
        }

        @keyframes dropdownFadeIn {
            from {
                opacity: 0;
                transform: translateY(10px) scale(0.98);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes menuItemFadeIn {
            from {
                opacity: 0;
                transform: translateX(-10px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .dropdown-item:nth-child(1) { animation: menuItemFadeIn 0.3s ease-out 0.05s both; }
        .dropdown-item:nth-child(2) { animation: menuItemFadeIn 0.3s ease-out 0.1s both; }
        .dropdown-item:nth-child(3) { animation: menuItemFadeIn 0.3s ease-out 0.15s both; }
        .dropdown-item:nth-child(4) { animation: menuItemFadeIn 0.3s ease-out 0.2s both; }
        .dropdown-item:nth-child(5) { animation: menuItemFadeIn 0.3s ease-out 0.25s both; }
        .dropdown-item:nth-child(6) { animation: menuItemFadeIn 0.3s ease-out 0.3s both; }
        .dropdown-item:nth-child(7) { animation: menuItemFadeIn 0.3s ease-out 0.35s both; }

        .dropdown-menu-header {
            background: linear-gradient(135deg, var(--ap-primary-light), #f8f9ff);
            padding: 1.25rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid var(--ap-border);
            transition: all 0.3s ease;
        }

        .dropdown-menu-header:hover {
            background: linear-gradient(135deg, #f0f0ff, #f8f9ff);
        }

        .dropdown-menu-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--ap-primary), var(--ap-secondary));
            box-shadow: 0px 2px 10px rgba(90, 90, 243, 0.3);
        }

        .dropdown-menu-header::after {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.8) 0%, rgba(255, 255, 255, 0) 70%);
            opacity: 0.6;
        }

        .dropdown-menu-header .user-avatar {
            width: 55px;
            height: 55px;
            box-shadow: 0 6px 18px rgba(90, 90, 243, 0.25);
            position: relative;
            z-index: 1;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, var(--ap-primary), var(--ap-primary-dark));
        }

        .dropdown-menu-header:hover .user-avatar {
            transform: scale(1.05) rotate(3deg);
        }

        .dropdown-menu-header .user-avatar::after {
            content: '';
            position: absolute;
            right: 0px;
            bottom: 0px;
            width: 14px;
            height: 14px;
            background: var(--ap-success);
            border-radius: 50%;
            border: 2px solid white;
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.5);
            animation: pulseStatus 2s infinite;
        }

        @keyframes pulseStatus {
            0% {
                box-shadow: 0 0 0 0 rgba(76, 175, 80, 0.4);
            }
            70% {
                box-shadow: 0 0 0 6px rgba(76, 175, 80, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(76, 175, 80, 0);
            }
        }

        .dropdown-menu-header .user-info {
            flex: 1;
        }

        .dropdown-menu-header .user-name {
            font-weight: 700;
            font-size: 1.05rem;
            color: var(--ap-text-primary);
            margin-bottom: 0.25rem;
            letter-spacing: -0.01em;
            font-family: 'Poppins', sans-serif;
        }

        .dropdown-menu-header .user-role {
            font-size: 0.8rem;
            color: var(--ap-text-secondary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dropdown-menu-header .user-role-badge {
            background: linear-gradient(135deg, var(--ap-primary-light), #f0f0ff);
            padding: 0.2rem 0.6rem;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            color: var(--ap-primary);
            border: 1px solid var(--ap-primary-light);
            box-shadow: 0 2px 5px rgba(90, 90, 243, 0.1);
            letter-spacing: 0.02em;
            text-transform: uppercase;
        }

        .py-2 {
            padding: 0.5rem 0;
        }

        .dropdown-item {
            padding: 0.85rem 1.35rem;
            font-size: 0.9rem;
            font-weight: 500;
            color: #64748B;
            display: flex;
            align-items: center;
            transition: all 0.2s ease;
            position: relative;
            overflow: hidden;
            margin: 0 0.5rem;
            border-radius: 8px;
            letter-spacing: 0.01em;
        }

        .dropdown-item i {
            font-size: 0.9rem;
            width: 24px;
            text-align: center;
            margin-right: 0.85rem;
            position: relative;
            z-index: 1;
            transition: all 0.2s ease;
            color: #64748B;
        }

        .dropdown-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 0;
            background: linear-gradient(90deg, var(--ap-primary-light) 0%, rgba(238, 238, 255, 0.2) 100%);
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            border-radius: 8px;
        }

        .dropdown-item:hover {
            color: #4F46E5; /* Stronger purple color for better visibility */
            transform: translateX(3px);
            font-weight: 600;
            background-color: rgba(238, 238, 255, 0.7); /* Stronger background color */
        }

        .dropdown-item:hover::before {
            width: 100%;
            background: linear-gradient(90deg, rgba(79, 70, 229, 0.2) 0%, rgba(79, 70, 229, 0.05) 100%);
        }

        .dropdown-item:hover i {
            transform: translateX(2px) scale(1.1);
            color: #4F46E5; /* Stronger purple color for icons */
        }

        /* Enhanced dropdown item hover effect */
        .dropdown-item::after {
            content: '';
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%) scale(0);
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: var(--ap-primary);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover::after {
            transform: translateY(-50%) scale(1);
            opacity: 1;
        }

        .dropdown-divider {
            margin: 0.5rem 1.5rem;
            opacity: 0.1;
            border-top-color: var(--ap-border);
        }

        .dropdown-item.text-danger {
            color: #EF4444;
        }

        .dropdown-item.text-danger:hover {
            color: #DC2626;
            background-color: rgba(239, 68, 68, 0.1);
            font-weight: 600;
        }

        .dropdown-item.text-danger:hover::before {
            background: linear-gradient(90deg, rgba(239, 68, 68, 0.15) 0%, rgba(239, 68, 68, 0.05) 100%);
        }

        .dropdown-item.text-danger:hover i {
            color: #DC2626;
        }

        .badge.bg-danger {
            background: linear-gradient(135deg, #ff5353, #ff7373) !important;
            box-shadow: 0 2px 5px rgba(244, 67, 54, 0.2);
            padding: 0.25em 0.5em;
            font-weight: 600;
            position: relative;
            transform-origin: center;
            animation: badgePulse 2s infinite;
        }

        @keyframes badgePulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .dropdown-item.active-session {
            color: #22C55E;
            font-weight: 500;
            background: transparent;
        }

        .dropdown-item.active-session i {
            color: #22C55E;
            animation: pulse 2s infinite;
            font-size: 0.7rem;
            margin-top: 2px;
        }

        .dropdown-item.active-session:hover {
            color: #16A34A;
            background-color: rgba(34, 197, 94, 0.1);
            font-weight: 600;
        }

        .dropdown-item.active-session:hover i {
            color: #16A34A;
        }

        .dropdown-item.active-session:hover::before {
            background: linear-gradient(90deg, rgba(34, 197, 94, 0.15) 0%, rgba(34, 197, 94, 0.05) 100%);
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }

        .dropdown-menu-footer {
            padding: 0.9rem 1.25rem;
            text-align: center;
            font-size: 0.78rem;
            color: var(--ap-text-muted);
            background: linear-gradient(to bottom, var(--ap-bg-light), #f5f8fc);
            border-top: 1px solid var(--ap-border);
            font-weight: 500;
        }

        .dropdown-menu-footer::before {
            content: '\f017';
            font-family: 'Font Awesome 6 Free';
            font-weight: 400;
            margin-right: 0.5rem;
            opacity: 0.7;
        }

        /* Custom styles for specific menu items */
        .dropdown-item.profile-item i {
            color: #64748B;
        }

        .dropdown-item.profile-item:hover {
            color: #334155;
            background-color: rgba(100, 116, 139, 0.1);
        }

        .dropdown-item.profile-item:hover i {
            color: #334155;
        }

        .dropdown-item.profile-item:hover::before {
            background: linear-gradient(90deg, rgba(100, 116, 139, 0.15) 0%, rgba(100, 116, 139, 0.05) 100%);
        }

        .dropdown-item.settings-item i {
            color: #64748B;
        }

        .dropdown-item.settings-item:hover {
            color: #334155;
            background-color: rgba(100, 116, 139, 0.1);
        }

        .dropdown-item.settings-item:hover i {
            color: #334155;
        }

        .dropdown-item.settings-item:hover::before {
            background: linear-gradient(90deg, rgba(100, 116, 139, 0.15) 0%, rgba(100, 116, 139, 0.05) 100%);
        }

        .dropdown-item.notifications-item i {
            color: #64748B;
        }

        .dropdown-item.notifications-item:hover {
            color: #334155;
            background-color: rgba(100, 116, 139, 0.1);
        }

        .dropdown-item.notifications-item:hover i {
            color: #334155;
        }

        .dropdown-item.notifications-item:hover::before {
            background: linear-gradient(90deg, rgba(100, 116, 139, 0.15) 0%, rgba(100, 116, 139, 0.05) 100%);
        }

        .dropdown-item.help-item i {
            color: #64748B;
        }

        .dropdown-item.help-item:hover {
            color: #334155;
            background-color: rgba(100, 116, 139, 0.1);
        }

        .dropdown-item.help-item:hover i {
            color: #334155;
        }

        .dropdown-item.help-item:hover::before {
            background: linear-gradient(90deg, rgba(100, 116, 139, 0.15) 0%, rgba(100, 116, 139, 0.05) 100%);
        }

        .dropdown-item.system-item i {
            color: #6366F1;
        }

        .dropdown-item.system-item:hover {
            color: #4338CA;
            background-color: rgba(99, 102, 241, 0.1);
            font-weight: 600;
        }

        .dropdown-item.system-item:hover i {
            color: #4338CA;
        }

        .dropdown-item.system-item:hover::before {
            background: linear-gradient(90deg, rgba(99, 102, 241, 0.15) 0%, rgba(99, 102, 241, 0.05) 100%);
        }

        .dropdown-item.active-session {
            color: var(--ap-success);
            font-weight: 500;
            background: transparent;
        }
    </style>
</head>
<body>

<!-- Efficient Navigation -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <div class="logo-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <span class="logo-text">
                    <span class="e-part">e</span><span class="porikkha-part">Porikkha</span>
                </span>
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
                    <button class="user-dropdown dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-avatar"><i class="fas fa-user-shield" style="font-size: 1rem;"></i></div>
                        <div class="d-none d-md-block text-start">
                            <div class="fw-bold" style="font-size: 0.875rem;">Admin</div>
                            <div class="text-muted" style="font-size: 0.75rem;">Administrator</div>
                        </div>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="dropdown-menu-header">
                            <div class="user-avatar"><i class="fas fa-user-shield" style="font-size: 1rem;"></i></div>
                            <div class="user-info">
                                <div class="user-name">Admin User</div>
                                <div class="user-role">
                                    <span>Administrator</span>
                                    <span class="user-role-badge">Super Admin</span>
                                </div>
                            </div>
                        </div>

                        <div class="py-2">
                            <a class="dropdown-item active-session" href="#">
                                <i class="fas fa-circle"></i>
                                Active Session
                            </a>
                            <a class="dropdown-item profile-item" href="#">
                                <i class="fas fa-user"></i>
                                My Profile
                            </a>
                            <a class="dropdown-item settings-item" href="#">
                                <i class="fas fa-cog"></i>
                                Account Settings
                            </a>
                            <a class="dropdown-item notifications-item" href="#">
                                <i class="fas fa-bell"></i>
                                Notifications <span class="badge bg-danger rounded-pill ms-2" style="font-size: 0.65rem;">3</span>
                            </a>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item help-item" href="#">
                                <i class="fas fa-question-circle"></i>
                                Help Center
                            </a>
                            <a class="dropdown-item system-item" href="#">
                                <i class="fas fa-sliders"></i>
                                System Preferences
                            </a>
                            <a class="dropdown-item text-danger" href="#">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>

                        <div class="dropdown-menu-footer">
                            Last login: Today at 10:23 AM
                        </div>
                    </div>
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

    <!-- Upcoming Exams Section -->
    <div class="ap-section">
        <div class="ap-section-header">
            <h2 class="ap-section-title">Upcoming Exams</h2>
            <a href="#" class="ap-view-all">
                View All <i class="fas fa-chevron-right"></i>
            </a>
        </div>

        <div class="ap-grid ap-grid-3">
            <div class="ap-exam-card ap-fade-in">
                <div class="ap-exam-header">
                    <div class="ap-exam-icon math">
                        <i class="fas fa-square-root-alt"></i>
                    </div>
                    <div>
                        <div class="ap-exam-title">Advanced Mathematics</div>
                        <div class="ap-exam-subtitle">30 questions • 2 hours</div>
                    </div>
                </div>

                <div class="ap-exam-details">
                    <div class="ap-detail-row">
                        <i class="fas fa-calendar-alt ap-detail-icon"></i>
                        <span class="ap-detail-text">May 10, 2025</span>
                    </div>
                    <div class="ap-detail-row">
                        <i class="fas fa-clock ap-detail-icon"></i>
                        <span class="ap-detail-text">10:00 AM</span>
                    </div>
                    <div class="ap-detail-row">
                        <i class="fas fa-user-tie ap-detail-icon"></i>
                        <span class="ap-detail-text">Prof. Johnson</span>
                    </div>
                </div>

                <div class="ap-badge ap-badge-warning">Starts in 3 days</div>
                <button class="ap-btn ap-btn-outline w-100">
                    <i class="fas fa-eye"></i>
                    View Details
                </button>
            </div>

            <div class="ap-exam-card ap-fade-in">
                <div class="ap-exam-header">
                    <div class="ap-exam-icon science">
                        <i class="fas fa-flask"></i>
                    </div>
                    <div>
                        <div class="ap-exam-title">Basic Science</div>
                        <div class="ap-exam-subtitle">25 questions • 1.5 hours</div>
                    </div>
                </div>

                <div class="ap-exam-details">
                    <div class="ap-detail-row">
                        <i class="fas fa-calendar-alt ap-detail-icon"></i>
                        <span class="ap-detail-text">May 15, 2025</span>
                    </div>
                    <div class="ap-detail-row">
                        <i class="fas fa-clock ap-detail-icon"></i>
                        <span class="ap-detail-text">2:00 PM</span>
                    </div>
                    <div class="ap-detail-row">
                        <i class="fas fa-user-tie ap-detail-icon"></i>
                        <span class="ap-detail-text">Dr. Williams</span>
                    </div>
                </div>

                <div class="ap-badge ap-badge-warning">Starts in 8 days</div>
                <button class="ap-btn ap-btn-outline w-100">
                    <i class="fas fa-eye"></i>
                    View Details
                </button>
            </div>

            <div class="ap-exam-card ap-fade-in">
                <div class="ap-exam-header">
                    <div class="ap-exam-icon cs">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <div>
                        <div class="ap-exam-title">Computer Science 101</div>
                        <div class="ap-exam-subtitle">40 questions • 2.5 hours</div>
                    </div>
                </div>

                <div class="ap-exam-details">
                    <div class="ap-detail-row">
                        <i class="fas fa-calendar-alt ap-detail-icon"></i>
                        <span class="ap-detail-text">Today</span>
                    </div>
                    <div class="ap-detail-row">
                        <i class="fas fa-clock ap-detail-icon"></i>
                        <span class="ap-detail-text">9:00 AM</span>
                    </div>
                    <div class="ap-detail-row">
                        <i class="fas fa-user-tie ap-detail-icon"></i>
                        <span class="ap-detail-text">Prof. Anderson</span>
                    </div>
                </div>

                <div class="ap-badge ap-badge-success">Active Now</div>
                <button class="ap-btn ap-btn-primary w-100">
                    <i class="fas fa-play"></i>
                    Monitor Exam
                </button>
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
                    <div class="ap-countdown-value" id="days">03</div>
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

<!-- Footer -->
<footer class="footer">
    <div class="ap-container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div class="footer-logo mb-2 mb-md-0">
                <i class="fas fa-graduation-cap"></i>
                ePorikkha
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
