@extends('layouts.main')

@section('pageTitle', 'Create Exam')
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
            --border-color: #e5e9f2;
            --card-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .page-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 0;
            max-width: 600px;
        }
        .page-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 15px;
        }
        .page-title-card {
            background: linear-gradient(135deg, var(--primary-color) 0%, #7d7df8 100%);
            border-radius: 20px;
            padding: 30px 40px;
            color: white;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(90, 90, 243, 0.3);
        }
        .page-title-card::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
        }
        .page-title-card::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 300px;
            height: 300px;
            background-color: rgba(255,255,255,0.05);
            border-radius: 50%;
        }


        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            color: #777;
        }

        .breadcrumb a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .breadcrumb i {
            font-size: 0.8rem;
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

        .btn-secondary-custom {
            background-color: #f0f0f0;
            color: #555;
        }

        .btn-secondary-custom:hover {
            background-color: #e0e0e0;
        }

        /* Form Card */
        .form-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            margin-bottom: 30px;
            overflow: hidden;
        }

        .form-card-header {
            padding: 20px 25px;
            background-color: #f9fafc;
            border-bottom: 1px solid var(--border-color);
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
            margin: 0;
        }

        .form-card-body {
            padding: 25px;
        }

        /* Form Styles */
        .form-section {
            margin-bottom: 35px;
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-color);
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
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

        .required::after {
            content: ' *';
            color: var(--danger-color);
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(90, 90, 243, 0.1);
        }

        .form-select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.95rem;
            background-color: white;
            transition: all 0.3s;
        }

        .form-select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(90, 90, 243, 0.1);
        }

        .form-text {
            font-size: 0.8rem;
            color: #777;
            margin-top: 5px;
        }

        .profile-upload {
            display: flex;
            align-items: center;
            gap: 25px;
            margin-bottom: 20px;
        }

        .profile-preview {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: var(--primary-color);
            overflow: hidden;
        }

        .profile-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .btn-upload {
            padding: 10px 20px;
            border-radius: 8px;
            background-color: var(--primary-light);
            color: var(--primary-color);
            font-weight: 500;
            border: none;
            cursor: pointer;
        }

        .upload-btn-wrapper input[type=file] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .upload-info {
            font-size: 0.85rem;
            color: #777;
            margin-top: 8px;
        }

        /* Form Controls */
        .form-checks {
            display: flex;
            gap: 20px;
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .form-check-input {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
        }

        .form-actions-right {
            display: flex;
            gap: 15px;
        }

        /* Footer */
        .footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px 0;
            border-top: 1px solid var(--border-color);
        }

        .footer-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: var(--primary-color);
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .footer-text {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .copyright {
            color: #777;
            font-size: 0.8rem;
        }
    </style>
@endpush
@section('content')
    <div class="page-title-card">
        <div class="page-title-content">
            <h1 class="page-title">Create New Student</h1>
            <p class="page-subtitle">
                Fill in the details below to create a new student profile.</p>
        </div>
    </div>
    <form method="POST" action="{{ isset($student) ? route('admin.student.update', ['student' => $student->id]) : route('admin.student.store') }}">
        @csrf
        @if(isset($student))
            @method('PATCH')
        @endif

        <div class="form-card">
            <div class="form-card-header">
                <h2 class="card-title">Student Information</h2>
            </div>
            <div class="form-card-body">
                <div class="form-section">
                    <h3 class="section-title">Profile Information</h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="name" class="form-label required">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter name"
                                   value="{{ old('name', $student->name ?? '') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label required">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email"
                                   value="{{ old('email', $student->email ?? '') }}" required>
                            <small class="form-text">This will be used as the login username</small>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3 class="section-title">Account Information</h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="password" class="form-label {{ isset($student) ? '' : 'required' }}">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                   placeholder="Create password" {{ isset($student) ? '' : 'required' }}>
                            <small class="form-text">Min 8 characters, 1 uppercase, 1 lowercase, 1 number</small>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="form-label {{ isset($student) ? '' : 'required' }}">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="confirmPassword"
                                   class="form-control" placeholder="Confirm password" {{ isset($student) ? '' : 'required' }}>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Account Status</label>
                        <div class="form-checks">
                            <label class="form-check">
                                <input type="radio" name="status" value="1" class="form-check-input"
                                    {{ old('status', $student->status ?? '1') == '1' ? 'checked' : '' }}>
                                Active
                            </label>
                            <label class="form-check">
                                <input type="radio" name="status" value="0" class="form-check-input"
                                    {{ old('status', $student->status ?? '') == '0' ? 'checked' : '' }}>
                                Inactive
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <div>
                        <a href="{{ route('admin.manage.student') }}" class="btn-custom btn-secondary-custom">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                    </div>
                    <div class="form-actions-right">
                        <button type="submit" class="btn-custom btn-primary-custom">
                            <i class="fas fa-user-plus"></i>
                            {{ isset($student) ? 'Update Student' : 'Create Student' }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection


@push('script')

@endpush
