@extends('layouts.main')

@section('pageTitle', $exam->title)
@push('style')
    <style>
        .exam-detail-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .exam-detail-section {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            padding: 25px;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .section-title i {
            margin-right: 10px;
            color: #4361ee;
        }

        .detail-row {
            display: flex;
            margin-bottom: 15px;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }

        .detail-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .detail-label {
            width: 150px;
            font-weight: 500;
            color: #666;
        }

        .detail-value {
            flex: 1;
            color: #333;
        }

        .question-list {
            margin-top: 15px;
        }

        .question-item {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            border-left: 3px solid #4361ee;
        }

        .question-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .question-title {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .question-type {
            background: #e9ecef;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 0.8rem;
            color: #495057;
        }

        .question-text {
            margin-bottom: 15px;
        }

        .options-list {
            list-style: none;
            padding: 0;
        }

        .option-item {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            margin-bottom: 5px;
            background: #fff;
            border-radius: 5px;
            border: 1px solid #dee2e6;
        }

        .option-marker {
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #edf2ff;
            border-radius: 50%;
            margin-right: 10px;
            color: #4361ee;
            font-weight: 600;
        }

        .option-correct {
            background: #d4edda;
            border-color: #c3e6cb;
        }

        .option-correct .option-marker {
            background: #28a745;
            color: white;
        }

        .quick-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }

        .stat-card {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .stat-icon {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: #4361ee;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .action-btn {
            flex: 1;
            text-align: center;
            padding: 12px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .action-btn i {
            margin-right: 8px;
        }

        .btn-primary {
            background: #4361ee;
            color: white;
        }

        .btn-primary:hover {
            background: #3a56d4;
        }

        .btn-secondary {
            background: #e9ecef;
            color: #495057;
        }

        .btn-secondary:hover {
            background: #dee2e6;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background: #c82333;
        }

        .status-pill {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .status-active {
            background: #d1fae5;
            color: #047857;
        }

        .status-upcoming {
            background: #dbeafe;
            color: #1e40af;
        }

        .status-completed {
            background: #ede9fe;
            color: #6d28d9;
        }

        .status-draft {
            background: #f3f4f6;
            color: #6b7280;
        }

        .student-list {
            max-height: 300px;
            overflow-y: auto;
        }

        .student-item {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .student-item:last-child {
            border-bottom: none;
        }

        .student-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-weight: 600;
            color: #495057;
        }

        .student-info {
            flex: 1;
        }

        .student-name {
            font-weight: 500;
            margin-bottom: 3px;
        }

        .student-email {
            font-size: 0.85rem;
            color: #6c757d;
        }

        .student-score {
            font-weight: 600;
            color: #4361ee;
        }
    </style>
@endpush

@section('content')
    <div class="page-header">
        <h1 class="page-title">{{ $exam->title }}</h1>
        <span class="status-pill status-{{ $exam->isActive() ? 'active' : ($exam->isUpcoming() ? 'upcoming' : ($exam->isCompleted() ? 'completed' : 'draft')) }}">
            {{ $exam->status_text }}
        </span>
    </div>

    <div class="action-buttons">
        <a href="{{ route('admin.manage.exam') }}" class="action-btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            Back to List
        </a>
        <a href="{{ route('admin.exam.edit', $exam) }}" class="action-btn btn-primary">
            <i class="fas fa-edit"></i>
            Edit Exam
        </a>
        @if($exam->isDraft())
            <form method="POST" action="{{ route('admin.exam.published', $exam) }}" style="flex: 1;">
                @csrf
                @method('PUT')
                <input type="hidden" name="publish" value="1">
                <button type="submit" class="action-btn btn-primary" style="width: 100%; border: none;">
                    <i class="fas fa-check-circle"></i>
                    Publish Exam
                </button>
            </form>
        @endif
        <form method="POST" action="{{ route('admin.exam.destroy', $exam) }}" style="flex: 1;" onsubmit="return confirm('Are you sure you want to delete this exam?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="action-btn btn-danger" style="width: 100%; border: none;">
                <i class="fas fa-trash-alt"></i>
                Delete Exam
            </button>
        </form>
    </div>

    <div class="exam-detail-container">
        <div class="exam-main-content">
            <div class="exam-detail-section">
                <h3 class="section-title">
                    <i class="fas fa-info-circle"></i> Basic Information
                </h3>
                <div class="detail-row">
                    <div class="detail-label">Subject Area</div>
                    <div class="detail-value">{{ $exam->subject_area }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Description</div>
                    <div class="detail-value">{{ $exam->description ?? 'No description provided.' }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Date & Time</div>
                    <div class="detail-value">{{ $exam->formatted_date }} at {{ $exam->formatted_time }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Duration</div>
                    <div class="detail-value">{{ $exam->formatted_duration }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Total Marks</div>
                    <div class="detail-value">{{ $exam->total_marks }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Passing Score</div>
                    <div class="detail-value">{{ $exam->passing_score }}%</div>
                </div>
         {{--       <div class="detail-row">
                    <div class="detail-label">Created By</div>
                    <div class="detail-value">{{ $exam->creator->name ?? 'Unknown' }}</div>
                </div>--}}
            </div>

            <div class="exam-detail-section">
                <h3 class="section-title">
                    <i class="fas fa-cog"></i> Exam Settings
                </h3>
                <div class="detail-row">
                    <div class="detail-label">Access Control</div>
                    <div class="detail-value">{{ ucfirst($exam->access_control) }}</div>
                </div>
                @if($exam->access_control === 'password')
                    <div class="detail-row">
                        <div class="detail-label">Password</div>
                        <div class="detail-value">******** <small>(hidden for security)</small></div>
                    </div>
                @endif
                <div class="detail-row">
                    <div class="detail-label">Question Settings</div>
                    <div class="detail-value">{{ str_replace('_', ' ', ucfirst($exam->question_settings)) }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Time Tracking</div>
                    <div class="detail-value">{{ str_replace('_', ' ', ucfirst($exam->time_tracking)) }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Features</div>
                    <div class="detail-value">
                        <ul style="padding-left: 20px; margin: 0;">
                            @if($exam->randomize_questions)
                                <li>Randomize question order</li>
                            @endif
                            @if($exam->show_results)
                                <li>Show results immediately after completion</li>
                            @endif
                            @if($exam->prevent_backtracking)
                                <li>Prevent backtracking to previous questions</li>
                            @endif
                            @if($exam->enable_proctoring)
                                <li>Enable proctoring (prevents tab switching)</li>
                            @endif
                            @if($exam->disable_copy_paste)
                                <li>Disable copy and paste functionality</li>
                            @endif
                            @if($exam->disable_right_click)
                                <li>Disable right-click menu</li>
                            @endif
                            @if(!$exam->randomize_questions && !$exam->show_results && !$exam->prevent_backtracking && !$exam->enable_proctoring && !$exam->disable_copy_paste && !$exam->disable_right_click)
                                <li>No special features enabled</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="exam-detail-section">
                <h3 class="section-title">
                    <i class="fas fa-question-circle"></i> Questions ({{ $exam->questions->count() }})
                </h3>

                @if($exam->questions->count() > 0)
                    <div class="question-list">
                        @foreach($exam->questions as $question)
                            <div class="question-item">
                                <div class="question-header">
                                    <div class="question-title">{{ $loop->iteration }}. {{ $question->question_title }}</div>
                                    <div class="question-type">{{ ucfirst($question->question_type) }}</div>
                                </div>
                                <div class="question-text">{{ $question->question_text }}</div>

                                @if($question->question_type === 'mcq')
                                    {{-- Load options if they weren't eager loaded --}}
                                    @php
                                        // Manually load the options relationship for this specific question
                                        $options = App\Models\QuestionOption::where('question_id', $question->id)->orderBy('sort_order')->get();

                                    @endphp

                                    @if(count($options) > 0)
                                        <ul class="options-list">
                                            @foreach($options as $option)
                                                <li class="option-item {{ $option->is_correct ? 'option-correct' : '' }}">
                                                    <div class="option-marker">{{ chr(65 + $loop->index) }}</div>
                                                    <div class="option-text">{{ $option->option_text }}</div>
                                                    @if($option->is_correct)
                                                        <div style="margin-left: auto; color: #28a745;">
                                                            <i class="fas fa-check-circle"></i> Correct
                                                        </div>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <div class="alert alert-warning">
                                            <i class="fas fa-exclamation-triangle"></i>
                                            No options found for this multiple choice question.
                                        </div>
                                    @endif
                                @elseif($question->question_type === 'description')
                                    <div style="background: #f8f9fa; padding: 10px; border-radius: 5px;">
                                        <p><strong>Answer Format:</strong> {{ ucfirst($question->answer_format) }}</p>
                                        @if($question->marks)
                                            <p><strong>Marks:</strong> {{ $question->marks }}</p>
                                        @endif
                                        @if($question->time_limit)
                                            <p><strong>Time Limit:</strong> {{ $question->time_limit }} minutes</p>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <div style="text-align: center; padding: 20px;">
                        <i class="fas fa-exclamation-circle" style="font-size: 2rem; color: #f9a825; margin-bottom: 10px;"></i>
                        <p>No questions have been added to this exam yet.</p>
                        <a href="{{ route('admin.exam.edit', $exam) }}" class="btn-primary-custom" style="display: inline-block; margin-top: 10px;">
                            <i class="fas fa-plus"></i> Add Questions
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <div class="exam-sidebar">
            <div class="quick-stats">
                <div class="stat-card">
                    <i class="fas fa-question-circle stat-icon"></i>
                    <div class="stat-value">{{ $exam->questions->count() }}</div>
                    <div class="stat-label">Questions</div>
                </div>

                <div class="stat-card">
                    <i class="fas fa-clock stat-icon"></i>
                    <div class="stat-value">{{ $exam->duration }} min</div>
                    <div class="stat-label">Duration</div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-trophy stat-icon"></i>
                    <div class="stat-value">{{ $exam->total_marks }}</div>
                    <div class="stat-label">Marks</div>
                </div>
            </div>

            <div class="exam-detail-section">
                <h3 class="section-title">
                    <i class="fas fa-calendar-alt"></i> Exam Schedule
                </h3>
                <div style="text-align: center; padding: 15px 0;">
                    <div style="font-size: 1.2rem; font-weight: 600; margin-bottom: 5px;">{{ $exam->formatted_date }}</div>
                    <div style="font-size: 1.5rem; font-weight: 700; margin-bottom: 10px;">{{ $exam->formatted_time }}</div>
                    <div style="background: #f8f9fa; padding: 8px; border-radius: 5px; display: inline-block;">
                        <i class="fas fa-clock"></i> {{ $exam->formatted_duration }}
                    </div>
                </div>

                @if($exam->isUpcoming())
                    <div style="background: #dbeafe; padding: 10px; border-radius: 5px; margin-top: 15px; text-align: center;">
                        <i class="fas fa-info-circle"></i>
                        <span style="font-weight: 500;">
                        This exam will start in
                        {{ Carbon\Carbon::now()->diffForHumans($exam->exam_date->setTimeFromTimeString($exam->start_time), ['parts' => 2]) }}
                    </span>
                    </div>
                @endif
            </div>



            @if($exam->isCompleted())
                <div class="exam-detail-section">
                    <h3 class="section-title">
                        <i class="fas fa-chart-bar"></i> Results Summary
                    </h3>

                    <!-- This would be populated with real data in a full implementation -->
                    <div style="text-align: center; padding: 15px 0;">
                        <div style="font-size: 1.8rem; font-weight: 700; margin-bottom: 10px;">78%</div>
                        <div style="color: #6c757d; margin-bottom: 15px;">Average Score</div>

                        <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
                            <div>
                                <div style="font-weight: 600; font-size: 1.1rem;">92%</div>
                                <div style="color: #6c757d; font-size: 0.9rem;">Highest</div>
                            </div>
                            <div>
                                <div style="font-weight: 600; font-size: 1.1rem;">65%</div>
                                <div style="color: #6c757d; font-size: 0.9rem;">Lowest</div>
                            </div>
                            <div>
                                <div style="font-weight: 600; font-size: 1.1rem;">85%</div>
                                <div style="color: #6c757d; font-size: 0.9rem;">Pass Rate</div>
                            </div>
                        </div>

                        <a href="#" class="btn-primary-custom" style="display: inline-block;">
                            <i class="fas fa-download"></i> Download Results
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('script')
    <script>
        // You can add JavaScript for the exam detail page here
    </script>
@endpush
