<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Exam Password | ePorikkha</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #5a5af3;
            --primary-light: #eeeeff;
            --secondary-color: #ff7373;
            --secondary-light: #fff0f0;
            --text-color: #333;
            --light-bg: #f5f7ff;
            --success-color: #4caf50;
            --warning-color: #ff9800;
            --danger-color: #f44336;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f5f7ff 0%, #e8eaff 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 0;
            margin: 0;
            color: var(--text-color);
            position: relative;
            overflow: hidden;
        }

        /* Decorative Elements */
        .bg-shape-1,
        .bg-shape-2,
        .bg-shape-3 {
            position: absolute;
            border-radius: 50%;
            z-index: -1;
        }

        .bg-shape-1 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(90, 90, 243, 0.1) 0%, rgba(90, 90, 243, 0) 70%);
            top: -200px;
            right: -100px;
        }

        .bg-shape-2 {
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(90, 90, 243, 0.08) 0%, rgba(90, 90, 243, 0) 70%);
            bottom: -150px;
            left: -100px;
        }

        .bg-shape-3 {
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(255, 115, 115, 0.08) 0%, rgba(255, 115, 115, 0) 70%);
            top: 50%;
            left: 10%;
        }

        .floating-particles {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color) 0%, #7d7df8 100%);
            opacity: 0.1;
            animation: float 20s infinite linear;
        }

        @keyframes float {
            0% {
                transform: translateY(0) translateX(0) rotate(0deg);
            }
            33% {
                transform: translateY(-50px) translateX(20px) rotate(120deg);
            }
            66% {
                transform: translateY(30px) translateX(-15px) rotate(240deg);
            }
            100% {
                transform: translateY(0) translateX(0) rotate(360deg);
            }
        }

        /* Main Container */
        .password-container {
            width: 100%;
            max-width: 1000px;
            display: flex;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(90, 90, 243, 0.12);
            background-color: white;
            position: relative;
            z-index: 1;
        }

        /* Left Side - Illustration */
        .illustration-side {
            flex: 1;
            background: linear-gradient(135deg, var(--primary-color) 0%, #7a7aff 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            position: relative;
            overflow: hidden;
            color: white;
        }

        .illustration-side::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .illustration-side::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 250px;
            height: 250px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .exam-illustration {
            width: 250px;
            height: 250px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
            position: relative;
            z-index: 1;
        }

        .exam-illustration i {
            font-size: 6rem;
            animation: pulse 2s infinite ease-in-out;
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

        .illustration-text {
            text-align: center;
            z-index: 1;
        }

        .illustration-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .illustration-description {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 80%;
            margin: 0 auto;
        }

        /* Right Side - Password Form */
        .form-side {
            flex: 1;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 40px;
        }

        .logo-icon {
            font-size: 1.8rem;
            margin-right: 10px;
            color: var(--primary-color);
        }

        .form-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 10px;
        }

        .form-subtitle {
            font-size: 1rem;
            color: #777;
            margin-bottom: 30px;
        }

        .exam-info {
            background-color: var(--light-bg);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .exam-name {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .exam-details {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .exam-detail-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            color: #555;
        }

        .exam-detail-item i {
            color: var(--primary-color);
        }

        .password-form {
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 10px;
            display: block;
        }

        .password-input-container {
            position: relative;
            margin-bottom: 25px;
        }

        .password-input {
            width: 100%;
            padding: 15px 20px 15px 50px;
            border: 2px solid #e5e9f2;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s;
            background-color: #f9faff;
        }

        .password-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(90, 90, 243, 0.1);
            outline: none;
        }

        .password-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #777;
            font-size: 1.2rem;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #777;
            cursor: pointer;
            transition: all 0.3s;
        }

        .toggle-password:hover {
            color: var(--primary-color);
        }

        .password-hint {
            color: #777;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: -15px;
            margin-bottom: 25px;
        }

        .password-hint i {
            font-size: 0.8rem;
            color: var(--warning-color);
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary-color) 0%, #7a7aff 100%);
            color: white;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 5px 15px rgba(90, 90, 243, 0.2);
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(90, 90, 243, 0.3);
        }

        .submit-btn i {
            font-size: 1.1rem;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            margin-top: 30px;
        }

        .back-link:hover {
            color: #4a4adf;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-side {
            animation: fadeIn 0.6s ease-out;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .password-container {
                flex-direction: column;
                max-width: 600px;
            }

            .illustration-side {
                padding: 30px;
            }

            .exam-illustration {
                width: 180px;
                height: 180px;
                margin-bottom: 20px;
            }

            .exam-illustration i {
                font-size: 4rem;
            }

            .illustration-title {
                font-size: 1.5rem;
            }

            .form-side {
                padding: 30px;
            }
        }

        @media (max-width: 576px) {
            .password-container {
                margin: 20px;
            }

            .illustration-side {
                padding: 25px;
            }

            .exam-illustration {
                width: 140px;
                height: 140px;
            }

            .exam-illustration i {
                font-size: 3rem;
            }

            .form-side {
                padding: 25px;
            }

            .form-title {
                font-size: 1.5rem;
            }

            .exam-details {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
<!-- Background Elements -->
<div class="bg-shape-1"></div>
<div class="bg-shape-2"></div>
<div class="bg-shape-3"></div>

<div class="floating-particles">
    <!-- JavaScript will add particles here -->
</div>

@include('layouts.notification')


{{-- Background Particles --}}
<div class="password-container">
    <!-- Left Side - Illustration -->
    <div class="illustration-side">
        <div class="exam-illustration">
            <i class="fas fa-lock"></i>
        </div>
        <div class="illustration-text">
            <h2 class="illustration-title">Secure Access Required</h2>
            <p class="illustration-description">This exam is password protected to ensure integrity and security.</p>
        </div>
    </div>

    <!-- Right Side - Password Form -->
    <div class="form-side">
        <div class="logo">
            <i class="fas fa-graduation-cap logo-icon"></i>
            ePorikkha
        </div>

        <h1 class="form-title">Enter Exam Password</h1>
        <p class="form-subtitle">Please enter the password provided by your instructor to access this exam.</p>

        <div class="exam-info">
            <h3 class="exam-name">{{$exam->title}}</h3>
            <div class="exam-details">
                <div class="exam-detail-item">
                    <i class="fas fa-calendar-alt"></i>
                    <span>{{ \Carbon\Carbon::parse($exam->exam_date)->format('d F Y') }}</span>

                </div>
                <div class="exam-detail-item">
                    <i class="fas fa-clock"></i>
                    <span>Duration: {{ $exam->formatted_duration }}</span>
                </div>
               {{-- <div class="exam-detail-item">
                    <i class="fas fa-user-tie"></i>
                    <span>Prof. Johnson</span>
                </div>--}}
            </div>
        </div>

        <form class="password-form" action="{{ route('student.exam.verify-password', $exam->id) }}" method="POST">
            @csrf
            <label for="exam-password" class="form-label">Exam Password</label>
            <div class="password-input-container">
                <i class="fas fa-key password-icon"></i>
                <input type="password" id="exam-password" name="password" class="password-input" placeholder="Enter password" required>
                <input type="hidden" name="attempt_id" value="{{ $attempt->id }}">
                <button type="button" class="toggle-password" id="togglePassword">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            <div class="password-hint">
                <i class="fas fa-info-circle"></i>
                <span>Passwords are case-sensitive</span>
            </div>

            <button type="submit" class="submit-btn">
                <i class="fas fa-unlock-alt"></i>
                Access Exam
            </button>
        </form>

        <a href="{{route('user.dashboard')}}" class="back-link">
            <i class="fas fa-arrow-left"></i>
            Back to Dashboard
        </a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('exam-password');

        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Toggle the eye icon
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
        }
    });
</script>
</body>
</html>
