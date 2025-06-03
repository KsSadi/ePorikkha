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
