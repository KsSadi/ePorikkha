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

        body {
            background-color: #f5f7ff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 0;
            margin: 0;
            color: var(--text-color);
            min-height: 100vh;
        }

        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header styles */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 25px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            border-radius: 10px;
        }

        .header-left {
            display: flex;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            text-decoration: none;
            margin-right: 30px;
        }

        .logo-icon {
            font-size: 1.8rem;
            margin-right: 10px;
            color: var(--primary-color);
        }

        .nav-menu {
            display: flex;
            align-items: center;
        }

        .nav-link {
            color: var(--text-color);
            text-decoration: none;
            padding: 8px 15px;
            margin: 0 5px;
            font-weight: 500;
            font-size: 0.95rem;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .nav-link:hover {
            background-color: var(--light-bg);
            color: var(--primary-color);
        }

        .nav-link.active {
            color: var(--primary-color);
            border-bottom: 2px solid var(--primary-color);
            font-weight: 600;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .notification-btn {
            position: relative;
            background: none;
            border: none;
            font-size: 1.2rem;
            color: #777;
            cursor: pointer;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 18px;
            height: 18px;
            background-color: var(--secondary-color);
            color: white;
            border-radius: 50%;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.9rem;
        }

        .user-role {
            font-size: 0.75rem;
            color: #777;
        }

        .logout-btn {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logout-btn:hover {
            background-color: #ff5c5c;
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
        <button class="btn-custom btn-primary-custom" id="addStudentBtn">
            <i class="fas fa-user-plus"></i>
            Add New Student
        </button>
    </div>

    <div class="search-filter-container">
        <div class="search-box">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-input" placeholder="Search students...">
        </div>
        <div class="filter-buttons">
            <button class="filter-btn active">
                <i class="fas fa-list"></i>
                All
            </button>
            <button class="filter-btn">
                <i class="fas fa-check-circle"></i>
                Active
            </button>
            <button class="filter-btn">
                <i class="fas fa-times-circle"></i>
                Inactive
            </button>
        </div>
    </div>

    <div class="students-container">
        <table class="students-table">
            <thead>
            <tr>
                <th>Student</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Exams Taken</th>
                <th>Avg. Score</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <div class="student-info">
                        <div class="student-avatar">JD</div>
                        <div>
                            <div class="student-name">John Doe</div>
                            <div class="student-id">ID: STU-2025-001</div>
                        </div>
                    </div>
                </td>
                <td>john.doe@example.com</td>
                <td>+880 1712 345678</td>
                <td>12</td>
                <td>85%</td>
                <td><span class="status-badge status-active">Active</span></td>
                <td class="action-cell">
                    <div class="action-buttons">
                        <button class="btn-icon btn-view" title="View Profile">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn-icon btn-edit" title="Edit Student">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn-icon btn-toggle" title="Deactivate Account">
                            <i class="fas fa-user-slash"></i>
                        </button>
                        <button class="btn-icon btn-delete" title="Delete Student">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="student-info">
                        <div class="student-avatar">SR</div>
                        <div>
                            <div class="student-name">Sarah Rahman</div>
                            <div class="student-id">ID: STU-2025-002</div>
                        </div>
                    </div>
                </td>
                <td>sarah.r@example.com</td>
                <td>+880 1812 678901</td>
                <td>9</td>
                <td>92%</td>
                <td><span class="status-badge status-active">Active</span></td>
                <td class="action-cell">
                    <div class="action-buttons">
                        <button class="btn-icon btn-view" title="View Profile">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn-icon btn-edit" title="Edit Student">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn-icon btn-toggle" title="Deactivate Account">
                            <i class="fas fa-user-slash"></i>
                        </button>
                        <button class="btn-icon btn-delete" title="Delete Student">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="student-info">
                        <div class="student-avatar">AK</div>
                        <div>
                            <div class="student-name">Amir Khan</div>
                            <div class="student-id">ID: STU-2025-003</div>
                        </div>
                    </div>
                </td>
                <td>amir.k@example.com</td>
                <td>+880 1912 567890</td>
                <td>8</td>
                <td>78%</td>
                <td><span class="status-badge status-inactive">Inactive</span></td>
                <td class="action-cell">
                    <div class="action-buttons">
                        <button class="btn-icon btn-view" title="View Profile">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn-icon btn-edit" title="Edit Student">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn-icon btn-toggle" title="Activate Account">
                            <i class="fas fa-user-check"></i>
                        </button>
                        <button class="btn-icon btn-delete" title="Delete Student">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="student-info">
                        <div class="student-avatar">RI</div>
                        <div>
                            <div class="student-name">Riya Islam</div>
                            <div class="student-id">ID: STU-2025-004</div>
                        </div>
                    </div>
                </td>
                <td>riya.islam@example.com</td>
                <td>+880 1612 345678</td>
                <td>15</td>
                <td>89%</td>
                <td><span class="status-badge status-active">Active</span></td>
                <td class="action-cell">
                    <div class="action-buttons">
                        <button class="btn-icon btn-view" title="View Profile">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn-icon btn-edit" title="Edit Student">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn-icon btn-toggle" title="Deactivate Account">
                            <i class="fas fa-user-slash"></i>
                        </button>
                        <button class="btn-icon btn-delete" title="Delete Student">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="student-info">
                        <div class="student-avatar">JR</div>
                        <div>
                            <div class="student-name">Javed Rahman</div>
                            <div class="student-id">ID: STU-2025-005</div>
                        </div>
                    </div>
                </td>
                <td>javed@example.com</td>
                <td>+880 1512 567890</td>
                <td>11</td>
                <td>75%</td>
                <td><span class="status-badge status-active">Active</span></td>
                <td class="action-cell">
                    <div class="action-buttons">
                        <button class="btn-icon btn-view" title="View Profile">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn-icon btn-edit" title="Edit Student">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn-icon btn-toggle" title="Deactivate Account">
                            <i class="fas fa-user-slash"></i>
                        </button>
                        <button class="btn-icon btn-delete" title="Delete Student">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="pagination-container">
        <div class="pagination-info">
            Showing 1-5 of 24 students
        </div>
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </li>
        </ul>
    </div>
@endsection
