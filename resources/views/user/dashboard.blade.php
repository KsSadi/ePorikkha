@extends('layouts.main')

@section('pageTitle', 'Dashboard')
@section('content')

    <div class="welcome-card">
        <div class="welcome-content">
            <h2 class="welcome-title" id="welcomeMessage">Welcome back, {{ Auth::user()->name }}!</h2>
            <p class="welcome-subtitle">Keep track of your upcoming exams, check your results</p>

        </div>
    </div>

    <div class="dashboard-container">
        <!-- Dynamic Statistics Section -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-clipboard-check"></i>
                </div>
                <div class="stat-value">{{$completedAttempts}}</div>
                <div class="stat-label">Exams Completed</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-value">{{$inProgressAttemptsCount}}</div>
                <div class="stat-label">In Progress Exam</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <div class="stat-value">{{$upcomingExamsCount}}</div>
                <div class="stat-label">Upcoming Exams</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <div class="stat-value">{{$publishedExams}}</div>
                <div class="stat-label">Total Exam</div>
            </div>
        </div>



    @if($inProgressAttempts->count() > 0)
        <div id="inProgressExamContainer">
            <div class="section-header">
                <h2 class="section-title">In-Progress Exams</h2>
{{--                <a href="{{ route('admin.manage.exam') }}" class="view-all">View All <i class="fas fa-chevron-right"></i></a>--}}
            </div>

            <div class="exams-grid">
                @foreach($inProgressAttempts as $attempt)

                    <div class="exam-card">
                        <div class="exam-card-header">
                            <div class="exam-subject-icon {{ strtolower(str_replace(' ', '-', $attempt->exam->subject_area)) }}-icon">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <div class="exam-info">
                                <div class="exam-title">{{ $attempt->exam->title }}</div>
                                <div class="exam-subtitle">
                                    {{ $attempt->exam->question_count ?? 'N/A' }} questions
                                </div>
                            </div>
                        </div>

                        <div class="exam-details">

                            <div class="detail-row">
                                <div class="detail-icon"><i class="fas fa-clock"></i></div>
                                <div class="detail-text"> Started {{ $attempt->start_time->diffForHumans() }}</div>
                            </div>
                            <div class="detail-row">
                                <div class="detail-icon"><i class="fas fa-hourglass-half"></i></div>
                                <div class="detail-text"> Continue where you left off
                                </div>
                            </div>
                        </div>

                        <div class="exam-status">
                            <span class="status-badge "></span>
                                <a href="{{ route('student.exam', $attempt->exam_id) }}" class="exam-action action-start">
                                    <i class="fas fa-play"></i> Continue Exam
                                </a>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @endif

            <div id="upcomingExamContainer">
                <div class="section-header">
                    <h2 class="section-title">Upcoming Exams</h2>
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
                                @if($now->between($startDateTime, $endDateTime))
                                    <a href="{{ route('student.exam', $exam->id) }}" class="exam-action action-start">
                                        <i class="fas fa-play"></i> Start Exam
                                    </a>
                                @else
                                {{--    <a href="{{ route('admin.exam.show', $exam->id) }}" class="exam-action action-view">
                                        <i class="fas fa-eye"></i> View Details
                                    </a>--}}
                                @endif
                            </div>
                        </div>
                    @empty
                        <p>No upcoming or running exams at the moment.</p>
                    @endforelse
                </div>
            </div>



            <!-- Active Exams Section -->
      {{--  <div class="dashboard-card active-exams-card">
            <div class="card-header">
                <h2><i class="fas fa-bolt"></i> Active Exams</h2>
                <p>Exams that are currently available for you to take</p>
            </div>

            <div class="card-content">
                @if($activeExams->count() > 0)
                    <div class="exams-grid">
                        @foreach($activeExams as $exam)
                            <div class="exam-item">
                                <div class="exam-icon">
                                    <i class="{{ $exam->iconClass }}"></i>
                                </div>
                                <div class="exam-details">
                                    <h3 class="exam-title">{{ $exam->title }}</h3>
                                    <div class="exam-meta">
                                        <span><i class="fas fa-clock"></i> {{ $exam->formattedDuration }}</span>
                                        <span><i class="fas fa-question-circle"></i> {{ $exam->questionCount }} Questions</span>
                                    </div>
                                    <div class="exam-time-remaining">
                                            <?php
                                            $examStartDateTime = Carbon\Carbon::parse($exam->exam_date->format('Y-m-d') . ' ' . $exam->start_time);
                                            $examEndDateTime = $examStartDateTime->copy()->addMinutes($exam->duration);
                                            $now = Carbon\Carbon::now();
                                            $timeRemaining = $now->diffInMinutes($examEndDateTime);
                                            ?>
                                        <span class="time-alert">
                                            <i class="fas fa-hourglass-half"></i>
                                            Ends in {{ $timeRemaining }} minutes
                                        </span>
                                    </div>
                                </div>
                                <div class="exam-actions">
                                    <form method="POST" action="{{ route('student.exam.start', $exam->id) }}">
                                        @csrf
                                        <button type="submit" class="btn-attend">
                                            <i class="fas fa-play-circle"></i> Attend Exam
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="no-exams-message">
                        <i class="fas fa-info-circle"></i>
                        <p>There are no active exams at the moment. Check back later!</p>
                    </div>
                @endif
            </div>
        </div>--}}





      {{--  <!-- Recently Completed Exams Section -->
        @if($completedAttempts->count() > 0)
            <div class="dashboard-card completed-exams-card">
                <div class="card-header">
                    <h2><i class="fas fa-check-circle"></i> Recent Exam Results</h2>
                    <p>Your most recent exam attempts</p>
                </div>

                <div class="card-content">
                    <table class="results-table">
                        <thead>
                        <tr>
                            <th>Exam</th>
                            <th>Date</th>
                            <th>Score</th>
                            <th>Result</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($completedAttempts as $attempt)
                            <tr>
                                <td>{{ $attempt->exam->title }}</td>
                                <td>{{ $attempt->end_time->format('M d, Y') }}</td>
                                <td>
                                    {{ $attempt->score }}/{{ $attempt->exam->total_marks }}
                                    ({{ number_format($attempt->percentage, 1) }}%)
                                </td>
                                <td>
                                        <span class="badge {{ $attempt->passed ? 'badge-success' : 'badge-danger' }}">
                                            {{ $attempt->passed ? 'Passed' : 'Failed' }}
                                        </span>
                                </td>
                                <td>
                                    <a href="{{ route('student.exam.result', $attempt->id) }}" class="btn-view-result">
                                        <i class="fas fa-eye"></i> View Results
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif--}}
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



    <br>

@endsection
