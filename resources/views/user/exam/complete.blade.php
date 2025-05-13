@extends('layouts.main')

@push('style')
    <style>
        .completion-card {
            background-color: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            text-align: center;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }
        .completion-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: linear-gradient(90deg, var(--primary-color), #7d7df8);
        }
        .success-icon {
            width: 100px;
            height: 100px;
            background-color: var(--primary-light);
            color: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            margin: 0 auto 20px;
        }
        .completion-message {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 15px;
        }
        .completion-details {
            color: #777;
            margin-bottom: 30px;
        }
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        .stat-card {
            background-color: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background-color: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 5px;
        }
        .stat-label {
            color: #777;
            font-size: 0.9rem;
        }

        .time-taken {
            display: flex;
            align-items: center;
        }
        .time-taken i {
            margin-right: 5px;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        .btn-custom {
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            display: flex;
            align-items: center;
            transition: all 0.3s;
        }
        .btn-primary {
            background: linear-gradient(45deg, var(--primary-color), #7d7df8);
            border: none;
            box-shadow: 0 5px 15px rgba(90, 90, 243, 0.3);
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #4b4bea, #6e6ef7);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(90, 90, 243, 0.4);
        }
        .btn-outline-custom {
            border: 2px solid var(--primary-color);
            background-color: transparent;
            color: var(--primary-color);
        }
        .btn-outline-custom:hover {
            background-color: var(--primary-light);
            color: var(--primary-color);
            transform: translateY(-3px);
        }
        .btn-icon {
            margin-right: 8px;
        }
        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #f0f;
            top: -10px;
            animation: fall 3s linear infinite;
        }
        .confetti:nth-child(1) {
            left: 10%;
            animation-duration: 2.5s;
            background-color: #ff0;
        }
        .confetti:nth-child(2) {
            left: 20%;
            animation-duration: 3.5s;
            background-color: #f00;
        }
        .confetti:nth-child(3) {
            left: 30%;
            animation-duration: 2.8s;
            background-color: #0ff;
        }
        .confetti:nth-child(4) {
            left: 40%;
            animation-duration: 3.2s;
            background-color: #0f0;
        }
        .confetti:nth-child(5) {
            left: 50%;
            animation-duration: 2.6s;
            background-color: #00f;
        }
        .confetti:nth-child(6) {
            left: 60%;
            animation-duration: 3.1s;
            background-color: #f0f;
        }
        .confetti:nth-child(7) {
            left: 70%;
            animation-duration: 2.9s;
            background-color: #ff0;
        }
        .confetti:nth-child(8) {
            left: 80%;
            animation-duration: 3.4s;
            background-color: #f00;
        }
        .confetti:nth-child(9) {
            left: 90%;
            animation-duration: 2.7s;
            background-color: #0ff;
        }
        @keyframes fall {
            to {
                top: 100vh;
                transform: rotate(360deg);
            }
        }


    </style>
@endpush

@section('pageTitle', 'Exam Completion')

@section('content')


    <div class="completion-card">
        <!-- Confetti animation elements -->
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>

        <div class="success-icon">
            <i class="fas fa-check"></i>
        </div>
        <h2 class="completion-message">You've successfully completed the exam!</h2>
        <p class="completion-details">Your answers have been recorded. The instructor will review your responses and provide feedback shortly.</p>


    </div>

    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-clipboard-check"></i>
            </div>
            <div class="stat-value" id="questionsCompleted">{{$completedCount}}/{{$totalQuestions}}</div>
            <div class="stat-label">Questions Completed</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-value" id="totalTimeTaken">{{$timeSpent}}</div>
            <div class="stat-label">Total Time Taken</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-tachometer-alt"></i>
            </div>
            <div class="stat-value" id="avgTimePerQuestion">{{$avgTimePerQuestion}}</div>
            <div class="stat-label">Avg. Time per Question</div>
        </div>


    </div>


    <div class="action-buttons">
       <a href="{{route('user.dashboard')}}">
        <button class="btn btn-primary btn-custom" id="backToDashboardBtn" style="text-decoration: none">
            <i class="fas fa-home btn-icon"></i> Back to Dashboard
        </button>
       </a>

    </div>

@endsection
