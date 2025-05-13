@extends('layouts.main')

@section('pageTitle', 'Dashboard')
@section('content')

    <div class="welcome-card">
        <div class="welcome-content">
            <h2 class="welcome-title" id="welcomeMessage">Welcome back, {{ Auth::user()->name }}!</h2>
            <p class="welcome-subtitle">Manage exams, create questions, monitor student performance from your dashboard.</p>
            <a href="{{route('admin.manage.exam')}}" >
            <button class="btn btn-light btn-custom">
                <i class="fas fa-plus btn-icon"></i> Manage Exam
            </button>
            </a>

        </div>
    </div>


    <!-- Dynamic Statistics Section -->
    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-clipboard-list"></i>
            </div>
            <div class="stat-value counter-animation">{{ $totalExams }}</div>
            <div class="stat-label">Total Exams</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-user-graduate"></i>
            </div>
            <div class="stat-value counter-animation">{{ $activeStudents }}</div>
            <div class="stat-label">Active Students</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-question-circle"></i>
            </div>
            <div class="stat-value counter-animation">{{ $totalQuestions }}</div>
            <div class="stat-label">Questions Created</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-chart-bar"></i>
            </div>
            <div class="stat-value counter-animation">{{ $completionRate }}%</div>
            <div class="stat-label">Completion Rate</div>
        </div>
    </div>
    <!-- Quick Actions Panel -->
    <div class="section-header">
        <h2 class="section-title">Quick Actions</h2>
    </div>

    <div class="exams-grid">
        <a href="{{route('admin.exam.create')}}" class="quick-action-card">
            <div class="quick-action-icon">
                <i class="fas fa-plus-circle"></i>
            </div>
            <div class="quick-action-title">Create New Exam</div>
            <div class="quick-action-desc">Set up a new exam with questions and time limits</div>
        </a>

     {{--   <a href="#" class="quick-action-card">
            <div class="quick-action-icon">
                <i class="fas fa-question-circle"></i>
            </div>
            <div class="quick-action-title">Question Bank</div>
            <div class="quick-action-desc">Manage your collection of questions</div>
        </a>--}}

        <a href="{{route('admin.student.create')}}" class="quick-action-card">
            <div class="quick-action-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <div class="quick-action-title">Add Students</div>
            <div class="quick-action-desc">Register new students or import from CSV</div>
        </a>

        <a href="#" class="quick-action-card">
            <div class="quick-action-icon">
                <i class="fas fa-chart-bar"></i>
            </div>
            <div class="quick-action-title">View Reports</div>
            <div class="quick-action-desc">Analyze exam performances and statistics</div>
        </a>
    </div>


    <div class="countdown-card">
        <h3 class="countdown-title">Next Exam: {{ $examTitle }}</h3>
        <div class="countdown-display">
            @foreach(['days' => 'DAYS', 'hours' => 'HOURS', 'minutes' => 'MINUTES', 'seconds' => 'SECONDS'] as $id => $label)
                <div class="countdown-item">
                    <div class="countdown-value" id="{{ $id }}Value">--</div>
                    <div class="countdown-label">{{ $label }}</div>
                </div>
            @endforeach
        </div>
    </div>

    @if($examTimestamp)
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const countdownElements = {
                    days: document.getElementById('daysValue'),
                    hours: document.getElementById('hoursValue'),
                    minutes: document.getElementById('minutesValue'),
                    seconds: document.getElementById('secondsValue'),
                };

                const targetTime = new Date({{ $examTimestamp }});

                const updateCountdown = () => {
                    const now = new Date().getTime();
                    const distance = targetTime.getTime() - now;

                    if (distance <= 0) {
                        clearInterval(timer);
                        for (const key in countdownElements) {
                            countdownElements[key].textContent = '00';
                        }
                        document.querySelector('.countdown-title').textContent = 'Exam In Progress';
                        return;
                    }

                    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    countdownElements.days.textContent = String(days).padStart(2, '0');
                    countdownElements.hours.textContent = String(hours).padStart(2, '0');
                    countdownElements.minutes.textContent = String(minutes).padStart(2, '0');
                    countdownElements.seconds.textContent = String(seconds).padStart(2, '0');
                };

                const timer = setInterval(updateCountdown, 1000);
                updateCountdown(); // initial call
            });
        </script>
    @endif


    <div id="upcomingExamContainer">
        <div class="section-header">
            <h2 class="section-title">Upcoming Exams</h2>
            <a href="{{ route('admin.manage.exam') }}" class="view-all">View All <i class="fas fa-chevron-right"></i></a>
        </div>

        <div class="exams-grid">
            @forelse($upcomingExams as $exam)
                @php
                    $examDate = \Carbon\Carbon::parse($exam->exam_date);
                    $startTime = \Carbon\Carbon::parse($exam->start_time);
                    $duration = $exam->duration ?? 0;
                    $startDateTime = $examDate->copy()->setTimeFrom($startTime);
                    $endDateTime = $startDateTime->copy()->addMinutes($duration);
                    $now = \Carbon\Carbon::now();

                    $statusText = $now->between($startDateTime, $endDateTime)
                        ? 'Active Now'
                        : 'Starts in ' . ceil($now->floatDiffInDays($startDateTime)) . ' days';
                    $statusClass = $now->between($startDateTime, $endDateTime)
                        ? 'status-active pulse-animation'
                        : 'status-upcoming';
                @endphp

                <div class="exam-card">
                    <div class="exam-card-header">
                        <div class="exam-subject-icon {{ strtolower(str_replace(' ', '-', $exam->subject_area)) }}-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <div class="exam-info">
                            <div class="exam-title">{{ $exam->title }}</div>
                            <div class="exam-subtitle">
                                {{ $exam->question_count ?? 'N/A' }} questions
                            </div>
                        </div>
                    </div>

                    <div class="exam-details">
                        <div class="detail-row">
                            <div class="detail-icon"><i class="fas fa-calendar-alt"></i></div>
                            <div class="detail-text">{{ $examDate->format('j M, Y') }} , {{ $startTime->format('g:i A') }}</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-icon"><i class="fas fa-clock"></i></div>
                            <div class="detail-text">{{ $exam->formatted_duration }}</div>
                        </div>
                    </div>

                    <div class="exam-status">
                        <span class="status-badge {{ $statusClass }}">{{ $statusText }}</span>

                            <a href="{{ route('admin.exam.show', $exam->id) }}" class="exam-action action-view">
                                <i class="fas fa-eye"></i> View Details
                            </a>

                    </div>
                </div>
            @empty
                <p>No upcoming or running exams at the moment.</p>
            @endforelse
        </div>
    </div>

    <!-- Exam Results Section -->
{{--
    <div class="section-header">
        <h2 class="section-title">Recent Results</h2>
        <a href="#" class="view-all">View All <i class="fas fa-chevron-right"></i></a>
    </div>

    <div class="recent-results">
        <div class="result-item">
            <div class="result-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="result-info">
                <div class="result-title">Physics Fundamentals</div>
                <div class="result-date">Completed on May 2, 2025</div>
            </div>
            <div class="result-score">92%</div>
        </div>

        <div class="result-item">
            <div class="result-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="result-info">
                <div class="result-title">English Literature</div>
                <div class="result-date">Completed on April 28, 2025</div>
            </div>
            <div class="result-score">85%</div>
        </div>

        <div class="result-item">
            <div class="result-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="result-info">
                <div class="result-title">History: Modern Era</div>
                <div class="result-date">Completed on April 22, 2025</div>
            </div>
            <div class="result-score">78%</div>
        </div>
    </div>
--}}

    <br>

@endsection
