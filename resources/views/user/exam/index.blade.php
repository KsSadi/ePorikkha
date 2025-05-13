@extends('layouts.main')
@section('pageTitle', 'Exams')
@push('style')
    <style>

        .header-action i {
            margin-right: 8px;
        }
        .exam-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #7d7df8 100%);
            border-radius: 20px;
            padding: 40px;
            color: white;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(90, 90, 243, 0.3);
        }
        .exam-header::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
        }
        .exam-header::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 300px;
            height: 300px;
            background-color: rgba(255,255,255,0.05);
            border-radius: 50%;
        }
        .exam-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
        }
        .exam-info {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }
        .info-item {
            display: flex;
            align-items: center;
        }
        .info-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background-color: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
        }
        .info-label {
            font-size: 0.9rem;
            opacity: 0.8;
            margin-bottom: 2px;
        }
        .info-value {
            font-weight: 600;
        }
        .exam-description {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 800px;
            position: relative;
            z-index: 1;
        }
        .jury-board {
            background-color: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 40px;
        }
        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 25px;
            position: relative;
            display: inline-block;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), #7d7df8);
            border-radius: 2px;
        }

        .questions-section {
            margin-bottom: 40px;
        }
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        .section-subtitle {
            color: #777;
            font-size: 1rem;
        }
        .question-cards {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .question-card {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s;
        }
        .question-card:hover {
            transform: translateX(5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        .question-info {
            display: flex;
            align-items: center;
            flex: 1;
        }
        .question-number {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            margin-right: 15px;
        }
        .available .question-number {
            background-color: var(--primary-light);
            color: var(--primary-color);
        }
        .locked .question-number {
            background-color: #f0f0f0;
            color: #aaa;
        }
        .question-title {
            font-weight: 600;
            margin-bottom: 3px;
        }
        .available .question-title {
            color: var(--text-color);
        }
        .locked .question-title {
            color: #aaa;
        }
        .question-meta {
            display: flex;
            gap: 15px;
            font-size: 0.85rem;
        }
        .available .question-meta {
            color: #777;
        }
        .locked .question-meta {
            color: #bbb;
        }
        .question-meta span {
            display: flex;
            align-items: center;
        }
        .question-meta i {
            margin-right: 5px;
        }
        .question-action {
            margin-left: 15px;
        }
        .btn-open {
            background: linear-gradient(45deg, var(--primary-color), #7d7df8);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            font-weight: 600;
            display: flex;
            align-items: center;
            transition: all 0.3s;
            text-decoration: none;
        }
        .btn-open:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(90, 90, 243, 0.3);
            color: white;
        }
        .btn-open i {
            margin-right: 8px;
        }
        .lock-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #aaa;
        }
        .locked {
            opacity: 0.7;
        }
        .status-bar {
            background-color: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }
        .status-item {
            display: flex;
            align-items: center;
        }
        .status-icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-size: 1.2rem;
        }
        .available-icon {
            background-color: var(--primary-light);
            color: var(--primary-color);
        }
        .locked-icon {
            background-color: #f0f0f0;
            color: #aaa;
        }
        .status-info {
            display: flex;
            flex-direction: column;
        }
        .status-label {
            font-size: 0.85rem;
            color: #777;
            margin-bottom: 2px;
        }
        .status-value {
            font-weight: 700;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .btn-custom {
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 600;
            display: flex;
            align-items: center;
            transition: all 0.3s;
            text-decoration: none;
        }
        .btn-primary {
            background: linear-gradient(45deg, var(--primary-color), #7d7df8);
            border: none;
            box-shadow: 0 5px 15px rgba(90, 90, 243, 0.2);
            color: white;
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #4b4bea, #6e6ef7);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(90, 90, 243, 0.3);
            color: white;
        }
        .btn-outline {
            border: 2px solid #ddd;
            background-color: transparent;
            color: #777;
        }
        .btn-outline:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            background-color: var(--primary-light);
        }
        .btn-icon {
            margin-right: 8px;
        }
        @media (max-width: 768px) {
            .exam-info {
                flex-direction: column;
                gap: 15px;
            }

            .status-bar {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }
    </style>

@endpush

@section('content')
    <div class="exam-header">
        <h1 class="exam-title">{{ $exam->title }}</h1>
        <div class="exam-info">
            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div>
                    <div class="info-label">Exam Date</div>
                    <div class="info-value">{{ $exam->formattedDate }}</div>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div>
                    <div class="info-label">Duration</div>
                    <div class="info-value">{{ $exam->formattedDuration }}</div>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <div>
                    <div class="info-label">Total Questions</div>
                    <div class="info-value">{{ $exam->questionCount }} Questions</div>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-award"></i>
                </div>
                <div>
                    <div class="info-label">Total Points</div>
                    <div class="info-value">{{ $exam->total_marks }} Points</div>
                </div>
            </div>
        </div>

        <div class="exam-description">
            {{ $exam->description }}
        </div>
    </div>

    <div class="status-bar">
        <div class="status-item">
            <div class="status-icon available-icon">
                <i class="fas fa-unlock"></i>
            </div>
            <div class="status-info">
                <div class="status-label">Available Now</div>
                <div class="status-value">{{ $availableCount }} {{ $availableCount == 1 ? 'Question' : 'Questions' }}</div>
            </div>
        </div>

        <div class="status-item">
            <div class="status-icon locked-icon">
                <i class="fas fa-lock"></i>
            </div>
            <div class="status-info">
                <div class="status-label">Locked</div>
                <div class="status-value">{{ $lockedCount }} {{ $lockedCount == 1 ? 'Question' : 'Questions' }}</div>
            </div>
        </div>

        <div class="status-item">
            <div class="status-icon available-icon">
                <i class="fas fa-hourglass-half"></i>
            </div>
            <div class="status-info">
                <div class="status-label">Remaining Time</div>
                <div class="status-value" id="remainingTime" data-remaining="{{ $remainingTime }}">{{ $remainingTime }}</div>
            </div>
        </div>

        <div class="status-item">
            <div class="status-icon available-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="status-info">
                <div class="status-label">Completed</div>
                <div class="status-value">{{ $completedCount }}/{{ $exam->questionCount }} Questions</div>
            </div>
        </div>
    </div>

    <div class="questions-section">
        <div class="section-header">
            <h2 class="section-title">Exam Questions</h2>
            <div class="section-subtitle">
                @if($exam->prevent_backtracking)
                    Complete questions in sequential order to unlock the next question
                @else
                    All questions are available to answer in any order
                @endif
            </div>
        </div>

        <div class="question-cards">
            @foreach($questions as $question)
                <div class="question-card {{ $question->status }}">
                    <div class="question-info">
                        <div class="question-number">{{ $loop->iteration }}</div>
                        <div>
                            <div class="question-title">{{ $question->question_title }}</div>
                            <div class="question-meta">
                                <span><i class="fas fa-award"></i> {{ $question->marks }} Points</span>
                                @if($question->time_limit)
                                    <span><i class="fas fa-clock"></i> {{ $question->time_limit }} Minutes</span>
                                @endif
                                {{--<!-- Note: You'll need to add a difficulty field to your questions table if you want this -->
                                @if(isset($question->difficulty))
                                    <span><i class="fas fa-signal"></i> Difficulty: {{ ucfirst($question->difficulty) }}</span>
                                @endif--}}
                            </div>
                        </div>
                    </div>
                    <div class="question-action">
                        @if($question->status === 'available')
                            <a href="{{ route('student.question', ['exam' => $exam->id, 'question' => $question->id]) }}" class="btn-open">
                                <i class="fas fa-external-link-alt"></i> Open
                            </a>
                        @elseif($question->status === 'completed')
                            <div class="completed-icon">
                                <i class="fas fa-check-circle"></i> Completed
                            </div>
                        @else
                            <div class="lock-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="action-buttons">
        <a href="{{ route('user.dashboard') }}" class="btn-custom btn-outline">
            <i class="fas fa-arrow-left btn-icon"></i> Back to Dashboard
        </a>

        @if($attempt->status === 'in_progress')
            <form method="POST" action="{{ route('student.exam.submit', $exam->id) }}" class="d-inline" id="submit-exam-form">
                @csrf
                <button type="button" class="btn-custom btn-primary" onclick="confirmSubmitExam()">
                    <i class="fas fa-check-circle btn-icon"></i> Submit Exam
                </button>
            </form>
        @endif
    </div>

    @push('scripts')

    @endpush
@endsection
