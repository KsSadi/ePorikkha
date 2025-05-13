@extends('layouts.main')
@section('title', 'Manage Report')
@push('style')
    <style>
        :root {
            --primary-color: #5a5af3;
            --primary-light: #eeeeff;
            --secondary-color: #ff7373;
            --text-color: #333;
            --light-bg: #f9faff;
            --success-color: #4caf50;
            --warning-color: #ff9800;
            --danger-color: #f44336;
        }
        body {
            background: linear-gradient(135deg, #f9faff 0%, #f0f3ff 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
            min-height: 100vh;
            padding: 0;
            margin: 0;
        }
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .logo {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        .logo-icon {
            font-size: 1.8rem;
            margin-right: 10px;
        }
        .user-info {
            display: flex;
            align-items: center;
        }
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-weight: bold;
            margin-right: 12px;
            box-shadow: 0 3px 8px rgba(90, 90, 243, 0.2);
        }
        .user-name {
            font-weight: 600;
        }
        .user-role {
            color: #777;
            font-size: 0.85rem;
        }
        .header-action {
            background-color: transparent;
            color: #777;
            border: none;
            font-size: 1rem;
            display: flex;
            align-items: center;
            padding: 8px 16px;
            border-radius: 20px;
            transition: all 0.3s;
            cursor: pointer;
            text-decoration: none;
        }
        .header-action:hover {
            background-color: rgba(0,0,0,0.05);
            color: var(--primary-color);
        }
        .header-action i {
            margin-right: 8px;
        }
        .breadcrumb-nav {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .breadcrumb-link {
            color: #777;
            text-decoration: none;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
        }
        .breadcrumb-link:hover {
            color: var(--primary-color);
        }
        .breadcrumb-separator {
            margin: 0 10px;
            color: #ccc;
        }
        .breadcrumb-current {
            font-weight: 600;
            color: var(--primary-color);
        }
        .student-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #7d7df8 100%);
            border-radius: 20px;
            padding: 30px;
            color: white;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(90, 90, 243, 0.3);
        }
        .student-header::before, .student-header::after {
            content: '';
            position: absolute;
            border-radius: 50%;
        }
        .student-header::before {
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background-color: rgba(255,255,255,0.1);
        }
        .student-header::after {
            bottom: -80px;
            left: -80px;
            width: 300px;
            height: 300px;
            background-color: rgba(255,255,255,0.05);
        }
        .student-profile {
            display: flex;
            align-items: center;
            position: relative;
            z-index: 1;
        }
        .student-avatar-large {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-weight: bold;
            font-size: 2rem;
            margin-right: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .student-details h2 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        .student-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
            position: relative;
            z-index: 1;
        }
        .meta-item {
            display: flex;
            align-items: center;
        }
        .meta-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background-color: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-size: 1.2rem;
        }
        .meta-label {
            font-size: 0.85rem;
            opacity: 0.8;
            margin-bottom: 2px;
        }
        .meta-value {
            font-size: 1.1rem;
            font-weight: 600;
        }
        .exam-details-card {
            background-color: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        .card-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .grade-summary {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 20px;
        }
        .grade-item {
            flex: 1;
            min-width: 150px;
            background-color: var(--light-bg);
            border-radius: 12px;
            padding: 15px;
            text-align: center;
        }
        .grade-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 5px;
        }
        .grade-label {
            color: #777;
            font-size: 0.9rem;
        }
        .answer-question-block {
            background-color: var(--light-bg);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            border-left: 4px solid var(--primary-color);
        }
        .question-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }
        .question-number {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .question-badge {
            width: 35px;
            height: 35px;
            border-radius: 10px;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }
        .question-title {
            font-size: 1.1rem;
            font-weight: 600;
        }
        .question-points {
            display: flex;
            align-items: center;
            gap: 5px;
            background-color: white;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 0.9rem;
            color: #777;
        }
        .question-content {
            margin-bottom: 20px;
            padding: 15px;
            background-color: white;
            border-radius: 8px;
            border: 1px solid #eee;
        }
        .question-text {
            margin-bottom: 0;
        }
        .answer-section {
            margin-bottom: 25px;
        }
        .answer-label {
            display: block;
            font-size: 0.9rem;
            font-weight: 600;
            color: #555;
            margin-bottom: 10px;
        }
        .answer-content {
            padding: 18px;
            background-color: white;
            border-radius: 8px;
            border: 1px solid #eee;
            margin-bottom: 20px;
            font-size: 0.95rem;
            line-height: 1.6;
        }
        .code-answer {
            font-family: monospace;
            white-space: pre-wrap;
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #eee;
            font-size: 0.9rem;
            overflow-x: auto;
        }
        .grade-section {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            border: 1px solid #eee;
        }
        .grade-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .grade-row {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            gap: 20px;
        }
        .grade-input-group {
            flex: 1;
            min-width: 200px;
        }
        .grade-label {
            display: block;
            font-size: 0.9rem;
            font-weight: 600;
            color: #555;
            margin-bottom: 10px;
        }
        .grade-input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
        }
        .grade-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(90, 90, 243, 0.1);
            outline: none;
        }
        .grade-input-small {
            max-width: 100px;
        }
        textarea.grade-input {
            min-height: 120px;
            resize: vertical;
        }
        .grade-action-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 20px;
        }
        .btn-custom {
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 600;
            display: flex;
            align-items: center;
            transition: all 0.3s;
            cursor: pointer;
            border: none;
        }
        .btn-outline {
            background-color: transparent;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
        }
        .btn-outline:hover {
            background-color: var(--primary-light);
        }
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        .btn-primary:hover {
            background-color: #4949e7;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(90, 90, 243, 0.2);
        }
        .btn-icon {
            margin-right: 8px;
        }
        .submission-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 20px;
            margin-top: 30px;
            border-top: 1px solid #eee;
        }
        .overall-grade {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .overall-grade-label {
            font-size: 1.1rem;
            font-weight: 600;
        }
        .overall-grade-value {
            background-color: var(--primary-color);
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 1.1rem;
        }
        .grade-percentage {
            font-size: 0.9rem;
            font-weight: normal;
            opacity: 0.8;
            margin-left: 5px;
        }
        .question-nav {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }
        .question-nav-btn {
            padding: 12px 20px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            color: #555;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: all 0.3s;
        }
        .question-nav-btn:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }
        .question-nav-btn.disabled {
            color: #ccc;
            pointer-events: none;
        }
        .prev-icon {
            margin-right: 8px;
        }
        .next-icon {
            margin-left: 8px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .student-profile {
                flex-direction: column;
                align-items: flex-start;
                text-align: center;
            }
            .student-avatar-large {
                margin: 0 auto 15px;
            }
            .student-details {
                text-align: center;
                width: 100%;
            }
            .meta-item {
                flex: 100%;
                justify-content: center;
            }
            .question-header {
                flex-direction: column;
                gap: 15px;
            }
            .question-points {
                align-self: flex-start;
            }
            .grade-row {
                flex-direction: column;
                gap: 15px;
            }
            .grade-input-group {
                width: 100%;
            }
            .grade-action-buttons, .submission-footer {
                flex-direction: column;
                gap: 15px;
            }
            .overall-grade {
                margin-bottom: 20px;
            }
        }
    </style>

@endpush
@section('content')
    <!-- Student Profile Header -->
    <div class="student-header">
        <div class="student-profile">
            <div class="student-avatar-large">
                @php
                    $nameParts = explode(' ', $student->name);
                    $initials = strtoupper(substr($nameParts[0] ?? '', 0, 1) . substr($nameParts[1] ?? '', 0, 1));
                @endphp
                {{ $initials }}
            </div>
            <div class="student-details">
                <h2>{{ $student->name }}</h2>
                <p>{{ $student->email }}</p>
            </div>
        </div>

        <div class="student-meta">
            <div class="meta-item">
                <div class="meta-icon">
                    <i class="fas fa-clipboard-check"></i>
                </div>
                <div>
                    <div class="meta-label">Exam</div>
                    <div class="meta-value">{{ $exam->title }}</div>
                </div>
            </div>
            <div class="meta-item">
                <div class="meta-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div>
                    <div class="meta-label">Date</div>
                    <div class="meta-value">{{ $attempt->start_time->format('M d, Y') }}</div>
                </div>
            </div>
            <div class="meta-item">
                <div class="meta-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div>
                    <div class="meta-label">Time Spent</div>
                    <div class="meta-value">{{ $attempt->formatted_time_spent }}</div>
                </div>
            </div>
            <div class="meta-item">
                <div class="meta-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div>
                    <div class="meta-label">Current Score</div>
                    <div class="meta-value">
                        <span id="total-score">{{ $totalMarksAwarded }}</span>/{{ $totalPossibleMarks }}
                        (<span id="percentage">{{ number_format($percentage, 1) }}</span>%)
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Answer Blocks -->
    <div id="answer-blocks">
        @foreach($answers as $index => $answer)
            <div class="answer-question-block">
                <div class="question-header">
                    <div class="question-number">
                        <div class="question-badge">{{ $index + 1 }}</div>
                        <div class="question-title">{{ $answer->question->question_title ?? $answer->question->question_text }}</div>
                    </div>
                    <div class="question-points">
                        <i class="fas fa-star"></i> Worth {{ $answer->question->marks }} points
                    </div>
                </div>

                <div class="question-content">
                    <p class="question-text">{{ $answer->question->question_text }}</p>


                </div>

                <div class="answer-section">
                    <label class="answer-label">Student's Answer:</label>
                    <div class="answer-content">
                        @if($answer->question->question_type === 'mcq')
                            @if($answer->selected_option_id)
                                Selected Option: <strong>{{ $answer->selectedOption->letter ?? 'Unknown' }}. {{ $answer->selectedOption->option_text ?? 'No option selected' }}</strong>

                                <div style="margin-top: 10px;">
                                    @if($answer->is_correct)
                                        <span style="color: #4caf50;"><i class="fas fa-check-circle"></i> Correct answer</span>
                                    @else
                                        <span style="color: #f44336;"><i class="fas fa-times-circle"></i> Incorrect answer</span>
                                    @endif
                                </div>
                            @else
                                <em>No option selected</em>
                            @endif
                        @elseif($answer->written_answer)
                            <p>{{ $answer->written_answer }}</p>
                        @elseif($answer->uploads && $answer->uploads->count() > 0)
                            <div class="file-uploads">
                                @foreach($answer->uploads as $upload)
                                    <div class="file-item">
                                        <i class="fas fa-file"></i>
                                        <a href="{{ asset($upload->file_path) }}" target="_blank">{{ $upload->original_filename }}</a>
                                        <span class="file-size">({{ $upload->file_size }} bytes)</span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <em>No answer provided</em>
                        @endif
                    </div>
                </div>

                <div class="grade-section">
                    <form class="grade-form" id="grade-form-{{ $answer->id }}">
                        <div class="grade-row">
                            <div class="grade-input-group">
                                <label class="grade-label">Points (out of {{ $answer->question->marks }}):</label>
                                <input type="number" class="grade-input grade-input-small"
                                       min="0" max="{{ $answer->question->marks }}"
                                       value="{{ $answer->marks_awarded }}"
                                       name="marks_awarded">
                            </div>

                            <div class="grade-input-group">
                                <label class="grade-label">Feedback:</label>
                                <textarea class="grade-input" name="feedback" placeholder="Enter feedback for the student...">{{ $answer->feedback }}</textarea>
                            </div>
                        </div>

                        <div class="grade-action-buttons">
                            <button type="button" class="btn-custom btn-outline reset-grade-btn" data-answer-id="{{ $answer->id }}">
                                <i class="fas fa-undo btn-icon"></i> Reset
                            </button>
                            <button type="button" class="btn-custom btn-primary save-grade-btn" data-answer-id="{{ $answer->id }}">
                                <i class="fas fa-save btn-icon"></i> Save Grade
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Question Navigation -->
    <div class="question-nav">
        @if($prevAttempt)
            <a href="{{ route('grading.student', $prevAttempt->id) }}" class="question-nav-btn">
                <i class="fas fa-chevron-left prev-icon"></i> Previous Student
            </a>
        @else
            <span class="question-nav-btn disabled">
                <i class="fas fa-chevron-left prev-icon"></i> Previous Student
            </span>
        @endif

        @if($nextAttempt)
            <a href="{{ route('grading.student', $nextAttempt->id) }}" class="question-nav-btn">
                Next Student <i class="fas fa-chevron-right next-icon"></i>
            </a>
        @else
            <span class="question-nav-btn disabled">
                Next Student <i class="fas fa-chevron-right next-icon"></i>
            </span>
        @endif
    </div>

@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle save grade button clicks
            const saveGradeButtons = document.querySelectorAll('.save-grade-btn');
            saveGradeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const answerId = this.getAttribute('data-answer-id');
                    const form = document.getElementById(`grade-form-${answerId}`);
                    const formData = new FormData(form);

                    // AJAX request to save grade
                    fetch(`{{ url('admin/grading/answer') }}/${answerId}`, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Show success message
                                alert('Grade saved successfully');

                                // Update totals
                                document.getElementById('total-score').textContent = data.total_marks;
                                document.getElementById('percentage').textContent = data.percentage.toFixed(1);
                            } else {
                                // show in resonse
                            }
                        })
                        .catch(error => {

                        });
                });
            });

            // Handle reset grade button clicks
            const resetGradeButtons = document.querySelectorAll('.reset-grade-btn');
            resetGradeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const answerId = this.getAttribute('data-answer-id');
                    const form = document.getElementById(`grade-form-${answerId}`);

                    // Reset form values
                    form.querySelector('input[name="marks_awarded"]').value = 0;
                    form.querySelector('textarea[name="feedback"]').value = '';
                });
            });
        });
    </script>
@endpush
