<style>
    :root {
        /* Color Palette - Modernized */
        --primary: #3b82f6;
        --primary-dark: #2563eb;
        --primary-light: #60a5fa;
        --primary-bg: rgba(59, 130, 246, 0.08);
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
        --dark: #0f172a;
        --light: #f8fafc;
        --body-bg: #f8fafc;
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
        --sidebar-width: 260px;
        --border-radius-sm: 0.375rem;
        --border-radius: 0.5rem;
        --border-radius-lg: 0.75rem;
        --border-radius-xl: 1rem;
        --border-radius-2xl: 1.5rem;

        /* Shadows */
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);

        /* Transitions */
        --transition-normal: all 0.3s ease;
        --transition-fast: all 0.15s ease;
    }

    /* Base Styles */
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: var(--body-bg);
        color: var(--gray-700);
        overflow-x: hidden;
        line-height: 1.6;
        position: relative;
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
        0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4); }
        70% { box-shadow: 0 0 0 10px rgba(59, 130, 246, 0); }
        100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
    }

    @keyframes shine {
        0% { transform: translateX(-100%); }
        20%, 100% { transform: translateX(100%); }
    }

    .stat-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        will-change: transform;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .stat-icon {
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

    .exam-item {
        transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        will-change: transform;
    }

    .exam-item:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary-light);
    }

    .exam-item:hover::before {
        opacity: 1;
        height: 100%;
    }

    /* Navbar Styles */
    .navbar {
        padding: 0.75rem 1.5rem;
        background-color: white;
        box-shadow: var(--shadow);
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        height: var(--header-height);
        transition: var(--transition-normal);
    }

    .navbar-brand {
        font-weight: 800;
        font-size: 1.5rem;
        letter-spacing: -0.5px;
        text-decoration: none;
        position: relative;
        z-index: 2;
    }

    .navbar-brand span:first-child {
        color: var(--primary);
    }

    .navbar-brand span:last-child {
        color: var(--secondary);
        position: relative;
    }

    .navbar-brand span:last-child::after {
        content: '';
        position: absolute;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background-color: var(--accent);
        bottom: 5px;
        right: -8px;
    }

    .navbar-search {
        position: relative;
        width: 300px;
        margin-left: 2rem;
    }

    .navbar-search .search-input {
        width: 100%;
        padding: 0.65rem 1rem 0.65rem 2.75rem;
        border-radius: var(--border-radius-lg);
        border: 1px solid var(--gray-200);
        background-color: var(--gray-50);
        font-size: 0.9rem;
        transition: var(--transition-normal);
        color: var(--gray-700);
    }

    .navbar-search .search-input:focus {
        background-color: white;
        border-color: var(--primary-light);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
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

    .navbar-toggler {
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
    }

    .navbar-toggler:focus {
        box-shadow: none;
    }

    /* Main Content Styles */
    .main-content {
        padding-top: calc(var(--header-height) - 2rem);
        min-height: 100vh;
        position: relative;
    }

    .dashboard-container {
        padding: 0 1.5rem 2rem;
        max-width: 1400px;
        margin: 0 auto;
    }

    @media (max-width: 767.98px) {
        .main-content {
            padding-top: 1rem;
        }

        .dashboard-container {
            padding: 0 1rem 2rem;
        }
    }

    @media (max-width: 575.98px) {
        .dashboard-container {
            padding: 0 0.75rem 2rem;
        }
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
        transform: translateY(-3px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary-light);
    }

    .exam-item:hover::before {
        opacity: 1;
        height: 100%;
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

    @media (max-width: 767.98px) {
        .exam-info {
            flex-direction: column;
            align-items: flex-start;
        }

        .exam-info span {
            margin-right: 0;
            margin-bottom: 0.5rem;
        }
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
        box-shadow: 0 8px 15px rgba(37, 99, 235, 0.2);
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
        box-shadow: 0 8px 15px rgba(37, 99, 235, 0.2);
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

    .status-badge {
        padding: 0.35rem 1rem;
        border-radius: 50rem;
        font-size: 0.75rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        margin-left: 0.75rem;
        box-shadow: var(--shadow-sm);
        letter-spacing: 0.3px;
        text-transform: uppercase;
        white-space: nowrap;


    }

    .status-badge.available {
        background-color: var(--success-bg);
        color: var(--success);
    }

    .status-badge.scheduled {
        background-color: var(--warning-bg);
        color: var(--warning);
    }

    .status-badge.completed {
        background-color: var(--gray-100);
        color: var(--gray-600);
    }

    .status-badge.in-progress {
        background-color: var(--danger-bg);
        color: var(--danger);
        animation: pulse 1.5s infinite;
    }

    .status-badge.expired {
        background-color: var(--gray-100);
        color: var(--gray-600);
    }

    .status-badge i {
        margin-right: 0.35rem;
        font-size: 0.8rem;
    }

    /* ============ MODERN WELCOME SECTION ============ */

    /* Welcome Card */
    .welcome-card {
        position: relative;
        border-radius: var(--border-radius-xl);
        overflow: hidden;
        margin-bottom: 2rem;
        background: white;
        box-shadow: var(--shadow-md);
        transition: var(--transition-normal);
    }

    .welcome-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .welcome-card__background {
        position: absolute;
        top: 0;
        right: 0;
        width: 50%;
        height: 100%;
        background: linear-gradient(135deg, var(--primary-bg) 0%, transparent 100%);
        opacity: 0.7;
        z-index: 1;
    }

    .welcome-card__decoration {
        position: absolute;
        top: 20px;
        right: 50px;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-light) 0%, var(--secondary) 100%);
        opacity: 0.1;
        z-index: 1;
    }

    .welcome-card__decoration:after {
        content: '';
        position: absolute;
        top: -30px;
        right: -30px;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--secondary) 0%, var(--primary-light) 100%);
        opacity: 0.2;
    }

    .welcome-card__content {
        position: relative;
        z-index: 2;
        padding: 2.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }

    .welcome-card__left {
        max-width: 60%;
    }

    @media (max-width: 991.98px) {
        .welcome-card__content {
            padding: 1.5rem;
        }
        .welcome-card__left {
            max-width: 100%;
            margin-bottom: 1.5rem;
        }
    }

    @media (max-width: 575.98px) {
        .welcome-card__content {
            padding: 1.25rem;
        }
    }

    .welcome-card__right {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }

    @media (max-width: 991.98px) {
        .welcome-card__right {
            width: 100%;
            align-items: center;
        }

        .welcome-card__illustration {
            margin-top: 1rem;
        }
    }

    .welcome-title {
        font-size: 2.25rem;
        font-weight: 800;
        color: var(--gray-900);
        margin-bottom: 0.75rem;
        position: relative;
        display: inline-block;
        background: linear-gradient(to right, var(--gray-900), var(--primary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: fadeInUp 0.6s ease;
    }

    .welcome-subtitle {
        font-size: 1.1rem;
        color: var(--gray-600);
        margin-bottom: 1.5rem;
        max-width: 80%;
        animation: fadeInUp 0.8s ease;
    }

    @media (max-width: 991.98px) {
        .welcome-title {
            font-size: 1.8rem;
        }

        .welcome-subtitle {
            font-size: 1rem;
            max-width: 100%;
        }
    }

    @media (max-width: 575.98px) {
        .welcome-title {
            font-size: 1.5rem;
        }

        .welcome-subtitle {
            font-size: 0.9rem;
        }
    }

    .welcome-actions {
        display: flex;
        gap: 1rem;
        animation: fadeInUp 1s ease;
        flex-wrap: wrap;
    }

    .btn-welcome {
        padding: 0.75rem 1.5rem;
        border-radius: var(--border-radius-lg);
        font-weight: 600;
        font-size: 0.95rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: var(--transition-normal);
        box-shadow: var(--shadow);
    }

    @media (max-width: 767.98px) {
        .welcome-actions {
            gap: 0.75rem;
        }

        .btn-welcome {
            padding: 0.6rem 1.25rem;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 575.98px) {
        .welcome-actions {
            flex-direction: column;
            width: 100%;
        }

        .btn-welcome {
            width: 100%;
            justify-content: center;
            margin-bottom: 0.5rem;
        }
    }

    .btn-primary-gradient {
        background: linear-gradient(to right, var(--primary), var(--primary-dark));
        color: white;
        border: none;
    }

    .btn-primary-gradient:hover {
        background: linear-gradient(to right, var(--primary-dark), var(--primary));
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
        color: white;
    }

    .btn-outline {
        background: transparent;
        color: var(--primary);
        border: 2px solid var(--primary-light);
    }

    .btn-outline:hover {
        background-color: var(--primary-bg);
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
        color: var(--primary);
        border-color: var(--primary);
    }

    .welcome-card__stats {
        display: flex;
        gap: 1.5rem;
        margin-top: 1.5rem;
        margin-bottom: 0.5rem;
        flex-wrap: wrap;
    }

    .welcome-stat {
        text-align: center;
        padding: 1rem 1.5rem;
        background-color: white;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow);
        transition: var(--transition-normal);
        border: 1px solid var(--gray-100);
        animation: fadeInUp 1.2s ease;
    }

    @media (max-width: 767.98px) {
        .welcome-card__stats {
            gap: 1rem;
            justify-content: center;
            margin-top: 1rem;
        }

        .welcome-stat {
            padding: 0.75rem 1rem;
        }
    }

    @media (max-width: 575.98px) {
        .welcome-card__stats {
            flex-direction: column;
            width: 100%;
        }

        .welcome-stat {
            width: 100%;
        }
    }

    .welcome-stat:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
        border-color: var(--primary-light);
    }

    .welcome-stat__value {
        font-size: 1.75rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 0.25rem;
        background: linear-gradient(to right, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .welcome-stat__label {
        font-size: 0.8rem;
        color: var(--gray-600);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .welcome-card__illustration {
        width: 200px;
        height: 200px;
        background-color: var(--gray-50);
        border-radius: var(--border-radius-xl);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        animation: fadeIn 1s ease;
    }

    @media (max-width: 991.98px) {
        .welcome-card__illustration {
            width: 180px;
            height: 180px;
        }
    }

    @media (max-width: 575.98px) {
        .welcome-card__illustration {
            width: 150px;
            height: 150px;
        }
    }

    .welcome-card__date {
        position: absolute;
        bottom: 1.5rem;
        right: 2.5rem;
        background-color: white;
        border-radius: var(--border-radius);
        padding: 0.5rem 1rem;
        box-shadow: var(--shadow);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.85rem;
        color: var(--gray-600);
        border: 1px solid var(--gray-100);
        transition: var(--transition-normal);
        animation: fadeInUp 1.4s ease;
        max-width: 45%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    @media (max-width: 767.98px) {
        .welcome-card__date {
            right: 1.5rem;
            bottom: 1rem;
            padding: 0.4rem 0.8rem;
            font-size: 0.8rem;
        }
    }

    @media (max-width: 575.98px) {
        .welcome-card__date {
            right: 1rem;
            bottom: 1rem;
            padding: 0.35rem 0.7rem;
            font-size: 0.75rem;
            max-width: 35%;
        }
    }

    @media (max-width: 400px) {
        .welcome-card__date {
            max-width: 60%;
            bottom: -0.5rem;
            right: auto;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 1rem;
            text-align: center;
            justify-content: center;
        }

        .welcome-card__date:hover {
            transform: translateX(-50%) translateY(-3px);
        }

        /* Hide day name on very small screens */
        .welcome-card__date .date-text::before {
            content: 'May 22, 2025';
            display: block;
        }

        .welcome-card__date .date-text {
            font-size: 0;
            line-height: 0;
        }
    }

    .welcome-card__date:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
        color: var(--primary);
        border-color: var(--primary-light);
        background-color: var(--primary-bg);
    }

    .welcome-card__date i {
        color: var(--primary);
    }

    .welcome-card__date .date-text {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    @media (max-width: 575.98px) {
        .welcome-card__date .date-text {
            max-width: 100px;
        }
    }

    @media (max-width: 400px) {
        .welcome-card__date .date-text {
            max-width: 150px;
        }
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

    @media (max-width: 575.98px) {
        .result-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .result-title {
            margin-bottom: 0.5rem;
        }

        .result-info span {
            margin-bottom: 0.5rem;
        }
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

    @keyframes progressShine {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
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

    /* Notification List */
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

    @media (max-width: 575.98px) {
        .notification-item {
            flex-direction: column;
        }

        .notification-icon {
            margin-bottom: 0.75rem;
        }

        .notification-time {
            margin-left: 0;
            margin-top: 0.5rem;
            align-self: flex-end;
        }
    }

    .notification-time {
        font-size: 0.75rem;
        color: var(--gray-500);
        margin-left: 0.75rem;
        white-space: nowrap;
        font-weight: 500;
        background-color: var(--gray-100);
        padding: 0.25rem 0.5rem;
        border-radius: var(--border-radius-sm);
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
        background-clip: text;
        color: transparent;
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

    @media (max-width: 767.98px) {
        .calendar-grid {
            gap: 0.25rem;
        }
    }

    @media (max-width: 575.98px) {
        .calendar-grid {
            gap: 0.15rem;
        }
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

    @media (max-width: 767.98px) {
        .calendar-day-content {
            font-size: 0.75rem;
        }
    }

    @media (max-width: 575.98px) {
        .calendar-day-content {
            font-size: 0.7rem;
        }
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

    @media (max-width: 767.98px) {
        .footer {
            padding: 1.5rem 0;
            margin-top: 1.5rem;
        }

        .footer-content {
            padding: 0 1rem;
        }
    }

    @media (max-width: 575.98px) {
        .footer {
            padding: 1.25rem 0;
            margin-top: 1rem;
        }
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

    @media (max-width: 767.98px) {
        .footer-nav a {
            margin: 0 0.75rem 0.75rem;
        }
    }

    @media (max-width: 575.98px) {
        .footer-nav {
            flex-direction: column;
            text-align: center;
        }

        .footer-nav a {
            margin: 0.5rem 0;
        }
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

    @media (max-width: 575.98px) {
        .footer-social-link {
            width: 32px;
            height: 32px;
            font-size: 0.85rem;
        }
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
        .navbar-search {
            display: none;
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
        /* Improved padding/spacing for mobile */
        .dashboard-container {
            padding: 1rem;
        }



        .welcome-message {
            font-size: 1.5rem;
        }

        .welcome-subtitle {
            font-size: 0.9rem;
        }

        /* Better stat card layout */
        .stat-card {
            margin-bottom: 1rem;
            padding: 1.25rem;
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }

        .stat-title {
            font-size: 0.8rem;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            font-size: 1.5rem;
        }

        /* Better exam item layout */
        .exam-item {
            padding: 1.25rem;
            flex-direction: column;
            align-items: flex-start;
        }

        .exam-icon {
            margin-bottom: 1rem;
            width: 45px;
            height: 45px;
        }

        .exam-title {
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .exam-info {
            margin-bottom: 1rem;
        }

        .exam-info span {
            margin-bottom: 0.5rem;
        }

        .exam-actions {
            width: 100%;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
            margin-left: 0;
            flex-wrap: wrap;
        }

        .status-badge {
            margin-left: 0;
            margin-bottom: 0.5rem;
        }



        /* Better calendar layout */
        .calendar-grid {
            gap: 0.25rem;
        }

        .calendar-weekday {
            font-size: 0.7rem;
        }

        .calendar-day-content {
            font-size: 0.8rem;
        }

        /* Better notification layout */
        .notification-item {
            padding: 1rem 0;
        }

        .notification-icon {
            width: 38px;
            height: 38px;
            font-size: 0.9rem;
        }

        .notification-title {
            font-size: 0.9rem;
        }

        .notification-text {
            font-size: 0.8rem;
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
    }

    /*  Responsive Styles*/


    .sticky-top {
        position: relative;
        z-index: 1020;
    }

    /* Page Header Styles - Fix for welcome message */
    .page-header {
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;
        padding: 1.25rem;
        background-color: white;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-sm);
        z-index: 1;
        position: relative;
        display: block !important;
        visibility: visible !important;
    }

    .welcome-message {
        font-size: 1.75rem;
        font-weight: 800;
        color: var(--gray-900);
        margin-bottom: 0.5rem;
        display: block !important;
    }

    .welcome-subtitle {
        font-size: 1rem;
        color: var(--gray-600);
        display: block !important;
        visibility: visible !important;
    }

    /* Mobile styles */
    @media (max-width: 991.98px) {
        /* Bottom padding for mobile bottom nav */
        body {
            padding-bottom: 60px;
        }

        .main-content {
            padding-top: 1rem;
            padding-bottom: 70px;
        }

        .footer {
            margin-bottom: 60px;
            padding-bottom: 2rem;
        }

        /* Mobile Bottom Tabs Navigation */
        .mobile-tabs {
            display: flex;
            background-color: white;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.05);
            z-index: 1000;
        }

        .mobile-tab {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px 0;
            color: var(--gray-600);
            text-decoration: none;
            font-size: 0.7rem;
            position: relative;
        }

        .mobile-tab i {
            font-size: 1.2rem;
            margin-bottom: 4px;
        }

        .mobile-tab.active {
            color: var(--primary);
        }

        .mobile-tab .badge {
            position: absolute;
            top: 4px;
            right: calc(50% - 12px);
            font-size: 0.6rem;
            padding: 0.15rem 0.35rem;
        }

        /* Clean card styles for mobile */
        .card-dashboard, .stat-card {
            background-color: white !important;
            border: 1px solid var(--gray-100) !important;
        }

        .page-header {
            background-color: white;
            padding: 1rem;
            border-radius: var(--border-radius-lg);
            margin-bottom: 1rem;
            box-shadow: var(--shadow-sm);
        }
    }

    /* Desktop styles */
    @media (min-width: 992px) {
        .mobile-tabs {
            display: none;
        }

        .navbar-nav .nav-link {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            background-color: var(--gray-50);
        }

        .navbar-nav .nav-link.active {
            background-color: var(--primary-bg);
            color: var(--primary);
        }
    }

    /* Nav Buttons with Animated Hover */
    .navbar-nav .nav-link {
        position: relative;
        margin: 0 0.3rem;
        padding: 0.7rem 1.2rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        color: var(--gray-700);
        overflow: hidden;
        z-index: 1;
    }

    /* Animated Background Hover Effect */
    .navbar-nav .nav-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: var(--primary-bg);
        border-radius: 8px;
        z-index: -1;
        transform: translateX(-100%);
        transition: transform 0.4s ease;
    }

    .navbar-nav .nav-link:hover::before {
        transform: translateX(0);
    }

    .navbar-nav .nav-link:hover {
        color: var(--primary);
        transform: translateY(-2px);
    }

    /* Animated Underline */
    .navbar-nav .nav-link::after {
        content: '';
        position: absolute;
        bottom: 6px;
        left: 50%;
        width: 0;
        height: 3px;
        border-radius: 3px;
        background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
        transition: all 0.4s ease;
        opacity: 0;
        transform: translateX(-50%);
    }

    .navbar-nav .nav-link:hover::after {
        width: 24px;
        opacity: 1;
    }

    /* Active State */
    .navbar-nav .nav-link.active {
        color: var(--primary);
        background-color: var(--primary-bg);
        font-weight: 700;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.1);
    }

    .navbar-nav .nav-link.active::before {
        transform: translateX(0);
    }

    .navbar-nav .nav-link.active::after {
        content: '';
        width: 24px;
        opacity: 1;
    }

    /* Mobile Navigation with Animation */
    .offcanvas-body .nav-link {
        padding: 0.75rem 1.2rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        margin-bottom: 0.4rem;
        position: relative;
        overflow: hidden;
    }

    .offcanvas-body .nav-link::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 4px;
        background: linear-gradient(to bottom, var(--primary), var(--secondary));
        transform: scaleY(0);
        transition: transform 0.4s ease;
        transform-origin: top;
    }

    .offcanvas-body .nav-link:hover::before {
        transform: scaleY(1);
    }

    .offcanvas-body .nav-link:hover {
        background-color: var(--primary-bg);
        color: var(--primary);
        padding-left: 1.5rem;
    }

    .offcanvas-body .nav-link.active {
        color: var(--primary);
        background-color: var(--primary-bg);
        font-weight: 700;
        padding-left: 1.5rem;
    }

    .offcanvas-body .nav-link.active::before {
        transform: scaleY(1);
    }

    /* Mobile Bottom Tabs Animation */
    .mobile-tab {
        transition: all 0.3s ease;
        position: relative;
    }

    .mobile-tab::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 50%;
        width: 0;
        height: 3px;
        border-radius: 3px;
        background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
        transition: all 0.4s ease;
        opacity: 0;
        transform: translateX(-50%);
    }

    .mobile-tab:hover i {
        transform: translateY(-3px);
        transition: transform 0.3s ease;
        color: var(--primary);
    }

    .mobile-tab.active {
        color: var(--primary);
        font-weight: 600;
    }

    .mobile-tab.active i {
        transform: translateY(-3px);
    }

    .mobile-tab.active::after {
        width: 20px;
        opacity: 1;
    }

    /* Optional animation for icon in nav link */
    .navbar-nav .nav-link i,
    .offcanvas-body .nav-link i {
        transition: transform 0.3s ease;
        display: inline-block;
        margin-right: 5px;
    }

    .navbar-nav .nav-link:hover i,
    .offcanvas-body .nav-link:hover i {
        transform: translateY(-2px);
    }


    /* Improved notification time styling */
    .notification-time {
        font-size: 0.75rem;
        color: var(--gray-500);
        margin-left: 0.75rem;
        white-space: nowrap;
        font-weight: 500;
        /* Remove the background and make it inline */
        background-color: transparent;
        padding: 0;
        border-radius: 0;
        /* Add a subtle separator */
        position: relative;
    }

    .notification-time::before {
        content: '•';
        margin-right: 0.5rem;
        opacity: 0.5;
    }

    /* Improved exam actions layout */
    .exam-actions {
        display: flex;
        align-items: center;
        margin-left: auto;
        white-space: nowrap;
    }

    /* Status badge adjustments */
    .status-badge {
        margin-left: 0;
        margin-right: 0.75rem;
    }

    /* Make details button more subtle */
    .btn-outline-primary.btn-sm {
        padding: 0.4rem 0.8rem;
        border-width: 1px;
        font-size: 0.8rem;
        line-height: 1;
    }
</style>

<link rel="stylesheet" href="{{ asset('css/participant.css') }}">
<link rel="stylesheet" href="{{ asset('css/participant-responsive.css') }}">
<link rel="stylesheet" href="{{ asset('css/participant-custom.css') }}">
<link rel="stylesheet" href="{{ asset('css/participant-animations.css') }}">
<link rel="stylesheet" href="{{ asset('css/participant-icons.css') }}">
<link rel="stylesheet" href="{{ asset('css/participant-utilities.css') }}">
<link rel="stylesheet" href="{{ asset('css/participant-variables.css') }}">
