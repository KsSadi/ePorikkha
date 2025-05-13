@extends('layouts.main')
@section('pageTitle', 'Manage Student')

@push('style')
    <style>

        :root {
            --primary-color: #5a5af3;
            --primary-light: #eeeeff;
            --secondary-color: #ff7373;
            --text-color: #333;
            --light-bg: #f5f7ff;
            --success-color: #4caf50;
            --warning-color: #ff9800;
            --danger-color: #f44336;
            --info-color: #2196f3;
            --border-color: #e5e9f2;
        }



        /* Page Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .btn-custom {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
        }

        .btn-primary-custom {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary-custom:hover {
            background-color: #4a4adf;
        }

        /* Search and Filter */
        .search-filter-container {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 20px;
            margin-bottom: 30px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .search-box {
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 12px 20px 12px 45px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.95rem;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #777;
        }

        .filter-buttons {
            display: flex;
            gap: 12px;
        }

        .filter-btn {
            padding: 10px 20px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background-color: white;
            color: var(--text-color);
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-btn:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .filter-btn.active {
            background-color: var(--primary-light);
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Students Table */
        .students-container {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            overflow-x: auto;
        }

        .students-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .students-table th {
            text-align: left;
            padding: 15px;
            font-weight: 600;
            color: #555;
            border-bottom: 1px solid var(--border-color);
            background-color: #f9fafc;
        }

        .students-table td {
            padding: 15px;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
        }

        .students-table tr:last-child td {
            border-bottom: none;
        }

        .students-table tr:hover {
            background-color: #f9fafc;
        }

        .student-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-light);
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1rem;
        }

        .student-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .student-name {
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 3px;
        }

        .student-id {
            font-size: 0.8rem;
            color: #777;
        }

        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
            display: inline-block;
        }

        .status-active {
            background-color: #e8f5e9;
            color: var(--success-color);
        }

        .status-inactive {
            background-color: #ffebee;
            color: var(--danger-color);
        }

        .action-cell {
            text-align: right;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: flex-end;
        }

        .btn-icon {
            width: 34px;
            height: 34px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
            font-size: 0.85rem;
        }

        .btn-view {
            background-color: var(--primary-light);
            color: var(--primary-color);
        }

        .btn-view:hover {
            background-color: #e0e0ff;
        }

        .btn-edit {
            background-color: #e3f2fd;
            color: var(--info-color);
        }

        .btn-edit:hover {
            background-color: #d0e8f9;
        }

        .btn-delete {
            background-color: #ffebee;
            color: var(--danger-color);
        }

        .btn-delete:hover {
            background-color: #ffd5d9;
        }

        .btn-toggle {
            background-color: #fff8e1;
            color: var(--warning-color);
        }

        .btn-toggle:hover {
            background-color: #fff2c6;
        }

        /* Add Student Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
        }

        .modal-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            width: 100%;
            max-width: 500px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            transform: translateY(-20px);
            transition: all 0.3s;
        }

        .modal-overlay.show .modal-content {
            transform: translateY(0);
        }

        .modal-header {
            padding: 20px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.2rem;
            color: #777;
            cursor: pointer;
        }

        .modal-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 0.9rem;
            color: #555;
        }

        .form-control {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.95rem;
        }

        .form-select {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.95rem;
            background-color: white;
        }

        .modal-footer {
            padding: 15px 20px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-secondary {
            background-color: #f0f0f0;
            color: #555;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-secondary:hover {
            background-color: #e0e0e0;
        }

        /* Pagination */
        .pagination-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .pagination-info {
            font-size: 0.9rem;
            color: #666;
        }

        .pagination {
            display: flex;
            gap: 8px;
        }

        .page-item {
            list-style: none;
        }

        .page-link {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background-color: white;
            color: var(--text-color);
            font-weight: 500;
            text-decoration: none;
            border: 1px solid var(--border-color);
            transition: all 0.3s;
        }

        .page-link:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .page-item.active .page-link {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

    </style>
@endpush

@section('content')
    <div class="page-header">
        <h1 class="page-title">Manage Students</h1>

        <a href="{{ route('admin.student.create') }}" >
            <button class="btn-custom btn-primary-custom" id="addStudentBtn">
                <i class="fas fa-user-plus"></i>
                Add New Student
            </button>
        </a>
    </div>

    <div class="search-filter-container">
        <form action="{{ route('admin.manage.student') }}" method="GET" class="d-flex align-items-center">
            <div class="search-box flex-grow-1">
                <input type="text" name="search" class="form-control search-input" placeholder="Search students..." value="{{ request('search') }}">
                <i class="fas fa-search search-icon"></i>
            </div>

            <div class="filter-buttons ms-3">
                <button type="submit" name="status" value="all" class="btn filter-btn {{ request('status', 'all') == 'all' ? 'active' : '' }}">
                    <i class="fas fa-list me-1"></i> All
                </button>

                <button type="submit" name="status" value="1" class="btn filter-btn {{ request('status') == '1' ? 'active' : '' }}">
                    <i class="fas fa-check-circle me-1"></i> Active
                </button>

                <button type="submit" name="status" value="0" class="btn filter-btn {{ request('status') == '0' ? 'active' : '' }}">
                    <i class="fas fa-times-circle me-1"></i> Inactive
                </button>
            </div>
        </form>
    </div>

    <div class="students-container">
        <table class="students-table">
            <thead>
            <tr>
                <th>Student</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>
                        <div class="student-info">
                            <div class="student-avatar">{{ substr($user->name, 0, 2) }}</div>
                            <div>
                                <div class="student-name">{{ $user->name }}</div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email ?? 'N/A' }}</td>
                    <td>
                        <span class="status-badge status-{{ $user->status == 1 ? 'active' : 'inactive' }}">
                            {{ $user->status == 1 ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="action-cell">
                        <div class="action-buttons">
                          {{--  <a href="{{ route('admin.student.show', $user->id) }}" class="btn-icon btn-view" title="View Profile">
                                <i class="fas fa-eye"></i>
                            </a>--}}
                            <a href="{{ route('admin.student.edit', $user->id) }}" class="btn-icon btn-edit" title="Edit Student">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn-icon btn-toggle" title="{{ $user->status == 1 ? 'Deactivate' : 'Activate' }} Account"
                                    onclick="toggleStatus({{ $user->id }}, {{ $user->status }})">
                                <i class="fas fa-{{ $user->status == 1 ? 'user-slash' : 'user-check' }}"></i>
                            </button>
                            <button class="btn-icon btn-delete" title="Delete Student"
                                    onclick="confirmDelete({{ $user->id }})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No students found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-container">
        <div class="pagination-info">
            Showing {{ $users->firstItem() ?? 0 }}-{{ $users->lastItem() ?? 0 }} of {{ $users->total() ?? 0 }} students
        </div>
        {{ $users->appends(request()->query())->links() }}
    </div>

    <!-- Add these scripts for status toggle and delete confirmation -->
    <form id="status-form" method="POST" style="display: none;">
        @csrf
        @method('PATCH')
    </form>

    <form id="delete-form" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <script>
        function toggleStatus(userId, currentStatus) {
            if (confirm(`Are you sure you want to ${currentStatus == 1 ? 'deactivate' : 'activate'} this student?`)) {
                const form = document.getElementById('status-form');
                form.action = `/admin/student/${userId}/toggle-status`;
                form.submit();
            }
        }

        function confirmDelete(userId) {
            if (confirm('Are you sure you want to delete this student? This action cannot be undone.')) {
                const form = document.getElementById('delete-form');
                form.action = `{{ url('admin/student/delete') }}/${userId}`;
                form.submit();
            }
        }
    </script>
@endsection
