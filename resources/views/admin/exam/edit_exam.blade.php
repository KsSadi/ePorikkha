@extends('layouts.main')

@section('pageTitle', 'Edit Exam')
@push('style')
    <style>
        /* Add this CSS to your stylesheet or in a style tag */

        /* Style for the "mark as correct" button when active */
        .option-control-btn.active-correct {
            color: #28a745 !important;
            background-color: rgba(40, 167, 69, 0.1);
        }

        /* Style for the correct option */
        .option-item.option-correct {
            border-left: 3px solid #28a745;
            background-color: rgba(40, 167, 69, 0.05);
        }

        /* Make the active check icon more visible */
        .option-control-btn.active-correct .fa-check-circle {
            font-weight: bold;
            font-size: 1.1em;
        }

        /* Optional: Add a subtle transition effect */
        .option-item, .option-control-btn {
            transition: all 0.2s ease-in-out;
        }

        .header-action i {
            margin-right: 8px;
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
        .page-title-content {
            position: relative;
            z-index: 1;
        }
        .page-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 15px;
        }
        .page-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 0;
            max-width: 600px;
        }
        .content-card {
            background-color: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 40px;
        }
        .tab-navigation {
            display: flex;
            margin-bottom: 30px;
            border-bottom: 1px solid #eee;
        }
        .tab-item {
            padding: 12px 25px;
            font-weight: 600;
            color: #777;
            cursor: pointer;
            position: relative;
            transition: all 0.3s;
        }
        .tab-item.active {
            color: var(--primary-color);
        }
        .tab-item.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(45deg, var(--primary-color), #7d7df8);
            border-radius: 5px 5px 0 0;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        .form-section {
            margin-bottom: 30px;
        }
        .section-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        .section-title i {
            margin-right: 10px;
            font-size: 1.1rem;
        }
        .form-floating {
            margin-bottom: 20px;
        }
        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(90, 90, 243, 0.1);
        }
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .form-label {
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 8px;
        }
        .btn-custom {
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
        }
        .btn-primary {
            background: linear-gradient(45deg, var(--primary-color), #7d7df8);
            border: none;
            box-shadow: 0 5px 15px rgba(90, 90, 243, 0.2);
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #4b4bea, #6e6ef7);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(90, 90, 243, 0.3);
        }
        .btn-secondary {
            background-color: #f0f0f0;
            color: #777;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #e6e6e6;
            color: #555;
        }
        .btn-danger {
            background: linear-gradient(45deg, var(--danger-color), #ff5c5c);
            border: none;
            color: white;
            box-shadow: 0 5px 15px rgba(244, 67, 54, 0.2);
        }
        .btn-danger:hover {
            background: linear-gradient(45deg, #e53935, #ff4d4d);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(244, 67, 54, 0.3);
        }
        .btn-icon {
            margin-right: 8px;
        }
        .question-item {
            background-color: var(--light-bg);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border-left: 4px solid var(--primary-color);
            position: relative;
        }
        .question-number {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 15px;
            color: var(--primary-color);
        }
        .question-content {
            margin-bottom: 20px;
        }
        .question-text {
            font-weight: 600;
            margin-bottom: 15px;
        }
        .question-actions {
            position: absolute;
            top: 15px;
            right: 15px;
            display: flex;
            gap: 10px;
        }
        .question-action-btn {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: white;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #777;
            font-size: 0.9rem;
            transition: all 0.3s;
            cursor: pointer;
        }
        .question-action-btn:hover {
            background-color: var(--primary-light);
            color: var(--primary-color);
            transform: translateY(-2px);
        }
        .option-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            padding: 10px 15px;
            background-color: white;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .option-item:hover {
            background-color: var(--primary-light);
        }
        .option-marker {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background-color: var(--primary-light);
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin-right: 15px;
            font-size: 0.8rem;
        }
        .option-correct {
            background-color: #e8f5e9;
            border-left: 4px solid var(--success-color);
        }
        .option-correct .option-marker {
            background-color: var(--success-color);
            color: white;
        }
        .option-text {
            flex: 1;
        }
        .option-controls {
            display: flex;
            gap: 10px;
        }
        .option-control-btn {
            background-color: transparent;
            border: none;
            color: #777;
            cursor: pointer;
            transition: all 0.3s;
        }
        .option-control-btn:hover {
            color: var(--primary-color);
        }
        .add-option-btn {
            display: flex;
            align-items: center;
            background-color: white;
            border: 1px dashed #ccc;
            color: #777;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
            justify-content: center;
            margin-top: 15px;
        }
        .add-option-btn:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            background-color: var(--primary-light);
        }
        .add-option-btn i {
            margin-right: 8px;
        }
        .question-footer {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .question-info {
            font-size: 0.9rem;
            color: #777;
        }
        .question-info span {
            color: var(--primary-color);
            font-weight: 600;
        }
        .question-actions-buttons {
            display: flex;
            gap: 10px;
        }
        .question-footer-btn {
            padding: 8px 15px;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        .question-footer-btn i {
            margin-right: 8px;
            font-size: 0.8rem;
        }
        .add-question-card {
            background-color: white;
            border: 2px dashed #ccc;
            border-radius: 16px;
            padding: 30px;
            text-align: center;
            margin-bottom: 40px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .add-question-card:hover {
            border-color: var(--primary-color);
            background-color: var(--primary-light);
        }
        .add-question-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background-color: var(--primary-light);
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 20px;
            transition: all 0.3s;
        }
        .add-question-card:hover .add-question-icon {
            transform: scale(1.1);
            background-color: var(--primary-color);
            color: white;
        }
        .add-question-text {
            font-weight: 600;
            color: #777;
            transition: all 0.3s;
        }
        .add-question-card:hover .add-question-text {
            color: var(--primary-color);
        }
        .upload-area {
            border: 2px dashed #ccc;
            border-radius: 12px;
            padding: 40px 20px;
            text-align: center;
            margin-bottom: 20px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .upload-area:hover {
            border-color: var(--primary-color);
            background-color: var(--primary-light);
        }
        .upload-icon {
            font-size: 2.5rem;
            color: #ccc;
            margin-bottom: 15px;
            transition: all 0.3s;
        }
        .upload-area:hover .upload-icon {
            color: var(--primary-color);
        }
        .upload-text {
            color: #777;
            margin-bottom: 10px;
        }
        .upload-hint {
            font-size: 0.85rem;
            color: #999;
        }
        .file-input {
            display: none;
        }
        .form-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        .timer-options {
            display: flex;
            gap: 0;
            margin-bottom: 20px;
            background-color: #f5f7ff;
            border-radius: 8px;
            overflow: hidden;
        }
        .timer-option {
            flex: 1;
            text-align: center;
            padding: 20px 15px;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            border-bottom: 1px solid #e0e4f6;
        }
        .timer-option:not(:last-child) {
            border-right: 1px solid #e0e4f6;
        }
        .timer-option:hover {
            background-color: #eaeeff;
        }
        .timer-option.selected {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(90, 90, 243, 0.1);
        }
        .timer-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 5px;
        }
        .timer-label {
            font-size: 0.85rem;
            color: #777;
        }
        .import-btn {
            padding: 10px 20px;
            border-radius: 8px;
            background-color: var(--light-bg);
            color: var(--text-color);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
        }
        .import-btn:hover {
            background-color: var(--primary-light);
            color: var(--primary-color);
        }
        .import-btn i {
            margin-right: 8px;
        }

        .footer-content p {
            margin: 0;
            padding: 0;
            color: var(--primary-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 15px;
            font-weight: 600;
            letter-spacing: 0.3px;
        }
        .footer-content .copyright {
            margin-top: 5px;
            font-size: 13px;
            color: #777;
            font-weight: 400;
        }

        .footer-logo i {
            margin-right: 8px;
            background: linear-gradient(45deg, var(--primary-color), #7d7df8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Custom Timer Input Styling */
        .custom-timer-input {
            padding: 0 15px;
            margin-bottom: 20px;
        }

        .custom-timer-input .input-group {
            max-width: 300px;
            margin: 0 auto;
        }

        .custom-timer-input .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(90, 90, 243, 0.25);
        }

        .custom-timer-input .btn-primary {
            background: linear-gradient(45deg, var(--primary-color), #7d7df8);
            border: none;
        }

        .custom-timer-input .btn-primary:hover {
            background: linear-gradient(45deg, #4b4bea, #6e6ef7);
        }

        .timer-option {
            position: relative;
        }

        .edit-indicator {
            position: absolute;
            top: 5px;
            right: 5px;
            font-size: 0.8rem;
            color: var(--primary-color);
            opacity: 0.7;
            transition: all 0.3s;
        }

        .timer-option:hover .edit-indicator {
            opacity: 1;
        }

        .form-control.is-invalid {
            border-color: var(--danger-color);
            background-color: rgba(244, 67, 54, 0.1);
        }
    </style>
@endpush

@section('content')
    <div class="page-title-card">
        <div class="page-title-content">
            <h1 class="page-title">Edit Exam <span class="edit-tag">Editing</span></h1>
            <p class="page-subtitle">Modify exam details, questions and settings to update this assessment.</p>
        </div>
    </div>

    <div class="content-card">
        <div class="tab-navigation">
            <div class="tab-item active" data-tab="exam-details">Exam Details</div>
            <div class="tab-item" data-tab="questions">Edit Questions</div>
            <div class="tab-item" data-tab="settings">Settings & Publish</div>
        </div>

        <form id="examForm" method="POST" action="{{ route('admin.exam.update', $exam->id) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="exam_id" value="{{ $exam->id }}">

            <div class="tab-content active" id="exam-details">
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-info-circle"></i> Basic Information
                    </h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="examTitle" class="form-label">Exam Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $exam->title }}" placeholder="e.g. Advanced Mathematics Final Exam">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="subject_area" class="form-label">Subject Area</label>
                                <select class="form-select" name="subject_area" id="subject_area">
                                    <option {{ $exam->subject_area == null ? 'selected' : '' }}>Select subject area</option>
                                    <option value="technology" {{ $exam->subject_area == 'technology' ? 'selected' : '' }}>Technology</option>
                                    <option value="science" {{ $exam->subject_area == 'science' ? 'selected' : '' }}>Science</option>
                                    <option value="english" {{ $exam->subject_area == 'english' ? 'selected' : '' }}>English</option>
                                    <option value="cs" {{ $exam->subject_area == 'cs' ? 'selected' : '' }}>Computer Science</option>
                                    <option value="history" {{ $exam->subject_area == 'history' ? 'selected' : '' }}>History</option>
                                    <option value="geography" {{ $exam->subject_area == 'geography' ? 'selected' : '' }}>Geography</option>
                                    <option value="other" {{ $exam->subject_area == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">Exam Description</label>
                                <textarea class="form-control" name="description" id="description" rows="4" placeholder="Provide a brief description of the exam...">{{ $exam->description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exam_date" class="form-label">Exam Date</label>
                                <input type="date" name="exam_date" class="form-control" id="exam_date" value="{{ $exam->exam_date ? $exam->exam_date->format('Y-m-d') : '' }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="start_time" class="form-label">Start Time</label>
                                <input type="time" name="start_time" class="form-control" id="start_time" value="{{ $exam->start_time }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="duration" class="form-label">Duration (minutes)</label>
                                <input type="number" class="form-control" name="duration" id="duration" min="10" value="{{ $exam->duration }}" placeholder="e.g. 120">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-cog"></i> Exam Configuration
                    </h3>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="passing_score" class="form-label">Passing Score (%)</label>
                                <input type="number" class="form-control" name="passing_score" id="passing_score" min="0" max="100" value="{{ $exam->passing_score ?? 60 }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="total_marks" class="form-label">Total Marks</label>
                                <input type="number" class="form-control" name="total_marks" id="total_marks" min="1" value="{{ $exam->total_marks }}" placeholder="e.g. 100">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-check mb-3">
                                <input class="form-check-input" name="randomize_questions" type="checkbox" id="randomize_questions" {{ $exam->randomize_questions ? 'checked' : '' }}>
                                <label class="form-check-label" for="randomize_questions">
                                    Randomize question order
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" name="show_results" type="checkbox" id="show_results" {{ $exam->show_results ? 'checked' : '' }}>
                                <label class="form-check-label" for="show_results">
                                    Show results immediately after completion
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check mb-3">
                                <input class="form-check-input" name="prevent_backtracking" type="checkbox" id="prevent_backtracking" {{ $exam->prevent_backtracking ? 'checked' : '' }}>
                                <label class="form-check-label" for="prevent_backtracking">
                                    Prevent backtracking to previous questions
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" name="enable_proctoring" type="checkbox" id="enable_proctoring" {{ $exam->enable_proctoring ? 'checked' : '' }}>
                                <label class="form-check-label" for="enable_proctoring">
                                    Enable proctoring (prevents tab switching)
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-footer">
                    <a href="{{ route('admin.manage.exam') }}">
                        <button class="btn btn-secondary btn-custom" type="button">
                            <i class="fas fa-list btn-icon"></i> Back To Exams
                        </button>
                    </a>
                    <button type="button" class="btn btn-primary btn-custom" id="nextToQuestions">
                        Continue to Questions <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <div class="tab-content" id="questions">
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-plus-circle"></i> Edit Questions
                    </h3>

                    @if($exam->questions->count() > 0)
                        @foreach($exam->questions as $index => $question)
                            <div class="question-item" data-question-number="{{ $index + 1 }}">
                                <div class="question-number">Question {{ $index + 1 }}</div>
                                <div class="question-actions">
                                   {{-- <button class="question-action-btn clone-question-btn" title="Clone this question" type="button">
                                        <i class="fas fa-copy"></i>
                                    </button>--}}
                                    <button class="question-action-btn delete-question-btn" title="Delete this question" type="button">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>

                                <div class="question-content">
                                    <div class="mb-3">
                                        <label class="form-label">Question Title</label>
                                        <input type="text" name="questions[{{ $index }}][question_title]" class="form-control" value="{{ $question->question_title }}" placeholder="Question Title">
                                        <input type="hidden" name="questions[{{ $index }}][id]" value="{{ $question->id }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Question Description</label>
                                        <textarea class="form-control" name="questions[{{ $index }}][question_text]" rows="2" placeholder="Enter your question...">{{ $question->question_text }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Question Type</label>
                                        <div class="question-type-selector d-flex mb-3">
                                           {{-- <div class="form-check form-check-inline me-4">
                                                <input class="form-check-input" type="radio" name="questions[{{ $index }}][question_type]" id="mcqType{{ $question->id }}" value="mcq" {{ $question->question_type == 'mcq' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="mcqType{{ $question->id }}">
                                                    <i class="fas fa-list-ul me-1"></i> Multiple Choice
                                                </label>
                                            </div>--}}
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="questions[{{ $index }}][question_type]" id="descriptionType{{ $question->id }}" value="description" {{ $question->question_type == 'description' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="descriptionType{{ $question->id }}">
                                                    <i class="fas fa-paragraph me-1"></i> Description Based
                                                </label>
                                            </div>
                                        </div>

                                        <div id="mcqOptions{{ $question->id }}" class="mcq-options" style="{{ $question->question_type == 'mcq' ? '' : 'display: none;' }}">
                                            <label class="form-label">Question Options</label>
                                            <input type="hidden" name="questions[{{ $index }}][correct_option]" value="{{ $question->correct_option ?? 0 }}" class="correct-option-input">

                                            @php
                                                // Load question options if they exist
                                                $options = \App\Models\QuestionOption::where('question_id', $question->id)->orderBy('sort_order')->get();
                                            @endphp

                                            @if($options->count() > 0)
                                                @foreach($options as $optionIndex => $option)
                                                    <div class="option-item {{ $option->is_correct ? 'option-correct' : '' }}">
                                                        <div class="option-marker">{{ chr(65 + $optionIndex) }}</div>
                                                        <div class="option-text">
                                                            <input type="text" class="form-control" name="questions[{{ $index }}][options][{{ $optionIndex }}]" placeholder="Option text..." value="{{ $option->option_text }}">
                                                            <input type="hidden" name="questions[{{ $index }}][option_ids][{{ $optionIndex }}]" value="{{ $option->id }}">
                                                        </div>
                                                        <div class="option-controls">
                                                          {{--  <button class="option-control-btn mark-correct-btn {{ $option->is_correct ? 'active-correct' : '' }}" type="button" title="Mark as correct answer">
                                                                <i class="fas fa-check-circle"></i>
                                                            </button>--}}
                                                            <button class="option-control-btn delete-option-btn" type="button" title="Delete option">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <!-- Default options if none exist -->
                                                <div class="option-item option-correct">
                                                    <div class="option-marker">A</div>
                                                    <div class="option-text">
                                                        <input type="text" class="form-control" name="questions[{{ $index }}][options][0]" placeholder="Option text..." value="">
                                                    </div>
                                                    <div class="option-controls">
                                                        <button class="option-control-btn mark-correct-btn active-correct" type="button" title="Mark as correct answer">
                                                            <i class="fas fa-check-circle"></i>
                                                        </button>
                                                        <button class="option-control-btn delete-option-btn" type="button" title="Delete option">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="option-item">
                                                    <div class="option-marker">B</div>
                                                    <div class="option-text">
                                                        <input type="text" class="form-control" name="questions[{{ $index }}][options][1]" placeholder="Option text..." value="">
                                                    </div>
                                                    <div class="option-controls">
                                                        <button class="option-control-btn mark-correct-btn" type="button" title="Mark as correct answer">
                                                            <i class="fas fa-check-circle"></i>
                                                        </button>
                                                        <button class="option-control-btn delete-option-btn" type="button" title="Delete option">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif

                                            <button class="add-option-btn" type="button">
                                                <i class="fas fa-plus"></i> Add Another Option
                                            </button>
                                        </div>

                                        <div id="descriptionOptions{{ $question->id }}" class="description-options" style="{{ $question->question_type == 'description' ? '' : 'display: none;' }}">
                                            <div class="form-group">
                                                <label class="form-label">Answer Format</label>
                                                <select class="form-select" name="questions[{{ $index }}][answer_format]">
                                                    <option value="text" {{ ($question->answer_format ?? 'text') == 'text' ? 'selected' : '' }}>Plain Text</option>
                                                    <option value="fileupload" {{ ($question->answer_format ?? '') == 'fileupload' ? 'selected' : '' }}>File Upload</option>
                                                </select>
                                                <div class="form-text mt-2">For description-based questions, students will provide detailed written answers or upload files as their response.</div>
                                            </div>

                                            <div class="form-group mt-3">
                                                <label class="form-label">Marks & Times (Optional)</label>
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Marks</span>
                                                            <input type="number" name="questions[{{ $index }}][marks]" class="form-control" value="{{ $question->marks }}" placeholder="Question Mark">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Time</span>
                                                            <input type="number" name="questions[{{ $index }}][time_limit]" class="form-control" value="{{ $question->time_limit }}" placeholder="Optional">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="question-footer">
                                    <div class="question-info">
                                        Marks: <span>{{ $question->marks ?? 5 }}</span> | Type: <span>{{ ucfirst($question->question_type) }}</span>
                                    </div>
                                    <div class="question-actions-buttons">
                                        <button class="btn btn-primary question-footer-btn add-next-question-btn" type="button">
                                            <i class="fas fa-plus"></i> Add Question
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Empty state when no questions exist -->
                        <div class="question-item" data-question-number="1">
                            <div class="question-number">Question 1</div>
                            <div class="question-actions">
                                <button class="question-action-btn clone-question-btn" title="Clone this question" type="button">
                                    <i class="fas fa-copy"></i>
                                </button>
                                <button class="question-action-btn delete-question-btn" title="Delete this question" type="button">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>

                            <div class="question-content">
                                <div class="mb-3">
                                    <label class="form-label">Question Title</label>
                                    <input type="text" name="questions[0][question_title]" class="form-control" placeholder="Question Title">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Question Description</label>
                                    <textarea class="form-control" name="questions[0][question_text]" rows="2" placeholder="Enter your question..."></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Question Type</label>
                                    <div class="question-type-selector d-flex mb-3">
                                        <div class="form-check form-check-inline me-4">
                                            <input class="form-check-input" type="radio" name="questions[0][question_type]" id="mcqType1" value="mcq" checked>
                                            <label class="form-check-label" for="mcqType1">
                                                <i class="fas fa-list-ul me-1"></i> Multiple Choice
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="questions[0][question_type]" id="descriptionType1" value="description">
                                            <label class="form-check-label" for="descriptionType1">
                                                <i class="fas fa-paragraph me-1"></i> Description Based
                                            </label>
                                        </div>
                                    </div>

                                    <div id="mcqOptions1" class="mcq-options">
                                        <label class="form-label">Question Options</label>
                                        <input type="hidden" name="questions[0][correct_option]" value="0" class="correct-option-input">

                                        <div class="option-item option-correct">
                                            <div class="option-marker">A</div>
                                            <div class="option-text">
                                                <input type="text" class="form-control" name="questions[0][options][0]" placeholder="Option text..." value="">
                                            </div>
                                            <div class="option-controls">
                                                <button class="option-control-btn mark-correct-btn active-correct" type="button" title="Mark as correct answer">
                                                    <i class="fas fa-check-circle"></i>
                                                </button>
                                                <button class="option-control-btn delete-option-btn" type="button" title="Delete option">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="option-item">
                                            <div class="option-marker">B</div>
                                            <div class="option-text">
                                                <input type="text" class="form-control" name="questions[0][options][1]" placeholder="Option text..." value="">
                                            </div>
                                            <div class="option-controls">
                                                <button class="option-control-btn mark-correct-btn" type="button" title="Mark as correct answer">
                                                    <i class="fas fa-check-circle"></i>
                                                </button>
                                                <button class="option-control-btn delete-option-btn" type="button" title="Delete option">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <button class="add-option-btn" type="button">
                                            <i class="fas fa-plus"></i> Add Another Option
                                        </button>
                                    </div>

                                    <div id="descriptionOptions1" class="description-options" style="display: none;">
                                        <div class="form-group">
                                            <label class="form-label">Answer Format</label>
                                            <select class="form-select" name="questions[0][answer_format]">
                                                <option value="text">Plain Text</option>
                                                <option value="fileupload">File Upload</option>
                                            </select>
                                            <div class="form-text mt-2">For description-based questions, students will provide detailed written answers or upload files as their response.</div>
                                        </div>

                                        <div class="form-group mt-3">
                                            <label class="form-label">Marks & Times (Optional)</label>
                                            <div class="row g-2">
                                                <div class="col-6">
                                                    <div class="input-group">
                                                        <span class="input-group-text">Marks</span>
                                                        <input type="number" name="questions[0][marks]" class="form-control" placeholder="Question Mark">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group">
                                                        <span class="input-group-text">Time</span>
                                                        <input type="number" name="questions[0][time_limit]" class="form-control" placeholder="Optional">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="question-footer">
                              {{--  <div class="question-info">
                                    Marks: <span>5</span> | Type: <span>Multiple Choice</span>
                                </div>--}}
                                <div class="question-actions-buttons">
                                    <button class="btn btn-primary question-footer-btn add-next-question-btn" type="button">
                                        <i class="fas fa-plus"></i> Add Question
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Add Question Card - Only show when there are no questions -->
                    <div class="add-question-card" id="addQuestionBtn" style="{{ $exam->questions->count() > 0 ? 'display: none;' : '' }}">
                        <div class="add-question-icon">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="add-question-text">Add New Question</div>
                    </div>
                </div>

                <div class="form-footer">
                    <div>
                        <button type="button" class="btn btn-secondary btn-custom" id="backToDetails">
                            <i class="fas fa-arrow-left btn-icon"></i> Back to Details
                        </button>
                    </div>
                    <div>
                        <button class="btn btn-secondary btn-custom me-2" type="submit" name="actionBtn" value="draft" id="saveDraft">
                            <i class="fas fa-save btn-icon"></i> Save as Draft
                        </button>
                        <button type="button" class="btn btn-primary btn-custom" id="nextToSetting">
                            Continue to Settings <i class="fas fa-arrow-right btn-icon"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="settings">
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-cog"></i> Exam Settings
                    </h3>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="form-label">Access Control</label>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" value="open" name="access_control" id="accessOpen" {{ ($exam->access_control ?? 'open') == 'open' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="accessOpen">
                                        Open to all students
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="password" name="access_control" id="accessPassword" {{ ($exam->access_control ?? '') == 'password' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="accessPassword">
                                        Require password
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Exam Password</label>
                                <input type="text" class="form-control" name="password" id="password" value="{{ $exam->password }}" placeholder="Create a password">
                                <div class="form-text">Leave blank if not using password protection</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="question_settings" class="form-label">Question Settings</label>
                                <select class="form-select" id="question_settings" name="question_settings">
                                    <option value="open_all" {{ ($exam->question_settings ?? '') == 'open_all' ? 'selected' : '' }}>Open All Question</option>
                                    <option value="one_by_one" {{ ($exam->question_settings ?? 'one_by_one') == 'one_by_one' ? 'selected' : '' }}>Open One By One Question</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="time_tracking" class="form-label">Time Tracking</label>
                                <select class="form-select" id="time_tracking" name="time_tracking">
                                    <option value="full_exam" {{ ($exam->time_tracking ?? '') == 'full_exam' ? 'selected' : '' }}>Full Exam</option>
                                    <option value="question_wise" {{ ($exam->time_tracking ?? 'question_wise') == 'question_wise' ? 'selected' : '' }}>Question Wise</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-shield-alt"></i> Proctoring Settings
                    </h3>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="disable_copy_paste" id="disable_copy_paste" {{ $exam->disable_copy_paste ? 'checked' : '' }}>
                                    <label class="form-check-label" for="disable_copy_paste">
                                        Disable copy and paste functionality
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="disable_right_click" type="checkbox" id="disableRightClick" {{ $exam->disable_right_click ? 'checked' : '' }}>
                                    <label class="form-check-label" for="disableRightClick">
                                        Disable right-click menu
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-footer">
                    <div>
                        <button type="button" class="btn btn-secondary btn-custom" id="backToQuestion">
                            <i class="fas fa-arrow-left btn-icon"></i> Back to Questions
                        </button>
                    </div>
                    <div>
                        <button class="btn btn-secondary btn-custom me-2" name="actionBtn" value="draft" type="submit">
                            <i class="fas fa-save btn-icon"></i> Save as Draft
                        </button>
                        <button class="btn btn-primary btn-custom" name="actionBtn" type="submit" value="published" id="publishExam">
                            {{ $exam->status == 'published' ? 'Update Published Exam' : 'Publish' }} <i class="fas fa-check btn-icon"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script>
        /**
         * Exam Edit System JavaScript
         * Complete implementation with fixed correct answer selection
         */
        document.addEventListener('DOMContentLoaded', function() {
            // Question counter for generating unique IDs
            let questionCounter = {{ $exam->questions->count() > 0 ? $exam->questions->count() : 1 }};
            let optionLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // For option markers

            // Object to manage all exam functionality
            const examManager = {
                // Store bound event handlers
                _markAsCorrectHandlers: {},

                // Tab navigation functionality
                initTabNavigation: function() {
                    const tabItems = document.querySelectorAll('.tab-item');
                    const tabContents = document.querySelectorAll('.tab-content');

                    tabItems.forEach(item => {
                        item.addEventListener('click', function() {
                            const tabId = this.getAttribute('data-tab');
                            examManager.switchTab(tabId);
                        });
                    });

                    // Tab navigation buttons
                    document.getElementById('nextToQuestions')?.addEventListener('click', () => examManager.switchTab('questions'));
                    document.getElementById('nextToSetting')?.addEventListener('click', () => examManager.switchTab('settings'));
                    document.getElementById('backToDetails')?.addEventListener('click', () => examManager.switchTab('exam-details'));
                    document.getElementById('backToQuestion')?.addEventListener('click', () => examManager.switchTab('questions'));
                },

                switchTab: function(tabId) {
                    // Optional validation before switching tabs
                    if (tabId === 'questions' && !this.validateExamDetails()) {
                        return false;
                    }

                    if (tabId === 'settings' && !this.validateQuestions()) {
                        return false;
                    }

                    const tabItems = document.querySelectorAll('.tab-item');
                    const tabContents = document.querySelectorAll('.tab-content');

                    // Remove active class from all tabs and contents
                    tabItems.forEach(tab => tab.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));

                    // Add active class to selected tab and content
                    document.querySelector(`[data-tab="${tabId}"]`).classList.add('active');
                    document.getElementById(tabId).classList.add('active');

                    return true;
                },

                // Validation functions
                validateExamDetails: function() {
                    const title = document.getElementById('title');
                    const subject = document.getElementById('subject_area');
                    const examDate = document.getElementById('exam_date');

                    let isValid = true;

                    // Basic validation example - can be expanded
                    if (!title.value.trim()) {
                        this.showValidationError(title, 'Please enter an exam title');
                        isValid = false;
                    } else {
                        this.clearValidationError(title);
                    }

                    if (subject.value === 'Select subject area') {
                        this.showValidationError(subject, 'Please select a subject area');
                        isValid = false;
                    } else {
                        this.clearValidationError(subject);
                    }

                    if (!examDate.value) {
                        this.showValidationError(examDate, 'Please select an exam date');
                        isValid = false;
                    } else {
                        this.clearValidationError(examDate);
                    }

                    return isValid;
                },

                validateQuestions: function() {
                    const questions = document.querySelectorAll('.question-item');
                    if (questions.length === 0) {
                        alert('Please add at least one question before proceeding.');
                        return false;
                    }

                    let isValid = true;

                    questions.forEach((question, index) => {
                        const questionTitle = question.querySelector('input[name^="questions"][name$="[question_title]"]');
                        const questionText = question.querySelector('textarea[name^="questions"][name$="[question_text]"]');

                        if (!questionTitle || !questionTitle.value.trim()) {
                            this.showValidationError(questionTitle || question, 'Please enter a question title');
                            isValid = false;
                        }

                        if (!questionText || !questionText.value.trim()) {
                            this.showValidationError(questionText || question, 'Please enter question text');
                            isValid = false;
                        }

                        // Check if it's MCQ and validate options
                        const isMCQ = question.querySelector('input[value="mcq"]:checked');
                        if (isMCQ) {
                            // Fixed selector to correctly target only option inputs
                            const options = question.querySelectorAll('.option-item input[type="text"]');
                            let hasEmptyOption = false;

                            options.forEach(option => {
                                if (!option.value.trim()) {
                                    hasEmptyOption = true;
                                }
                            });

                            if (hasEmptyOption) {
                                this.showValidationError(question.querySelector('.mcq-options'), 'Please fill all option fields');
                                isValid = false;
                            }
                        }
                    });

                    return isValid;
                },

                showValidationError: function(element, message) {
                    // Clear any existing error
                    this.clearValidationError(element);

                    // Add error class to the element
                    element.classList.add('is-invalid');

                    // Create error message
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'invalid-feedback';
                    errorDiv.textContent = message;

                    // Insert after the element
                    element.parentNode.insertBefore(errorDiv, element.nextSibling);
                },

                clearValidationError: function(element) {
                    element.classList.remove('is-invalid');
                    const errorMsg = element.parentNode.querySelector('.invalid-feedback');
                    if (errorMsg) {
                        errorMsg.remove();
                    }
                },

                // Question management
                initQuestionFunctionality: function() {
                    // Add event listener for "Add Question" button
                    const addQuestionButtons = document.querySelectorAll('.add-next-question-btn');
                    addQuestionButtons.forEach(button => {
                        button.addEventListener('click', this.addNewQuestion.bind(this));
                    });

                    // Add event listener for "Add Question Card"
                    const addQuestionCard = document.getElementById('addQuestionBtn');
                    if (addQuestionCard) {
                        addQuestionCard.addEventListener('click', this.addNewQuestion.bind(this));
                    }

                    // Initialize existing questions
                    document.querySelectorAll('.question-item').forEach(question => {
                        this.initQuestionEventListeners(question);
                    });
                },

                addNewQuestion: function(event) {
                    // Generate a unique ID for the new question
                    const uniqueId = Date.now();
                    questionCounter++;

                    // Create the new question element
                    const newQuestion = document.createElement('div');
                    newQuestion.className = 'question-item';
                    newQuestion.dataset.questionNumber = questionCounter;

                    // Generate question HTML with proper naming for Laravel
                    newQuestion.innerHTML = this.generateQuestionHTML(questionCounter - 1, uniqueId);

                    // Insert the new question
                    if (event.target && event.target.closest('.question-item')) {
                        const currentQuestion = event.target.closest('.question-item');
                        currentQuestion.insertAdjacentElement('afterend', newQuestion);
                    } else {
                        // If clicked on the add question card or no specific question
                        const questionsContainer = document.querySelector('.form-section');
                        const addQuestionCard = document.getElementById('addQuestionBtn');

                        if (addQuestionCard) {
                            // Hide the add question card once we have questions
                            addQuestionCard.style.display = 'none';
                        }

                        // Find the last question or add to the form section
                        const lastQuestion = questionsContainer.querySelector('.question-item:last-child');
                        if (lastQuestion) {
                            lastQuestion.insertAdjacentElement('afterend', newQuestion);
                        } else {
                            // Add before the add question card if it exists
                            if (addQuestionCard) {
                                questionsContainer.insertBefore(newQuestion, addQuestionCard);
                            } else {
                                questionsContainer.appendChild(newQuestion);
                            }
                        }
                    }

                    // Add event listeners to the new question
                    this.initQuestionEventListeners(newQuestion);

                    // Update all question numbers
                    this.updateQuestionNumbers();

                    // Scroll to the new question
                    newQuestion.scrollIntoView({ behavior: 'smooth', block: 'start' });
                },

                generateQuestionHTML: function(index, uniqueId) {
                    return `
                <div class="question-number">Question ${questionCounter}</div>
                <div class="question-actions">
                    <button class="question-action-btn clone-question-btn" title="Clone this question" type="button">
                        <i class="fas fa-copy"></i>
                    </button>
                    <button class="question-action-btn delete-question-btn" title="Delete this question" type="button">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>

                <div class="question-content">
                    <div class="mb-3">
                        <label class="form-label">Question Title</label>
                        <input type="text" name="questions[${index}][question_title]" class="form-control" placeholder="Question Title">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Question Description</label>
                        <textarea class="form-control" name="questions[${index}][question_text]" rows="2" placeholder="Enter your question..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Question Type</label>
                        <div class="question-type-selector d-flex mb-3">

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="questions[${index}][question_type]" id="descriptionType${uniqueId}" value="description" checked>
                                <label class="form-check-label" for="descriptionType${uniqueId}">
                                    <i class="fas fa-paragraph me-1"></i> Description Based
                                </label>
                            </div>
                        </div>

                        <div id="mcqOptions${uniqueId}" class="mcq-options" style="display: none;">
                            <label class="form-label">Question Options</label>
                            <input type="hidden" name="questions[${index}][correct_option]" value="0" class="correct-option-input">

                            <div class="option-item option-correct">
                                <div class="option-marker">A</div>
                                <div class="option-text">
                                    <input type="text" class="form-control" name="questions[${index}][options][0]" placeholder="Option text...">
                                </div>
                                <div class="option-controls">
                                    <button class="option-control-btn mark-correct-btn active-correct" type="button" title="Mark as correct answer">
                                        <i class="fas fa-check-circle"></i>
                                    </button>
                                    <button class="option-control-btn delete-option-btn" type="button" title="Delete option">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="option-item">
                                <div class="option-marker">B</div>
                                <div class="option-text">
                                    <input type="text" class="form-control" name="questions[${index}][options][1]" placeholder="Option text...">
                                </div>
                                <div class="option-controls">
                                    <button class="option-control-btn mark-correct-btn" type="button" title="Mark as correct answer">
                                        <i class="fas fa-check-circle"></i>
                                    </button>
                                    <button class="option-control-btn delete-option-btn" type="button" title="Delete option">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <button class="add-option-btn" type="button">
                                <i class="fas fa-plus"></i> Add Another Option
                            </button>
                        </div>

                        <div id="descriptionOptions${uniqueId}" class="description-options">
                            <div class="form-group">
                                <label class="form-label">Answer Format</label>
                                <select class="form-select" name="questions[${index}][answer_format]">
                                    <option value="text">Plain Text</option>
                                    <option value="fileupload">File Upload</option>
                                </select>
                                <div class="form-text mt-2">For description-based questions, students will provide detailed written answers or upload files as their response.</div>
                            </div>

                            <div class="form-group mt-3">
                                <label class="form-label">Marks & Times (Optional)</label>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">Marks</span>
                                            <input type="number" name="questions[${index}][marks]" class="form-control" placeholder="Question Mark">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">Time</span>
                                            <input type="number" name="questions[${index}][time_limit]" class="form-control" placeholder="Optional">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question-footer">
                   <!-- <div class="question-info">
                        Marks: <span>5</span> | Type: <span>Multiple Choice</span>
                    </div>-->
                    <div class="question-actions-buttons">
                        <button class="btn btn-primary question-footer-btn add-next-question-btn" type="button">
                            <i class="fas fa-plus"></i> Add Question
                        </button>
                    </div>
                </div>
            `;
                },

                initQuestionEventListeners: function(questionElement) {
                    // Question type toggle (MCQ vs Description)
                    const radioButtons = questionElement.querySelectorAll('input[type="radio"][name^="questions"][name$="[question_type]"]');
                    radioButtons.forEach(radio => {
                        radio.addEventListener('change', function() {
                            const mcqOptions = questionElement.querySelector('.mcq-options');
                            const descriptionOptions = questionElement.querySelector('.description-options');

                            if (this.value === 'mcq') {
                                mcqOptions.style.display = 'block';
                                descriptionOptions.style.display = 'none';
                            } else {
                                mcqOptions.style.display = 'none';
                                descriptionOptions.style.display = 'block';
                            }
                        });
                    });

                    // Clone question button
                    const cloneBtn = questionElement.querySelector('.clone-question-btn');
                    if (cloneBtn) {
                        cloneBtn.addEventListener('click', () => this.cloneQuestion(questionElement));
                    }

                    // Delete question button
                    const deleteBtn = questionElement.querySelector('.delete-question-btn');
                    if (deleteBtn) {
                        deleteBtn.addEventListener('click', () => this.deleteQuestion(questionElement));
                    }

                    // Add option button
                    const addOptionBtn = questionElement.querySelector('.add-option-btn');
                    if (addOptionBtn) {
                        addOptionBtn.addEventListener('click', () => this.addOption(questionElement));
                    }

                    // Mark as correct buttons for options - FIXED
                    const markCorrectButtons = questionElement.querySelectorAll('.mark-correct-btn');
                    markCorrectButtons.forEach(btn => {
                        // Create a unique ID for this button
                        const btnId = 'btn_' + Math.random().toString(36).substr(2, 9);
                        btn.dataset.btnId = btnId;

                        // Remove any existing event listeners
                        if (this._markAsCorrectHandlers[btnId]) {
                            btn.removeEventListener('click', this._markAsCorrectHandlers[btnId]);
                        }

                        // Create a new handler function and store it
                        this._markAsCorrectHandlers[btnId] = () => this.markAsCorrect(btn);

                        // Add the new event listener
                        btn.addEventListener('click', this._markAsCorrectHandlers[btnId]);

                        // Add visual indication for the active correct button
                        if (btn.closest('.option-item').classList.contains('option-correct')) {
                            btn.classList.add('active-correct');
                        } else {
                            btn.classList.remove('active-correct');
                        }
                    });

                    // Delete option buttons
                    const deleteOptionButtons = questionElement.querySelectorAll('.delete-option-btn');
                    deleteOptionButtons.forEach(btn => {
                        btn.addEventListener('click', () => this.deleteOption(btn));
                    });

                    // Add next question button
                    const addNextBtn = questionElement.querySelector('.add-next-question-btn');
                    if (addNextBtn) {
                        addNextBtn.addEventListener('click', this.addNewQuestion.bind(this));
                    }
                },

                markAsCorrect: function(button) {
                    const optionItem = button.closest('.option-item');
                    const questionItem = optionItem.closest('.question-item');

                    // Remove correct class and active-correct class from all options
                    const allOptions = questionItem.querySelectorAll('.option-item');
                    allOptions.forEach(option => {
                        option.classList.remove('option-correct');
                        const checkBtn = option.querySelector('.mark-correct-btn');
                        if (checkBtn) {
                            checkBtn.classList.remove('active-correct');
                        }
                    });

                    // Add correct class to this option
                    optionItem.classList.add('option-correct');

                    // Add active-correct class to this button
                    button.classList.add('active-correct');

                    // Find this option's index
                    const optionIndex = Array.from(allOptions).indexOf(optionItem);

                    // Update hidden input for correct option
                    const correctOptionInput = questionItem.querySelector('.correct-option-input');
                    if (correctOptionInput) {
                        correctOptionInput.value = optionIndex;
                    } else {
                        // If hidden input doesn't exist, create it
                        const questionIndexMatch = questionItem.querySelector('input[name^="questions"]').name.match(/questions\[(\d+)\]/);
                        const questionIndex = questionIndexMatch ? questionIndexMatch[1] : 0;

                        const hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = `questions[${questionIndex}][correct_option]`;
                        hiddenInput.value = optionIndex;
                        hiddenInput.className = 'correct-option-input';
                        questionItem.appendChild(hiddenInput);
                    }
                },

                cloneQuestion: function(questionElement) {
                    // Clone the question element
                    const clonedQuestion = questionElement.cloneNode(true);

                    // Update question index (for form submission)
                    questionCounter++;
                    const newIndex = document.querySelectorAll('.question-item').length;

                    // Update all input names with new index
                    const inputs = clonedQuestion.querySelectorAll('input, textarea, select');
                    inputs.forEach(input => {
                        if (input.name) {
                            input.name = input.name.replace(/questions\[\d+\]/, `questions[${newIndex}]`);
                        }
                    });

                    // Remove any existing ID fields to treat it as a new question
                    const idField = clonedQuestion.querySelector('input[name$="[id]"]');
                    if (idField) {
                        idField.remove();
                    }

                    // Insert the cloned question after the original
                    questionElement.insertAdjacentElement('afterend', clonedQuestion);

                    // Add event listeners to the cloned question
                    this.initQuestionEventListeners(clonedQuestion);

                    // Update question numbers
                    this.updateQuestionNumbers();

                    // Show success message
                    this.showToast('Question cloned successfully!');
                },

                deleteQuestion: function(questionElement) {
                    if (confirm('Are you sure you want to delete this question?')) {
                        // Check if this question has an ID (existing in database)
                        const questionId = questionElement.querySelector('input[name$="[id]"]')?.value;

                        if (questionId) {
                            // If question exists in database, create a hidden input to mark for deletion
                            const form = document.getElementById('examForm');
                            const deleteInput = document.createElement('input');
                            deleteInput.type = 'hidden';
                            deleteInput.name = 'delete_questions[]';
                            deleteInput.value = questionId;
                            form.appendChild(deleteInput);
                        }

                        // Remove the question element from the DOM
                        questionElement.remove();

                        // Update question numbers and indexes
                        this.updateQuestionNumbers();
                        this.updateQuestionIndexes();

                        // Show the add question card if no questions remain
                        const questions = document.querySelectorAll('.question-item');
                        if (questions.length === 0) {
                            const addQuestionCard = document.getElementById('addQuestionBtn');
                            if (addQuestionCard) {
                                addQuestionCard.style.display = 'block';
                            }
                        }
                    }
                },

                addOption: function(questionElement) {
                    const optionsContainer = questionElement.querySelector('.mcq-options');
                    const options = optionsContainer.querySelectorAll('.option-item');
                    const optionIndex = options.length;

                    // Get question index from the input name
                    const questionInput = questionElement.querySelector('input[name^="questions"][name$="[question_title]"]');
                    const questionName = questionInput.name;
                    const questionIndexMatch = questionName.match(/questions\[(\d+)\]/);
                    const questionIndex = questionIndexMatch ? questionIndexMatch[1] : 0;

                    // Get next letter for option (A, B, C...)
                    const nextLetter = optionLetters[optionIndex % optionLetters.length];

                    // Create new option
                    const newOption = document.createElement('div');
                    newOption.className = 'option-item';
                    newOption.innerHTML = `
                <div class="option-marker">${nextLetter}</div>
                <div class="option-text">
                    <input type="text" class="form-control" name="questions[${questionIndex}][options][${optionIndex}]" placeholder="Option text...">
                </div>
                <div class="option-controls">
                    <button class="option-control-btn mark-correct-btn" type="button" title="Mark as correct answer">
                        <i class="fas fa-check-circle"></i>
                    </button>
                    <button class="option-control-btn delete-option-btn" type="button" title="Delete option">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;

                    // Insert the new option before the add button
                    optionsContainer.insertBefore(newOption, optionsContainer.querySelector('.add-option-btn'));

                    // Add event listeners to the new option
                    const markCorrectBtn = newOption.querySelector('.mark-correct-btn');
                    const btnId = 'btn_' + Math.random().toString(36).substr(2, 9);
                    markCorrectBtn.dataset.btnId = btnId;
                    this._markAsCorrectHandlers[btnId] = () => this.markAsCorrect(markCorrectBtn);
                    markCorrectBtn.addEventListener('click', this._markAsCorrectHandlers[btnId]);

                    const deleteOptionBtn = newOption.querySelector('.delete-option-btn');
                    deleteOptionBtn.addEventListener('click', () => this.deleteOption(deleteOptionBtn));
                },

                deleteOption: function(button) {
                    const optionItem = button.closest('.option-item');
                    const questionItem = optionItem.closest('.question-item');

                    // Check if this is the correct option
                    const isCorrect = optionItem.classList.contains('option-correct');

                    // Don't allow deleting if it's the only option remaining
                    const optionsContainer = questionItem.querySelector('.mcq-options');
                    const allOptions = optionsContainer.querySelectorAll('.option-item');
                    if (allOptions.length <= 2) {
                        alert("You must have at least two options for a multiple choice question.");
                        return;
                    }

                    // Check if this option has an ID (existing in database)
                    const optionId = optionItem.querySelector('input[name$="[option_ids][]"]')?.value;

                    if (optionId) {
                        // If option exists in database, create a hidden input to mark for deletion
                        const form = document.getElementById('examForm');
                        const deleteInput = document.createElement('input');
                        deleteInput.type = 'hidden';
                        deleteInput.name = 'delete_options[]';
                        deleteInput.value = optionId;
                        form.appendChild(deleteInput);
                    }

                    // Delete the option
                    optionItem.remove();

                    // If we deleted the correct option, mark the first remaining option as correct
                    if (isCorrect) {
                        const firstOption = questionItem.querySelector('.option-item');
                        if (firstOption) {
                            firstOption.classList.add('option-correct');
                            const checkBtn = firstOption.querySelector('.mark-correct-btn');
                            if (checkBtn) {
                                checkBtn.classList.add('active-correct');
                            }

                            // Update hidden input
                            const correctOptionInput = questionItem.querySelector('.correct-option-input');
                            if (correctOptionInput) {
                                correctOptionInput.value = 0;
                            }
                        }
                    }

                    // Update option letters
                    this.updateOptionLetters(questionItem);

                    // Update option indexes in the input names
                    this.updateOptionIndexes(questionItem);
                },

                updateOptionLetters: function(questionItem) {
                    const options = questionItem.querySelectorAll('.option-item');
                    options.forEach((option, index) => {
                        const letter = optionLetters[index % optionLetters.length];
                        option.querySelector('.option-marker').textContent = letter;
                    });
                },

                updateOptionIndexes: function(questionItem) {
                    // Get question index from the input name
                    const questionInput = questionItem.querySelector('input[name^="questions"][name$="[question_title]"]');
                    const questionName = questionInput.name;
                    const questionIndexMatch = questionName.match(/questions\[(\d+)\]/);
                    const questionIndex = questionIndexMatch ? questionIndexMatch[1] : 0;

                    // Update all option input names
                    const options = questionItem.querySelectorAll('.option-item');
                    options.forEach((option, index) => {
                        const input = option.querySelector('input[type="text"]');
                        if (input) {
                            input.name = `questions[${questionIndex}][options][${index}]`;
                        }

                        // Update option_ids index if it exists
                        const optionIdInput = option.querySelector('input[name^="questions"][name*="[option_ids]"]');
                        if (optionIdInput) {
                            optionIdInput.name = `questions[${questionIndex}][option_ids][${index}]`;
                        }
                    });

                    // Update correct option index if needed
                    const correctOption = questionItem.querySelector('.option-item.option-correct');
                    if (correctOption) {
                        const correctIndex = Array.from(options).indexOf(correctOption);
                        const correctOptionInput = questionItem.querySelector('.correct-option-input');
                        if (correctOptionInput) {
                            correctOptionInput.value = correctIndex;
                        }
                    }
                },

                updateQuestionNumbers: function() {
                    const questions = document.querySelectorAll('.question-item');
                    questions.forEach((question, index) => {
                        question.dataset.questionNumber = index + 1;
                        question.querySelector('.question-number').textContent = `Question ${index + 1}`;
                    });
                },

                updateQuestionIndexes: function() {
                    const questions = document.querySelectorAll('.question-item');
                    questions.forEach((question, index) => {
                        // Update all input names
                        const inputs = question.querySelectorAll('input, textarea, select');
                        inputs.forEach(input => {
                            if (input.name && input.name.match(/questions\[\d+\]/)) {
                                input.name = input.name.replace(/questions\[\d+\]/, `questions[${index}]`);
                            }
                        });
                    });
                },

                // Form submission
                initFormSubmission: function() {
                    const examForm = document.getElementById('examForm');
                    if (examForm) {
                        examForm.addEventListener('submit', function(e) {
                            // Optional: Validate form before submission
                            const isDetailsValid = examManager.validateExamDetails();
                            const isQuestionsValid = examManager.validateQuestions();

                            if (!isDetailsValid || !isQuestionsValid) {
                                e.preventDefault();
                                return false;
                            }

                            // Update all question indexes before submission
                            examManager.updateQuestionIndexes();
                        });
                    }
                },

                // Toast notification
                showToast: function(message) {
                    // Check if toast container exists, if not create it
                    let toastContainer = document.querySelector('.toast-container');
                    if (!toastContainer) {
                        toastContainer = document.createElement('div');
                        toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
                        document.body.appendChild(toastContainer);
                    }

                    // Create a new toast
                    const toastId = 'toast-' + Date.now();
                    const toast = document.createElement('div');
                    toast.className = 'toast show';
                    toast.setAttribute('role', 'alert');
                    toast.setAttribute('aria-live', 'assertive');
                    toast.setAttribute('aria-atomic', 'true');
                    toast.id = toastId;

                    toast.innerHTML = `
                <div class="toast-header">
                    <strong class="me-auto">Notification</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    ${message}
                </div>
            `;

                    // Add toast to container
                    toastContainer.appendChild(toast);

                    // Auto-remove toast after 3 seconds
                    setTimeout(() => {
                        const toastElement = document.getElementById(toastId);
                        if (toastElement) {
                            toastElement.remove();
                        }
                    }, 3000);

                    // Add close button functionality
                    const closeBtn = toast.querySelector('.btn-close');
                    if (closeBtn) {
                        closeBtn.addEventListener('click', function() {
                            toast.remove();
                        });
                    }
                },

                // Initialize everything
                init: function() {
                    this.initTabNavigation();
                    this.initQuestionFunctionality();
                    this.initFormSubmission();

                    // Check for existing questions and count them
                    const existingQuestions = document.querySelectorAll('.question-item');
                    if (existingQuestions.length > 0) {
                        questionCounter = existingQuestions.length;
                    }
                }
            };

            // Initialize the exam manager
            examManager.init();
        });
    </script>
@endpush
