@extends('layouts.main')
@section('title', 'Manage Report')

@push('style')
    <style>

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
        .filter-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }
        .filter-group {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }
        .filter-dropdown {
            background-color: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 10px 15px;
            font-weight: 500;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        .filter-dropdown:hover {
            border-color: var(--primary-color);
        }
        .filter-dropdown i {
            margin-right: 8px;
            color: #777;
        }
        .filter-dropdown .icon-right {
            margin-left: 8px;
            margin-right: 0;
            font-size: 0.8rem;
        }
        .search-box {
            display: flex;
            align-items: center;
            background-color: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 10px 15px;
            transition: all 0.3s;
            width: 250px;
        }
        .search-box:focus-within {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(90, 90, 243, 0.1);
        }
        .search-box input {
            border: none;
            outline: none;
            background-color: transparent;
            flex: 1;
        }
        .search-box i {
            color: #777;
            margin-right: 8px;
        }
        .exams-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }
        .exam-card {
            background-color: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .exam-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        .exam-card-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .exam-subject-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-right: 15px;
        }
        .cs-icon {
            background-color: #e8eaf6;
            color: #3f51b5;
        }
        .math-icon {
            background-color: #e3f2fd;
            color: #2196f3;
        }
        .science-icon {
            background-color: #f1f8e9;
            color: #8bc34a;
        }
        .english-icon {
            background-color: #fff8e1;
            color: #ffc107;
        }
        .exam-info {
            flex: 1;
        }
        .exam-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 5px;
        }
        .exam-subtitle {
            color: #777;
            font-size: 0.85rem;
        }
        .exam-details {
            margin-bottom: 20px;
        }
        .detail-row {
            display: flex;
            margin-bottom: 12px;
            align-items: center;
        }
        .detail-icon {
            width: 25px;
            color: #777;
            margin-right: 10px;
        }
        .detail-text {
            font-size: 0.9rem;
        }
        .status-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .status-active {
            background-color: #e8f5e9;
            color: var(--success-color);
        }
        .status-upcoming {
            background-color: #e3f2fd;
            color: #2196f3;
        }
        .status-completed {
            background-color: #eeeeee;
            color: #757575;
        }
        .student-progress {
            margin-top: auto;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }
        .progress-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .progress-text {
            font-size: 0.9rem;
            color: #777;
        }
        .progress-value {
            font-weight: 600;
        }
        .progress-bar-container {
            height: 8px;
            background-color: #f0f0f0;
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 15px;
        }
        .progress-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--primary-color), #7d7df8);
            border-radius: 4px;
        }
        .view-details {
            display: block;
            text-align: center;
            padding: 10px;
            background-color: var(--primary-light);
            color: var(--primary-color);
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
        }
        .view-details:hover {
            background-color: var(--primary-color);
            color: white;
        }
        .exam-details-card {
            background-color: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 40px;
        }
        .exam-card-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        .submission-stats {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 30px;
        }
        .stat-card {
            background-color: var(--light-bg);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        .stat-card-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 1.2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        .submissions-icon {
            color: var(--primary-color);
        }
        .completed-icon {
            color: var(--success-color);
        }
        .pending-icon {
            color: var(--warning-color);
        }
        .time-icon {
            color: #2196f3;
        }
        .stat-card-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 5px;
        }
        .stat-card-label {
            color: #777;
            font-size: 0.9rem;
        }
        .question-list {
            margin-top: 30px;
        }
        .question-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .question-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
        }
        .question-card {
            background-color: var(--light-bg);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .question-info {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .question-number {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: var(--primary-color);
            margin-right: 15px;
        }
        .question-text {
            font-weight: 600;
        }
        .submission-info {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            border-top: 1px solid rgba(0,0,0,0.05);
            padding-top: 15px;
        }
        .submission-stat {
            display: flex;
            align-items: center;
        }
        .submission-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-size: 0.9rem;
        }
        .submission-label {
            font-size: 0.85rem;
            color: #777;
            margin-bottom: 2px;
        }
        .submission-value {
            font-weight: 600;
        }
        .student-list {
            margin-top: 30px;
        }
        .student-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        .student-table th {
            text-align: left;
            padding: 15px;
            font-weight: 600;
            color: #555;
            background-color: #f8f9fa;
            border-bottom: 2px solid #eee;
        }
        .student-table td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }
        .student-table tr:last-child td {
            border-bottom: none;
        }
        .student-table tr:hover td {
            background-color: var(--primary-light);
        }
        .student-info {
            display: flex;
            align-items: center;
        }
        .student-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-weight: 600;
            margin-right: 12px;
        }
        .student-name {
            font-weight: 600;
            margin-bottom: 3px;
        }
        .student-email {
            color: #777;
            font-size: 0.85rem;
        }
        .status-pill {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        .completed-pill {
            background-color: #e8f5e9;
            color: var(--success-color);
        }
        .pending-pill {
            background-color: #fff8e1;
            color: var(--warning-color);
        }
        .not-started-pill {
            background-color: #eeeeee;
            color: #757575;
        }
        .submission-time {
            display: flex;
            flex-direction: column;
        }
        .time-value {
            font-weight: 600;
        }
        .time-meta {
            color: #777;
            font-size: 0.85rem;
        }
        .action-button {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            background-color: var(--primary-light);
            cursor: pointer;
            transition: all 0.3s;
        }
        .action-button:hover {
            background-color: var(--primary-color);
            color: white;
        }
        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }
        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .page-item {
            margin: 0 5px;
        }
        .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background-color: white;
            border: 1px solid #eee;
            color: #555;
            font-weight: 500;
            text-decoration: none;
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
        .page-item.disabled .page-link {
            color: #ccc;
            pointer-events: none;
        }
    </style>

@endpush

@section('content')
    <!-- Detailed Exam View -->
    <div id="exam-details" class="exam-details-card">
        <h3 class="exam-card-title">{{ $exam->title }}</h3>

        <div class="submission-stats">
            <div class="stat-card">
                <div class="stat-card-icon submissions-icon">
                    <i class="fas fa-paper-plane"></i>
                </div>
                <div class="stat-card-value">{{ $totalSubmissions }}</div>
                <div class="stat-card-label">Total Submissions</div>
            </div>

            <div class="stat-card">
                <div class="stat-card-icon completed-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-card-value">{{ $completedCount }}</div>
                <div class="stat-card-label">Completed All Questions</div>
            </div>

            <div class="stat-card">
                <div class="stat-card-icon pending-icon">
                    <i class="fas fa-hourglass-half"></i>
                </div>
                <div class="stat-card-value">{{ $inProgressCount }}</div>
                <div class="stat-card-label">In Progress</div>
            </div>

            <div class="stat-card">
                <div class="stat-card-icon time-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-card-value">{{ $avgCompletionTime }}</div>
                <div class="stat-card-label">Average Completion Time</div>
            </div>
        </div>

        <div class="question-list">
            <div class="question-header">
                <div class="question-title">Question Submissions</div>
            </div>

            @foreach($questionStats as $index => $stat)
                <div class="question-card">
                    <div class="question-info">
                        <div class="question-number">{{ $index + 1 }}</div>
                        <div class="question-text">{{ $stat['question']->question_text }}</div>
                    </div>

                    <div class="submission-info">
                        <div class="submission-stat">
                            <div class="submission-icon" style="color: var(--primary-color);">
                                <i class="fas fa-users"></i>
                            </div>
                            <div>
                                <div class="submission-label">Submissions</div>
                                <div class="submission-value">{{ $stat['submissions'] }}</div>
                            </div>
                        </div>

                        <div class="submission-stat">
                            <div class="submission-icon" style="color: var(--success-color);">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <div class="submission-label">Completed</div>
                                <div class="submission-value">{{ $stat['completed'] }}</div>
                            </div>
                        </div>

                        <div class="submission-stat">
                            <div class="submission-icon" style="color: #2196f3;">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <div class="submission-label">Avg. Time</div>
                                <div class="submission-value">{{ $stat['avgTime'] }}</div>
                            </div>
                        </div>

                        <div class="submission-stat">
                            <div class="submission-icon" style="color: var(--warning-color);">
                                <i class="fas fa-stopwatch"></i>
                            </div>
                            <div>
                                <div class="submission-label">Quickest</div>
                                <div class="submission-value">{{ $stat['quickestTime'] }}</div>
                            </div>
                        </div>

                        <div class="submission-stat">
                            <div class="submission-icon" style="color: var(--danger-color);">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <div>
                                <div class="submission-label">Slowest</div>
                                <div class="submission-value">{{ $stat['slowestTime'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="student-list">
            <div class="question-header">
                <div class="question-title">Student Submissions</div>
            </div>

            <div class="table-responsive">
                <table class="student-table">
                    <thead>
                    <tr>
                        <th>Student</th>
                        <th>Progress</th>
                        <th>First Submission</th>
                        <th>Latest Submission</th>
                        <th>Total Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($studentSubmissions as $submission)
                        <tr>
                            <td>
                                <div class="student-info">
                                    @php
                                        $nameParts = explode(' ', $submission['student']->name);
                                        $initials = strtoupper(substr($nameParts[0] ?? '', 0, 1) . substr($nameParts[1] ?? '', 0, 1));
                                    @endphp
                                    <div class="student-avatar">{{ $initials }}</div>
                                    <div>
                                        <div class="student-name">{{ $submission['student']->name }}</div>
                                        <div class="student-email">{{ $submission['student']->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $submission['progress'] }}</td>
                            <td>
                                <div class="submission-time">
                                    @if($submission['firstSubmission'])
                                        <div class="time-value">{{ $submission['firstSubmission']->format('h:i A') }}</div>
                                        <div class="time-meta">{{ $submission['firstSubmission']->format('M d, Y') }}</div>
                                    @else
                                        <div class="time-value">-</div>
                                        <div class="time-meta">-</div>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="submission-time">
                                    @if($submission['lastSubmission'])
                                        <div class="time-value">{{ $submission['lastSubmission']->format('h:i A') }}</div>
                                        <div class="time-meta">{{ $submission['lastSubmission']->format('M d, Y') }}</div>
                                    @else
                                        <div class="time-value">-</div>
                                        <div class="time-meta">-</div>
                                    @endif
                                </div>
                            </td>
                            <td>{{ $submission['totalTime'] }}</td>
                            <td>
                                @php
                                    $statusClass = match($submission['status']) {
                                        'completed' => 'completed-pill',
                                        'in_progress' => 'pending-pill',
                                        default => 'not-started-pill'
                                    };
                                    $statusText = match($submission['status']) {
                                        'completed' => 'Completed',
                                        'in_progress' => 'In Progress',
                                        'not_started' => 'Not Started',
                                        'timed_out' => 'Timed Out',
                                        default => ucfirst(str_replace('_', ' ', $submission['status']))
                                    };
                                @endphp
                                <span class="status-pill {{ $statusClass }}">{{ $statusText }}</span>
                            </td>
                            <td>
                                <a href="{{ route('grading.student', $submission['attempt_id']) }}" class="action-button">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No submissions found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            @if(count($studentSubmissions) > 10)
                <div class="pagination-container">
                    <ul class="pagination">
                        <li class="page-item disabled">
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
            @endif
        </div>
    </div>


@endsection
@push('script')
    <script>

    </script>
@endpush
