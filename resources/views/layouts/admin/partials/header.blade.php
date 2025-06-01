<!-- Header -->
<header class="admin-header">
    <div class="header-left">
        <button class="mobile-menu-btn" id="mobileMenuBtn">
            <i class="fas fa-bars"></i>
        </button>
        <h1 class="header-title">Dashboard Overview</h1>
    </div>

    <div class="header-actions">
        <div class="search-box">
            <input type="text" class="search-input" placeholder="Search students, exams...">
            <i class="fas fa-search search-icon"></i>
        </div>

        <div class="position-relative">
            <button class="notification-btn" id="notificationBtn">
                <i class="fas fa-bell"></i>
                <span class="notification-badge"></span>
            </button>

            <div class="dropdown-menu notification-dropdown" id="notificationDropdown">
                <div class="dropdown-header">
                    <div style="font-weight: 600; color: var(--text-dark);">Notifications</div>
                </div>
                <div class="notification-item unread">
                    <div class="notification-icon success">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="notification-content">
                        <div class="notification-title">SSC Mathematics Exam Completed</div>
                        <div class="notification-text">Class 10 mathematics exam completed by 45 students</div>
                        <div class="notification-time">
                            <i class="fas fa-clock"></i>
                            <span>2 minutes ago</span>
                        </div>
                    </div>
                </div>
                <div class="notification-item">
                    <div class="notification-icon info">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="notification-content">
                        <div class="notification-title">New Student Registration</div>
                        <div class="notification-text">Rahul Ahmed registered for HSC Physics exam</div>
                        <div class="notification-time">
                            <i class="fas fa-clock"></i>
                            <span>5 minutes ago</span>
                        </div>
                    </div>
                </div>
                <div class="notification-item">
                    <div class="notification-icon warning">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="notification-content">
                        <div class="notification-title">System Maintenance</div>
                        <div class="notification-text">Server maintenance scheduled for tonight at 2:00 AM</div>
                        <div class="notification-time">
                            <i class="fas fa-clock"></i>
                            <span>1 hour ago</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="position-relative">
            <div class="user-profile" id="userProfile">
                <div class="user-avatar">MR</div>
                <span class="user-name">Md. Rahman</span>
                <i class="fas fa-chevron-down" style="font-size: 0.75rem;"></i>
            </div>

            <div class="dropdown-menu" id="userDropdown">
                <div class="dropdown-header">
                    <div style="font-weight: 600;">Md. Rahman</div>
                    <div style="font-size: 0.8rem; color: var(--text-muted);">admin@eporikkha.edu.bd</div>
                </div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-question-circle"></i>
                    <span>Help</span>
                </a>
                <hr style="margin: 8px 0; border-color: var(--border-color);">
                <a href="#" class="dropdown-item">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Sign Out</span>
                </a>
            </div>
        </div>
    </div>
</header>
