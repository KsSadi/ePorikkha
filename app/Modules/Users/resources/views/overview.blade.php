@extends('layouts.admin.app')
@push('styles')
<style>
    .action-buttons {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .action-btn {
        width: 32px;
        height: 32px;
        border: 1px solid var(--border-color);
        background: white;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
        font-size: 0.875rem;
    }

    .action-btn:hover {
        background: var(--light-gray);
    }

    .action-btn.view {
        color: var(--accent-color);
    }

    .action-btn.edit {
        color: var(--primary-color);
    }

    .action-btn.delete {
        color: var(--danger-color);
    }

    .action-btn.more {
        color: var(--text-muted);
    }
</style>
@endpush

{{--
@section('content')
    <!-- Content -->
    <main class="admin-content">
        <!-- User Statistics Cards -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="dashboard-card stat-card primary">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number">3,284</div>
                    <div class="stat-label">Total Users</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i>
                        <span>+15% from last month</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="dashboard-card stat-card success">
                    <div class="stat-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="stat-number">2,847</div>
                    <div class="stat-label">Students</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i>
                        <span>+32% from last month</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="dashboard-card stat-card warning">
                    <div class="stat-icon">
                        <i class="fa-solid fa-user-astronaut"></i>
                    </div>
                    <div class="stat-number">387</div>
                    <div class="stat-label">Instructors</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i>
                        <span>+8% from last month</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="dashboard-card stat-card warning">
                    <div class="stat-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="stat-number">142</div>
                    <div class="stat-label">Evaluators</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i>
                        <span>+5% from last month</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Type Distribution -->
        <div class="row mb-4">
            <div class="col-xl-8 mb-4">
                <div class="user-management-card">
                    <div class="card-header-custom">
                        <h5 class="card-title">User Type Distribution</h5>
                        <button class="btn-primary-custom">
                            <i class="fas fa-download"></i>
                            Export Report
                        </button>
                    </div>

                    <div class="row">
                        <div class="col-md-3 text-center mb-3">
                            <div class="stat-icon" style="margin: 0 auto 16px; width: 64px; height: 64px; background: linear-gradient(135deg, var(--danger-color), #f87171);">
                                <i class="fas fa-user-shield" style="font-size: 1.5rem;"></i>
                            </div>
                            <div class="stat-number" style="font-size: 2rem; margin-bottom: 4px;">8</div>
                            <div class="stat-label" style="margin-bottom: 8px;">Admins</div>
                            <div class="user-role-badge role-admin">Super Users</div>
                        </div>
                        <div class="col-md-3 text-center mb-3">
                            <div class="stat-icon" style="margin: 0 auto 16px; width: 64px; height: 64px;background: var(--primary-color);">
                                <i class="fas fa-chalkboard-teacher" style="font-size: 1.5rem;"></i>
                            </div>
                            <div class="stat-number" style="font-size: 2rem; margin-bottom: 4px;">387</div>
                            <div class="stat-label" style="margin-bottom: 8px;">Instructors</div>
                            <div class="user-role-badge role-instructor">Content Creators</div>
                        </div>
                        <div class="col-md-3 text-center mb-3">
                            <div class="stat-icon" style="margin: 0 auto 16px; width: 64px; height: 64px; background: linear-gradient(135deg, var(--warning-color), #fbbf24);">
                                <i class="fas fa-user-check" style="font-size: 1.5rem;"></i>
                            </div>
                            <div class="stat-number" style="font-size: 2rem; margin-bottom: 4px;">142</div>
                            <div class="stat-label" style="margin-bottom: 8px;">Evaluators</div>
                            <div class="user-role-badge role-evaluator">Graders</div>
                        </div>
                        <div class="col-md-3 text-center mb-3">
                            <div class="stat-icon" style="margin: 0 auto 16px; width: 64px; height: 64px; background: linear-gradient(135deg, var(--accent-color), #38bdf8);">
                                <i class="fas fa-user-graduate" style="font-size: 1.5rem;"></i>
                            </div>
                            <div class="stat-number" style="font-size: 2rem; margin-bottom: 4px;">2,847</div>
                            <div class="stat-label" style="margin-bottom: 8px;">Students</div>
                            <div class="user-role-badge role-student">Test Takers</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 mb-4">
                <div class="user-management-card">
                    <div class="card-header-custom">
                        <h5 class="card-title">User Status Overview</h5>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="filter-label">Active Users</span>
                            <span class="badge bg-success">2,956</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-success" style="width: 90%"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="filter-label">Pending Approval</span>
                            <span class="badge bg-warning">186</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" style="width: 6%"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="filter-label">Suspended</span>
                            <span class="badge bg-danger">97</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-danger" style="width: 3%"></div>
                        </div>
                    </div>

                    <div class="mb-0">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="filter-label">Inactive</span>
                            <span class="badge bg-secondary">45</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-secondary" style="width: 1%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters Section -->
        <div class="filters-section">
            <div class="filter-group">
                <div class="filter-item">
                    <label class="filter-label">Search Users</label>
                    <input type="text" class="filter-input" placeholder="Name, email or ID..." id="searchUsers">
                </div>
                <div class="filter-item">
                    <label class="filter-label">User Role</label>
                    <select class="filter-select" id="filterRole">
                        <option value="">All Roles</option>
                        <option value="admin">Admin</option>
                        <option value="instructor">Instructor</option>
                        <option value="evaluator">Evaluator</option>
                        <option value="student">Student</option>
                    </select>
                </div>
                <div class="filter-item">
                    <label class="filter-label">Status</label>
                    <select class="filter-select" id="filterStatus">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="pending">Pending</option>
                        <option value="suspended">Suspended</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="filter-item">
                    <label class="filter-label">Institution</label>
                    <select class="filter-select" id="filterInstitution">
                        <option value="">All Institutions</option>
                        <option value="dhaka-college">Dhaka College</option>
                        <option value="notre-dame">Notre Dame College</option>
                        <option value="rajuk-college">RAJUK Uttara Model College</option>
                    </select>
                </div>
                <div class="filter-item">
                    <label class="filter-label">Join Date</label>
                    <select class="filter-select" id="filterDate">
                        <option value="">All Time</option>
                        <option value="today">Today</option>
                        <option value="week">This Week</option>
                        <option value="month">This Month</option>
                        <option value="quarter">Last 3 Months</option>
                    </select>
                </div>
                <div class="filter-item">
                    <label class="filter-label" style="opacity: 0;">Actions</label>
                    <button class="btn-primary-custom" id="applyFilters">
                        <i class="fas fa-filter"></i>
                        Apply Filters
                    </button>
                </div>
                <div class="filter-item">
                    <label class="filter-label" style="opacity: 0;">Reset</label>
                    <button class="btn-secondary-custom" id="resetFilters">
                        <i class="fas fa-times"></i>
                        Clear All
                    </button>
                </div>
            </div>
        </div>

        <!-- User Type Tabs -->
        <div class="user-type-tabs">
            <button class="tab-btn active" data-tab="all">
                <i class="fas fa-users"></i>
                <span>All Users</span>
                <span class="tab-count">3,284</span>
            </button>
            <button class="tab-btn" data-tab="admin">
                <i class="fas fa-user-shield"></i>
                <span>Admins</span>
                <span class="tab-count">8</span>
            </button>
            <button class="tab-btn" data-tab="instructor">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Instructors</span>
                <span class="tab-count">387</span>
            </button>
            <button class="tab-btn" data-tab="evaluator">
                <i class="fas fa-user-check"></i>
                <span>Evaluators</span>
                <span class="tab-count">142</span>
            </button>
            <button class="tab-btn" data-tab="student">
                <i class="fas fa-user-graduate"></i>
                <span>Students</span>
                <span class="tab-count">2,847</span>
            </button>
        </div>

        <!-- Users Table -->
        <div class="users-table-container">
            <div class="table-header">
                <h5 class="table-title">User Management</h5>
                <div class="table-actions">
                    <button class="btn-secondary-custom">
                        <i class="fas fa-download"></i>
                        Export
                    </button>
                    <button class="btn-primary-custom">
                        <i class="fas fa-user-plus"></i>
                        Add New User
                    </button>
                </div>
            </div>

            <div class="bulk-actions" id="bulkActions">
                <div class="bulk-actions-text">
                    <span id="selectedCount">5</span> users selected
                </div>
                <div class="bulk-actions-buttons">
                    <button class="btn-secondary-custom">
                        <i class="fas fa-envelope"></i>
                        Send Email
                    </button>
                    <button class="btn-secondary-custom">
                        <i class="fas fa-ban"></i>
                        Suspend
                    </button>
                    <button class="btn-secondary-custom">
                        <i class="fas fa-check"></i>
                        Activate
                    </button>
                    <button class="btn-secondary-custom" style="color: var(--danger-color);">
                        <i class="fas fa-trash"></i>
                        Delete
                    </button>
                </div>
            </div>

            <table class="users-table">
                <thead>
                <tr>
                    <th>
                        <input type="checkbox" id="selectAll">
                    </th>
                    <th>User</th>
                    <th>Role</th>
                    <th>Institution</th>
                    <th>Status</th>
                    <th>Points</th>
                    <th>Last Activity</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <input type="checkbox" class="user-checkbox">
                    </td>
                    <td>
                        <div class="user-info">
                            <div class="user-avatar-table">MR</div>
                            <div class="user-details">
                                <div class="user-name-table">Md. Rahman</div>
                                <div class="user-email">admin@eporikkha.edu.bd</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="user-role-badge role-admin">Admin</span>
                    </td>
                    <td>System Admin</td>
                    <td>
                        <span class="status-badge status-active">Active</span>
                    </td>
                    <td>∞</td>
                    <td>2 minutes ago</td>
                    <td>
                        <div class="action-buttons">
                            <button class="action-btn view" title="View Profile">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="action-btn edit" title="Edit User">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="action-btn more" title="More Actions">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="user-checkbox">
                    </td>
                    <td>
                        <div class="user-info">
                            <div class="user-avatar-table">DR</div>
                            <div class="user-details">
                                <div class="user-name-table">Dr. Rashida Begum</div>
                                <div class="user-email">dr.rashida@dhakacolege.edu.bd</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="user-role-badge role-instructor">Instructor</span>
                    </td>
                    <td>Dhaka College</td>
                    <td>
                        <span class="status-badge status-active">Active</span>
                    </td>
                    <td>1,250</td>
                    <td>15 minutes ago</td>
                    <td>
                        <div class="action-buttons">
                            <button class="action-btn view" title="View Profile">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="action-btn edit" title="Edit User">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="action-btn more" title="More Actions">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="user-checkbox">
                    </td>
                    <td>
                        <div class="user-info">
                            <div class="user-avatar-table">MA</div>
                            <div class="user-details">
                                <div class="user-name-table">Prof. Mahbub Alam</div>
                                <div class="user-email">mahbub.alam@notredame.edu.bd</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="user-role-badge role-evaluator">Evaluator</span>
                    </td>
                    <td>Notre Dame College</td>
                    <td>
                        <span class="status-badge status-active">Active</span>
                    </td>
                    <td>875</td>
                    <td>1 hour ago</td>
                    <td>
                        <div class="action-buttons">
                            <button class="action-btn view" title="View Profile">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="action-btn edit" title="Edit User">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="action-btn more" title="More Actions">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="user-checkbox">
                    </td>
                    <td>
                        <div class="user-info">
                            <div class="user-avatar-table">RA</div>
                            <div class="user-details">
                                <div class="user-name-table">Rahul Ahmed</div>
                                <div class="user-email">rahul.ahmed.2024@student.edu.bd</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="user-role-badge role-student">Student</span>
                    </td>
                    <td>RAJUK Uttara Model College</td>
                    <td>
                        <span class="status-badge status-active">Active</span>
                    </td>
                    <td>0</td>
                    <td>3 hours ago</td>
                    <td>
                        <div class="action-buttons">
                            <button class="action-btn view" title="View Profile">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="action-btn edit" title="Edit User">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="action-btn more" title="More Actions">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="user-checkbox">
                    </td>
                    <td>
                        <div class="user-info">
                            <div class="user-avatar-table">FK</div>
                            <div class="user-details">
                                <div class="user-name-table">Fatima Khan</div>
                                <div class="user-email">fatima.khan@instructor.edu.bd</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="user-role-badge role-instructor">Instructor</span>
                    </td>
                    <td>Viqarunnisa Noon College</td>
                    <td>
                        <span class="status-badge status-pending">Pending</span>
                    </td>
                    <td>500</td>
                    <td>1 day ago</td>
                    <td>
                        <div class="action-buttons">
                            <button class="action-btn view" title="View Profile">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="action-btn edit" title="Edit User">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="action-btn more" title="More Actions">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" class="user-checkbox">
                    </td>
                    <td>
                        <div class="user-info">
                            <div class="user-avatar-table">SI</div>
                            <div class="user-details">
                                <div class="user-name-table">Sadia Islam</div>
                                <div class="user-email">sadia.islam.2024@student.edu.bd</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="user-role-badge role-student">Student</span>
                    </td>
                    <td>Holy Cross College</td>
                    <td>
                        <span class="status-badge status-suspended">Suspended</span>
                    </td>
                    <td>0</td>
                    <td>2 days ago</td>
                    <td>
                        <div class="action-buttons">
                            <button class="action-btn view" title="View Profile">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="action-btn edit" title="Edit User">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="action-btn delete" title="Delete User">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

            <div class="pagination-container">
                <div class="pagination-info">
                    Showing 1 to 6 of 3,284 users
                </div>
                <div class="pagination-controls">
                    <button class="pagination-btn disabled">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="pagination-btn active">1</button>
                    <button class="pagination-btn">2</button>
                    <button class="pagination-btn">3</button>
                    <button class="pagination-btn">...</button>
                    <button class="pagination-btn">328</button>
                    <button class="pagination-btn">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </main>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elements
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const sidebarClose = document.getElementById('sidebarClose');
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const notificationBtn = document.getElementById('notificationBtn');
            const notificationDropdown = document.getElementById('notificationDropdown');
            const userProfile = document.getElementById('userProfile');
            const userDropdown = document.getElementById('userDropdown');

            // User management elements
            const selectAllCheckbox = document.getElementById('selectAll');
            const userCheckboxes = document.querySelectorAll('.user-checkbox');
            const bulkActions = document.getElementById('bulkActions');
            const selectedCount = document.getElementById('selectedCount');
            const tabBtns = document.querySelectorAll('.tab-btn');
            const applyFiltersBtn = document.getElementById('applyFilters');
            const resetFiltersBtn = document.getElementById('resetFilters');

            // Mobile menu functions
            function openSidebar() {
                sidebar.classList.add('show');
                overlay.classList.add('show');
            }

            function closeSidebar() {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
            }

            // Mobile menu events
            mobileMenuBtn.addEventListener('click', openSidebar);
            sidebarClose.addEventListener('click', closeSidebar);
            overlay.addEventListener('click', closeSidebar);

            // Submenu functionality
            document.querySelectorAll('.nav-item.has-submenu').forEach(item => {
                const link = item.querySelector('.nav-link');
                const submenu = item.querySelector('.submenu');

                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Close other submenus
                    document.querySelectorAll('.nav-item.has-submenu').forEach(otherItem => {
                        if (otherItem !== item) {
                            otherItem.classList.remove('open');
                            otherItem.querySelector('.submenu').classList.remove('open');
                        }
                    });

                    // Toggle current submenu
                    item.classList.toggle('open');
                    submenu.classList.toggle('open');
                });
            });

            // Notification dropdown
            notificationBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                notificationDropdown.classList.toggle('show');
                userDropdown.classList.remove('show');
            });

            // User profile dropdown
            userProfile.addEventListener('click', function(e) {
                e.stopPropagation();
                userDropdown.classList.toggle('show');
                notificationDropdown.classList.remove('show');
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', function() {
                notificationDropdown.classList.remove('show');
                userDropdown.classList.remove('show');
            });

            // Navigation active states
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    const hasSubmenu = this.closest('.nav-item.has-submenu') &&
                        this.closest('.nav-item.has-submenu').querySelector('.nav-link') === this;

                    if (!hasSubmenu) {
                        e.preventDefault();
                        document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                        this.classList.add('active');

                        // Close mobile menu
                        if (window.innerWidth <= 768) {
                            closeSidebar();
                        }
                    }
                });
            });

            // Select all functionality
            selectAllCheckbox.addEventListener('change', function() {
                userCheckboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
                updateBulkActions();
            });

            // Individual checkbox functionality
            userCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    // Update select all checkbox
                    const checkedBoxes = document.querySelectorAll('.user-checkbox:checked');
                    selectAllCheckbox.checked = checkedBoxes.length === userCheckboxes.length;
                    selectAllCheckbox.indeterminate = checkedBoxes.length > 0 && checkedBoxes.length < userCheckboxes.length;

                    updateBulkActions();
                });
            });

            // Update bulk actions visibility
            function updateBulkActions() {
                const checkedBoxes = document.querySelectorAll('.user-checkbox:checked');
                if (checkedBoxes.length > 0) {
                    bulkActions.classList.add('show');
                    selectedCount.textContent = checkedBoxes.length;
                } else {
                    bulkActions.classList.remove('show');
                }
            }

            // Tab functionality
            tabBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    tabBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    // Here you would typically filter the table based on the selected tab
                    const tabType = this.dataset.tab;
                    console.log('Filter by user type:', tabType);

                    // Reset checkboxes when switching tabs
                    selectAllCheckbox.checked = false;
                    userCheckboxes.forEach(checkbox => checkbox.checked = false);
                    updateBulkActions();
                });
            });

            // Filter functionality
            applyFiltersBtn.addEventListener('click', function() {
                const searchTerm = document.getElementById('searchUsers').value;
                const role = document.getElementById('filterRole').value;
                const status = document.getElementById('filterStatus').value;
                const institution = document.getElementById('filterInstitution').value;
                const dateRange = document.getElementById('filterDate').value;

                console.log('Apply filters:', {
                    search: searchTerm,
                    role: role,
                    status: status,
                    institution: institution,
                    dateRange: dateRange
                });

                // Here you would typically send these filters to your backend
            });

            resetFiltersBtn.addEventListener('click', function() {
                document.getElementById('searchUsers').value = '';
                document.getElementById('filterRole').value = '';
                document.getElementById('filterStatus').value = '';
                document.getElementById('filterInstitution').value = '';
                document.getElementById('filterDate').value = '';

                // Reset table to show all users
                console.log('Reset all filters');
            });

            // Close sidebar on window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    closeSidebar();
                }
            });

            // Animate progress bars on load
            setTimeout(() => {
                document.querySelectorAll('.progress-bar').forEach(bar => {
                    const width = bar.style.width;
                    bar.style.width = '0%';
                    setTimeout(() => {
                        bar.style.width = width;
                    }, 100);
                });
            }, 500);
        });
    </script>
@endpush
--}}

@section('content')
    <main class="admin-content">
        <!-- User Statistics Cards -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="dashboard-card stat-card primary">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number" id="totalUsers">{{ $statistics['total'] }}</div>
                    <div class="stat-label">Total Users</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i>
                        <span>+15% from last month</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="dashboard-card stat-card success">
                    <div class="stat-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="stat-number" id="totalStudents">{{ $statistics['students'] }}</div>
                    <div class="stat-label">Students</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i>
                        <span>+32% from last month</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="dashboard-card stat-card warning">
                    <div class="stat-icon">
                        <i class="fa-solid fa-user-astronaut"></i>
                    </div>
                    <div class="stat-number" id="totalInstructors">{{ $statistics['instructors'] }}</div>
                    <div class="stat-label">Instructors</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i>
                        <span>+8% from last month</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="dashboard-card stat-card info">
                    <div class="stat-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="stat-number" id="totalEvaluators">{{ $statistics['evaluators'] }}</div>
                    <div class="stat-label">Evaluators</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i>
                        <span>+5% from last month</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters Section -->
        <div class="filters-section">
            <div class="filter-group">
                <div class="filter-item">
                    <label class="filter-label">Search Users</label>
                    <input type="text" class="filter-input" placeholder="Name, email or ID..." id="searchUsers" value="{{ request('search') }}">
                </div>
                <div class="filter-item">
                    <label class="filter-label">User Role</label>
                    <select class="filter-select" id="filterRole">
                        <option value="">All Roles</option>
                        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="instructor" {{ request('role') == 'instructor' ? 'selected' : '' }}>Instructor</option>
                        <option value="evaluator" {{ request('role') == 'evaluator' ? 'selected' : '' }}>Evaluator</option>
                        <option value="student" {{ request('role') == 'student' ? 'selected' : '' }}>Student</option>
                    </select>
                </div>
                <div class="filter-item">
                    <label class="filter-label">Status</label>
                    <select class="filter-select" id="filterStatus">
                        <option value="">All Status</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="suspended" {{ request('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="filter-item">
                    <label class="filter-label">Institution</label>
                    <select class="filter-select" id="filterInstitution">
                        <option value="">All Institutions</option>
                        @foreach($institutions as $institution)
                            <option value="{{ $institution }}" {{ request('institution') == $institution ? 'selected' : '' }}>
                                {{ $institution }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="filter-item">
                    <label class="filter-label">Join Date</label>
                    <select class="filter-select" id="filterDate">
                        <option value="">All Time</option>
                        <option value="today" {{ request('date_range') == 'today' ? 'selected' : '' }}>Today</option>
                        <option value="week" {{ request('date_range') == 'week' ? 'selected' : '' }}>This Week</option>
                        <option value="month" {{ request('date_range') == 'month' ? 'selected' : '' }}>This Month</option>
                        <option value="quarter" {{ request('date_range') == 'quarter' ? 'selected' : '' }}>Last 3 Months</option>
                    </select>
                </div>
                <div class="filter-item">
                    <label class="filter-label" style="opacity: 0;">Actions</label>
                    <button class="btn-primary-custom" id="applyFilters">
                        <i class="fas fa-filter"></i>
                        Apply Filters
                    </button>
                </div>
                <div class="filter-item">
                    <label class="filter-label" style="opacity: 0;">Reset</label>
                    <button class="btn-secondary-custom" id="resetFilters">
                        <i class="fas fa-times"></i>
                        Clear All
                    </button>
                </div>
            </div>
        </div>

        <!-- User Type Tabs -->
        <div class="user-type-tabs">
            <button class="tab-btn {{ request('tab', 'all') == 'all' ? 'active' : '' }}" data-tab="all">
                <i class="fas fa-users"></i>
                <span>All Users</span>
                <span class="tab-count">{{ $statistics['total'] }}</span>
            </button>
            <button class="tab-btn {{ request('tab') == 'admin' ? 'active' : '' }}" data-tab="admin">
                <i class="fas fa-user-shield"></i>
                <span>Admins</span>
                <span class="tab-count">{{ $statistics['admins'] }}</span>
            </button>
            <button class="tab-btn {{ request('tab') == 'instructor' ? 'active' : '' }}" data-tab="instructor">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Instructors</span>
                <span class="tab-count">{{ $statistics['instructors'] }}</span>
            </button>
            <button class="tab-btn {{ request('tab') == 'evaluator' ? 'active' : '' }}" data-tab="evaluator">
                <i class="fas fa-user-check"></i>
                <span>Evaluators</span>
                <span class="tab-count">{{ $statistics['evaluators'] }}</span>
            </button>
            <button class="tab-btn {{ request('tab') == 'student' ? 'active' : '' }}" data-tab="student">
                <i class="fas fa-user-graduate"></i>
                <span>Students</span>
                <span class="tab-count">{{ $statistics['students'] }}</span>
            </button>
        </div>

        <!-- Users Table -->
        <div class="users-table-container">
            <div class="table-header">
                <h5 class="table-title">User Management</h5>
                <div class="table-actions">
                    <button class="btn-secondary-custom" id="exportUsers">
                        <i class="fas fa-download"></i>
                        Export
                    </button>
                    <button class="btn-primary-custom" id="addNewUser" data-bs-toggle="modal" data-bs-target="#userModal">
                        <i class="fas fa-user-plus"></i>
                        Add New User
                    </button>
                </div>
            </div>

            <div class="bulk-actions" id="bulkActions">
                <div class="bulk-actions-text">
                    <span id="selectedCount">0</span> users selected
                </div>
                <div class="bulk-actions-buttons">
                    <button class="btn-secondary-custom" data-action="send_email">
                        <i class="fas fa-envelope"></i>
                        Send Email
                    </button>
                    <button class="btn-secondary-custom" data-action="activate">
                        <i class="fas fa-check"></i>
                        Activate
                    </button>
                    <button class="btn-secondary-custom" data-action="suspend">
                        <i class="fas fa-ban"></i>
                        Suspend
                    </button>
                    <button class="btn-secondary-custom" data-action="delete" style="color: var(--danger-color);">
                        <i class="fas fa-trash"></i>
                        Delete
                    </button>
                </div>
            </div>

            <div id="usersTableContent">
                @include('Users::partials.table')
            </div>
        </div>
    </main>

    @include('Users::partials.modals')
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Initialize user management functionality
            const userManagement = {
                init() {
                    this.bindEvents();
                    this.attachCheckboxListeners();
                },

                bindEvents() {
                    // Bulk actions
                    document.querySelectorAll('.bulk-actions-buttons button').forEach(btn => {
                        btn.addEventListener('click', this.handleBulkAction.bind(this));
                    });

                    // Filters
                    document.getElementById('applyFilters').addEventListener('click', this.applyFilters.bind(this));
                    document.getElementById('resetFilters').addEventListener('click', this.resetFilters.bind(this));

                    // Tabs
                    document.querySelectorAll('.tab-btn').forEach(btn => {
                        btn.addEventListener('click', this.handleTabClick.bind(this));
                    });

                    // Search
                    let searchTimeout;
                    document.getElementById('searchUsers').addEventListener('input', (e) => {
                        clearTimeout(searchTimeout);
                        searchTimeout = setTimeout(() => {
                            this.loadUsers({ search: e.target.value });
                        }, 500);
                    });
                },

                handleBulkAction(e) {
                    const action = e.currentTarget.dataset.action;
                    const selectedUserIds = Array.from(document.querySelectorAll('.user-checkbox:checked'))
                        .map(cb => cb.dataset.userId);

                    if (selectedUserIds.length === 0) return;

                    if (confirm(`Are you sure you want to ${action} ${selectedUserIds.length} user(s)?`)) {
                        this.performBulkAction(action, selectedUserIds);
                    }
                },

                handleTabClick(e) {
                    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
                    e.currentTarget.classList.add('active');

                    const tabType = e.currentTarget.dataset.tab;
                    this.loadUsers({ tab: tabType });
                },

                applyFilters() {
                    const filters = {
                        search: document.getElementById('searchUsers').value,
                        role: document.getElementById('filterRole').value,
                        status: document.getElementById('filterStatus').value,
                        institution: document.getElementById('filterInstitution').value,
                        date_range: document.getElementById('filterDate').value,
                    };
                    this.loadUsers(filters);
                },

                resetFilters() {
                    ['searchUsers', 'filterRole', 'filterStatus', 'filterInstitution', 'filterDate']
                        .forEach(id => document.getElementById(id).value = '');
                    this.loadUsers({});
                },

                loadUsers(filters = {}) {
                    const params = new URLSearchParams(filters);

                    fetch(`{{ route('admin.users.index') }}?${params}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': csrfToken
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('usersTableContent').innerHTML = data.html;
                            this.updateStatistics(data.statistics);
                            this.attachCheckboxListeners();
                            this.resetBulkActions();
                        })
                        .catch(error => {
                            console.error('Error loading users:', error);
                            alert('Error loading users. Please try again.');
                        });
                },

                performBulkAction(action, userIds) {
                    fetch('{{ route("admin.users.bulk") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({
                            action: action,
                            user_ids: userIds
                        })
                    })
                        .then(response => response.json())
                        .then(data => {
                            alert(data.message);
                            this.loadUsers();
                        })
                        .catch(error => {
                            console.error('Error performing bulk action:', error);
                            alert('An error occurred. Please try again.');
                        });
                },

                attachCheckboxListeners() {
                    const selectAllCheckbox = document.getElementById('selectAll');
                    const userCheckboxes = document.querySelectorAll('.user-checkbox');

                    selectAllCheckbox?.addEventListener('change', (e) => {
                        userCheckboxes.forEach(checkbox => {
                            checkbox.checked = e.target.checked;
                        });
                        this.updateBulkActions();
                    });

                    userCheckboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', () => {
                            const checkedBoxes = document.querySelectorAll('.user-checkbox:checked');
                            selectAllCheckbox.checked = checkedBoxes.length === userCheckboxes.length;
                            selectAllCheckbox.indeterminate = checkedBoxes.length > 0 && checkedBoxes.length < userCheckboxes.length;
                            this.updateBulkActions();
                        });
                    });
                },

                updateBulkActions() {
                    const checkedBoxes = document.querySelectorAll('.user-checkbox:checked');
                    const bulkActions = document.getElementById('bulkActions');
                    const selectedCount = document.getElementById('selectedCount');

                    if (checkedBoxes.length > 0) {
                        bulkActions.classList.add('show');
                        selectedCount.textContent = checkedBoxes.length;
                    } else {
                        bulkActions.classList.remove('show');
                    }
                },

                resetBulkActions() {
                    const selectAllCheckbox = document.getElementById('selectAll');
                    const bulkActions = document.getElementById('bulkActions');

                    if (selectAllCheckbox) selectAllCheckbox.checked = false;
                    bulkActions.classList.remove('show');
                },

                updateStatistics(stats) {
                    document.getElementById('totalUsers').textContent = stats.total;
                    document.getElementById('totalStudents').textContent = stats.students;
                    document.getElementById('totalInstructors').textContent = stats.instructors;
                    document.getElementById('totalEvaluators').textContent = stats.evaluators;

                    // Update tab counts
                    document.querySelector('[data-tab="all"] .tab-count').textContent = stats.total;
                    document.querySelector('[data-tab="admin"] .tab-count').textContent = stats.admins;
                    document.querySelector('[data-tab="instructor"] .tab-count').textContent = stats.instructors;
                    document.querySelector('[data-tab="evaluator"] .tab-count').textContent = stats.evaluators;
                    document.querySelector('[data-tab="student"] .tab-count').textContent = stats.students;
                }
            };

            userManagement.init();
        });
    </script>
@endpush
