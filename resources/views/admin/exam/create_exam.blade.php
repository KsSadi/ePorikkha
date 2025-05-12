@extends('layouts.main')

@section('pageTitle', 'Create Exam')
@push('style')
<style>

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
            <h1 class="page-title">Create New Exam</h1>
            <p class="page-subtitle">Set up exam details, add questions and configure settings to create a new assessment for your students.</p>
        </div>
    </div>

    <div class="content-card">
        <div class="tab-navigation">
            <div class="tab-item active" data-tab="exam-details">Exam Details</div>
            <div class="tab-item" data-tab="questions">Create Questions</div>
            <div class="tab-item" data-tab="settings">Settings</div>
            <div class="tab-item" data-tab="preview">Preview & Publish</div>
        </div>

        <div class="tab-content active" id="exam-details">
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-info-circle"></i> Basic Information
                </h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="examTitle" class="form-label">Exam Title</label>
                            <input type="text" class="form-control" id="examTitle" placeholder="e.g. Advanced Mathematics Final Exam">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="subjectArea" class="form-label">Subject Area</label>
                            <select class="form-select" id="subjectArea">
                                <option selected>Select subject area</option>
                                <option value="math">Mathematics</option>
                                <option value="science">Science</option>
                                <option value="english">English</option>
                                <option value="cs">Computer Science</option>
                                <option value="history">History</option>
                                <option value="geography">Geography</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="examDescription" class="form-label">Exam Description</label>
                            <textarea class="form-control" id="examDescription" rows="4" placeholder="Provide a brief description of the exam..."></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="examDate" class="form-label">Exam Date</label>
                            <input type="date" class="form-control" id="examDate">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="startTime" class="form-label">Start Time</label>
                            <input type="time" class="form-control" id="startTime">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration (minutes)</label>
                            <input type="number" class="form-control" id="duration" min="10" placeholder="e.g. 120">
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
                            <label for="passingScore" class="form-label">Passing Score (%)</label>
                            <input type="number" class="form-control" id="passingScore" min="0" max="100" value="60">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="totalMarks" class="form-label">Total Marks</label>
                            <input type="number" class="form-control" id="totalMarks" min="1" placeholder="e.g. 100">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label class="form-label">Exam Timer</label>
                        <div class="timer-options">
                            <div class="timer-option selected">
                                <div class="timer-value">30</div>
                                <div class="timer-label">minutes</div>
                            </div>
                            <div class="timer-option">
                                <div class="timer-value">60</div>
                                <div class="timer-label">minutes</div>
                            </div>
                            <div class="timer-option">
                                <div class="timer-value">90</div>
                                <div class="timer-label">minutes</div>
                            </div>
                            <div class="timer-option">
                                <div class="timer-value">120</div>
                                <div class="timer-label">minutes</div>
                            </div>
                            <div class="timer-option">
                                <div class="timer-value">
                                    <i class="fas fa-cog"></i>
                                </div>
                                <div class="timer-label">custom</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="randomizeQuestions">
                            <label class="form-check-label" for="randomizeQuestions">
                                Randomize question order
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="showResults">
                            <label class="form-check-label" for="showResults">
                                Show results immediately after completion
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="preventBacktracking">
                            <label class="form-check-label" for="preventBacktracking">
                                Prevent backtracking to previous questions
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="enableProctoring">
                            <label class="form-check-label" for="enableProctoring">
                                Enable proctoring (prevents tab switching)
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-footer">
                <button class="btn btn-secondary btn-custom">
                    <i class="fas fa-save btn-icon"></i> Save as Draft
                </button>
                <button class="btn btn-primary btn-custom" id="nextToQuestions">
                    Continue to Questions <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>

        <div class="tab-content" id="questions">
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-plus-circle"></i> Create Questions
                </h3>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <button class="import-btn">
                            <i class="fas fa-file-import"></i> Import Questions from Question Bank
                        </button>
                    </div>
                    <div class="col-md-6 text-end">
                        <button class="import-btn">
                            <i class="fas fa-file-excel"></i> Import from Excel/CSV
                        </button>
                    </div>
                </div>

                <div class="upload-area">
                    <input type="file" id="bulkUpload" class="file-input">
                    <i class="fas fa-cloud-upload-alt upload-icon"></i>
                    <div class="upload-text">Drag & drop Excel or CSV file here</div>
                    <div class="upload-hint">or click to browse files</div>
                </div>

                <!-- Question 1 -->
                <div class="question-item" data-question-number="1">
                    <div class="question-number">Question 1</div>
                    <div class="question-actions">
                        <button class="question-action-btn">
                            <i class="fas fa-arrows-alt"></i>
                        </button>
                        <button class="question-action-btn clone-question-btn" title="Clone this question">
                            <i class="fas fa-copy"></i>
                        </button>
                        <button class="question-action-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>

                    <div class="question-content">
                        <div class="mb-3">
                            <label for="questionText1" class="form-label">Question Text</label>
                            <textarea class="form-control" id="questionText1" rows="2" placeholder="Enter your question...">What is the capital city of France?</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Question Type</label>
                            <div class="question-type-selector d-flex mb-3">
                                <div class="form-check form-check-inline me-4">
                                    <input class="form-check-input" type="radio" name="questionType1" id="mcqType1" value="mcq" checked>
                                    <label class="form-check-label" for="mcqType1">
                                        <i class="fas fa-list-ul me-1"></i> Multiple Choice
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="questionType1" id="descriptionType1" value="description">
                                    <label class="form-check-label" for="descriptionType1">
                                        <i class="fas fa-paragraph me-1"></i> Description Based
                                    </label>
                                </div>
                            </div>

                            <div id="mcqOptions1" class="mcq-options">
                                <label class="form-label">Question Options</label>

                                <div class="option-item option-correct">
                                    <div class="option-marker">A</div>
                                    <div class="option-text">
                                        <input type="text" class="form-control" placeholder="Option text..." value="Paris">
                                    </div>
                                    <div class="option-controls">
                                        <button class="option-control-btn">
                                            <i class="fas fa-check-circle"></i>
                                        </button>
                                        <button class="option-control-btn">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="option-item">
                                    <div class="option-marker">B</div>
                                    <div class="option-text">
                                        <input type="text" class="form-control" placeholder="Option text..." value="London">
                                    </div>
                                    <div class="option-controls">
                                        <button class="option-control-btn">
                                            <i class="fas fa-check-circle"></i>
                                        </button>
                                        <button class="option-control-btn">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="option-item">
                                    <div class="option-marker">C</div>
                                    <div class="option-text">
                                        <input type="text" class="form-control" placeholder="Option text..." value="Berlin">
                                    </div>
                                    <div class="option-controls">
                                        <button class="option-control-btn">
                                            <i class="fas fa-check-circle"></i>
                                        </button>
                                        <button class="option-control-btn">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="option-item">
                                    <div class="option-marker">D</div>
                                    <div class="option-text">
                                        <input type="text" class="form-control" placeholder="Option text..." value="Madrid">
                                    </div>
                                    <div class="option-controls">
                                        <button class="option-control-btn">
                                            <i class="fas fa-check-circle"></i>
                                        </button>
                                        <button class="option-control-btn">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <button class="add-option-btn">
                                    <i class="fas fa-plus"></i> Add Another Option
                                </button>
                            </div>

                            <div id="descriptionOptions1" class="description-options" style="display: none;">
                                <div class="form-group">
                                    <label class="form-label">Answer Format</label>
                                    <select class="form-select">
                                        <option value="text">Plain Text</option>
                                        <option value="richtext">Rich Text</option>
                                        <option value="fileupload">File Upload</option>
                                    </select>
                                    <div class="form-text mt-2">For description-based questions, students will provide detailed written answers or upload files as their response.</div>
                                </div>

                                <div class="form-group mt-3">
                                    <label class="form-label">Word Limit (Optional)</label>
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <div class="input-group">
                                                <span class="input-group-text">Min</span>
                                                <input type="number" class="form-control" placeholder="Minimum words">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group">
                                                <span class="input-group-text">Max</span>
                                                <input type="number" class="form-control" placeholder="Maximum words">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="question-footer">
                        <div class="question-info">
                            Marks: <span>5</span> | Type: <span>Multiple Choice</span>
                        </div>
                        <div class="question-actions-buttons">
                            <button class="btn btn-secondary question-footer-btn">
                                <i class="fas fa-cog"></i> Settings
                            </button>
                            <button class="btn btn-primary question-footer-btn add-next-question-btn">
                                <i class="fas fa-plus"></i> Add Question
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Add Question Card - Only show when there are no questions -->
                <div class="add-question-card" id="addQuestionBtn" style="display: none;">
                    <div class="add-question-icon">
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="add-question-text">Add New Question</div>
                </div>
            </div>

            <div class="form-footer">
                <div>
                    <button class="btn btn-secondary btn-custom">
                        <i class="fas fa-arrow-left btn-icon"></i> Back to Details
                    </button>
                </div>
                <div>
                    <button class="btn btn-secondary btn-custom me-2">
                        <i class="fas fa-save btn-icon"></i> Save Questions
                    </button>
                    <button class="btn btn-primary btn-custom">
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
                                <input class="form-check-input" type="radio" name="accessControl" id="accessOpen" checked>
                                <label class="form-check-label" for="accessOpen">
                                    Open to all students
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="accessControl" id="accessRestricted">
                                <label class="form-check-label" for="accessRestricted">
                                    Restrict to specific classes/groups
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="accessControl" id="accessPassword">
                                <label class="form-check-label" for="accessPassword">
                                    Require password
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="examPassword" class="form-label">Exam Password</label>
                            <input type="text" class="form-control" id="examPassword" placeholder="Create a password">
                            <div class="form-text">Leave blank if not using password protection</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="resultSettings" class="form-label">Result Settings</label>
                            <select class="form-select" id="resultSettings">
                                <option value="immediate">Show results immediately after submission</option>
                                <option value="delayed" selected>Release results after exam closes</option>
                                <option value="manual">Release results manually</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="attemptLimit" class="form-label">Attempt Limit</label>
                            <select class="form-select" id="attemptLimit">
                                <option value="1" selected>Single attempt only</option>
                                <option value="2">2 attempts</option>
                                <option value="3">3 attempts</option>
                                <option value="unlimited">Unlimited attempts</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="gradeMethod" class="form-label">Grading Method</label>
                            <select class="form-select" id="gradeMethod">
                                <option value="highest">Highest attempt</option>
                                <option value="latest" selected>Latest attempt</option>
                                <option value="average">Average of all attempts</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Notification Settings</label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="notifyStart" checked>
                                <label class="form-check-label" for="notifyStart">
                                    Notify students when exam is available
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="notifyReminder" checked>
                                <label class="form-check-label" for="notifyReminder">
                                    Send reminder 24 hours before deadline
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="notifyResults" checked>
                                <label class="form-check-label" for="notifyResults">
                                    Notify students when results are available
                                </label>
                            </div>
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
                            <label class="form-label">Security Features</label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="preventTabSwitch" checked>
                                <label class="form-check-label" for="preventTabSwitch">
                                    Prevent tab switching during exam
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="disableCopyPaste" checked>
                                <label class="form-check-label" for="disableCopyPaste">
                                    Disable copy and paste functionality
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="disableRightClick">
                                <label class="form-check-label" for="disableRightClick">
                                    Disable right-click menu
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Monitoring</label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="randomScreenshots">
                                <label class="form-check-label" for="randomScreenshots">
                                    Take random screenshots during exam
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="webcamMonitoring">
                                <label class="form-check-label" for="webcamMonitoring">
                                    Enable webcam monitoring
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="recordSession">
                                <label class="form-check-label" for="recordSession">
                                    Record exam session
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-footer">
                <div>
                    <button class="btn btn-secondary btn-custom">
                        <i class="fas fa-arrow-left btn-icon"></i> Back to Questions
                    </button>
                </div>
                <div>
                    <button class="btn btn-secondary btn-custom me-2">
                        <i class="fas fa-save btn-icon"></i> Save Settings
                    </button>
                    <button class="btn btn-primary btn-custom">
                        Continue to Preview <i class="fas fa-arrow-right btn-icon"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="tab-content" id="preview">
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-eye"></i> Preview Exam
                </h3>

                <div class="content-card">
                    <h4 class="mb-4">Advanced Mathematics Final Exam</h4>

                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="mb-2"><strong>Subject:</strong> Mathematics</div>
                            <div class="mb-2"><strong>Date:</strong> May 20, 2025</div>
                            <div><strong>Duration:</strong> 90 minutes</div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-2"><strong>Total Questions:</strong> 30</div>
                            <div class="mb-2"><strong>Total Marks:</strong> 100</div>
                            <div><strong>Passing Score:</strong> 60%</div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-2"><strong>Start Time:</strong> 10:00 AM</div>
                            <div class="mb-2"><strong>End Time:</strong> 11:30 AM</div>
                            <div><strong>Status:</strong> <span class="text-warning">Draft</span></div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="mb-3">Exam Description</h5>
                        <p>This is the final examination for Advanced Mathematics. It covers all topics from the semester including algebra, calculus, and statistics. Please ensure you have a calculator for this exam.</p>
                    </div>

                    <div class="mb-4">
                        <h5 class="mb-3">Exam Questions (30)</h5>
                        <div class="list-group">
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>1. What is the capital city of France?</div>
                                <span class="badge bg-primary rounded-pill">5 marks</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>2. Which of the following programming languages is used for web development?</div>
                                <span class="badge bg-primary rounded-pill">5 marks</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center text-muted">
                                <div>3. [Question text will appear here]</div>
                                <span class="badge bg-secondary rounded-pill">Not set</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center text-muted">
                                <em>...and 27 more questions</em>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="mb-3">Exam Settings</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Randomize Questions
                                        <span class="badge bg-success rounded-pill">Enabled</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Show Results Immediately
                                        <span class="badge bg-danger rounded-pill">Disabled</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Prevent Backtracking
                                        <span class="badge bg-success rounded-pill">Enabled</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Proctoring
                                        <span class="badge bg-success rounded-pill">Enabled</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Access Control
                                        <span class="badge bg-primary rounded-pill">All Students</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Attempt Limit
                                        <span class="badge bg-primary rounded-pill">Single</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-footer">
                <div>
                    <button class="btn btn-secondary btn-custom">
                        <i class="fas fa-arrow-left btn-icon"></i> Back to Settings
                    </button>
                </div>
                <div>
                    <button class="btn btn-secondary btn-custom me-2">
                        <i class="fas fa-save btn-icon"></i> Save as Draft
                    </button>
                    <button class="btn btn-primary btn-custom">
                        <i class="fas fa-paper-plane btn-icon"></i> Publish Exam
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tab navigation functionality
            const tabItems = document.querySelectorAll('.tab-item');
            const tabContents = document.querySelectorAll('.tab-content');

            tabItems.forEach(item => {
                item.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');

                    // Remove active class from all tabs and contents
                    tabItems.forEach(tab => tab.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));

                    // Add active class to selected tab and content
                    this.classList.add('active');
                    document.getElementById(tabId).classList.add('active');
                });
            });

            // Timer option selection with custom time input
            const timerOptions = document.querySelectorAll('.timer-option');
            const timerContainer = document.querySelector('.timer-options');
            let customInputCreated = false;
            let customInput = null;
            let customTimeValue = null;

            timerOptions.forEach(option => {
                option.addEventListener('click', function() {
                    timerOptions.forEach(opt => opt.classList.remove('selected'));
                    this.classList.add('selected');

                    // Check if this is the custom option (with cog icon or custom value)
                    const isCustomOption = this.querySelector('.fas.fa-cog') || this.classList.contains('custom-option');

                    // Remove any existing custom input
                    if (customInput) {
                        customInput.remove();
                        customInputCreated = false;
                    }

                    // If custom option is clicked, add the input field
                    if (isCustomOption) {
                        customInput = document.createElement('div');
                        customInput.className = 'custom-timer-input';
                        customInput.innerHTML = `
                            <div class="input-group mt-3">
                                <input type="number" class="form-control" id="customTimerInput" min="1" placeholder="Enter minutes" value="${customTimeValue || ''}">
                                <button class="btn btn-primary" id="applyCustomTime">Apply</button>
                            </div>
                        `;

                        timerContainer.insertAdjacentElement('afterend', customInput);
                        customInputCreated = true;

                        // Focus on the input
                        const inputField = document.getElementById('customTimerInput');
                        inputField.focus();

                        // Add event listener for the apply button
                        document.getElementById('applyCustomTime').addEventListener('click', function() {
                            const customTime = inputField.value;
                            if (customTime && !isNaN(customTime) && customTime > 0) {
                                // Save the current value for future edits
                                customTimeValue = customTime;

                                // Update the custom option to show the entered value
                                const customTimerOption = document.querySelector('.timer-option.selected .timer-value');
                                customTimerOption.innerHTML = customTime;
                                customTimerOption.style.fontSize = '2rem';

                                // Mark this as a custom option for future editing
                                document.querySelector('.timer-option.selected').classList.add('custom-option');
                                document.querySelector('.timer-option.selected .fas.fa-cog')?.remove();

                                // Update the label
                                const label = document.querySelector('.timer-option.selected .timer-label');
                                if (label) {
                                    label.textContent = 'minutes';
                                }

                                // Add a small edit button to indicate it can be edited
                                const editIndicator = document.createElement('div');
                                editIndicator.className = 'edit-indicator';
                                editIndicator.innerHTML = '<i class="fas fa-edit"></i>';

                                if (!document.querySelector('.timer-option.selected .edit-indicator')) {
                                    document.querySelector('.timer-option.selected').appendChild(editIndicator);
                                }

                                // Hide the input after applying
                                customInput.style.display = 'none';
                            } else {
                                // Show error if invalid input
                                inputField.classList.add('is-invalid');
                                setTimeout(() => {
                                    inputField.classList.remove('is-invalid');
                                }, 2000);
                            }
                        });

                        // Also listen for Enter key
                        inputField.addEventListener('keypress', function(e) {
                            if (e.key === 'Enter') {
                                document.getElementById('applyCustomTime').click();
                            }
                        });
                    }
                });
            });

            // Next button functionality
            const nextToQuestionsBtn = document.getElementById('nextToQuestions');
            if (nextToQuestionsBtn) {
                nextToQuestionsBtn.addEventListener('click', function() {
                    tabItems.forEach(tab => tab.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));

                    document.querySelector('[data-tab="questions"]').classList.add('active');
                    document.getElementById('questions').classList.add('active');
                });
            }

            // Add Question functionality
            const addQuestionBtn = document.getElementById('addQuestionBtn');
            if (addQuestionBtn) {
                addQuestionBtn.addEventListener('click', function() {
                    // In a real application, this would add a new question
                    alert('Add new question functionality would be implemented here.');
                });
            }

            // Add Next Question button functionality
            const addNextQuestionButtons = document.querySelectorAll('.add-next-question-btn');
            addNextQuestionButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Get the parent question item
                    const currentQuestionItem = this.closest('.question-item');

                    // Get all existing questions
                    const allQuestions = document.querySelectorAll('.question-item');

                    // Generate a new question number
                    const newQuestionNumber = allQuestions.length + 1;

                    // Create unique ID for the new question
                    const uniqueId = Date.now();

                    // Create a new question element
                    const newQuestion = document.createElement('div');
                    newQuestion.className = 'question-item';
                    newQuestion.dataset.questionNumber = newQuestionNumber;

                    // Generate HTML for the new question
                    newQuestion.innerHTML = `
                        <div class="question-number">Question ${newQuestionNumber}</div>
                        <div class="question-actions">
                            <button class="question-action-btn">
                                <i class="fas fa-arrows-alt"></i>
                            </button>
                            <button class="question-action-btn clone-question-btn" title="Clone this question">
                                <i class="fas fa-copy"></i>
                            </button>
                            <button class="question-action-btn">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>

                        <div class="question-content">
                            <div class="mb-3">
                                <label for="questionText${uniqueId}" class="form-label">Question Text</label>
                                <textarea class="form-control" id="questionText${uniqueId}" rows="2" placeholder="Enter your question..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Question Type</label>
                                <div class="question-type-selector d-flex mb-3">
                                    <div class="form-check form-check-inline me-4">
                                        <input class="form-check-input" type="radio" name="questionType${uniqueId}" id="mcqType${uniqueId}" value="mcq" checked>
                                        <label class="form-check-label" for="mcqType${uniqueId}">
                                            <i class="fas fa-list-ul me-1"></i> Multiple Choice
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="questionType${uniqueId}" id="descriptionType${uniqueId}" value="description">
                                        <label class="form-check-label" for="descriptionType${uniqueId}">
                                            <i class="fas fa-paragraph me-1"></i> Description Based
                                        </label>
                                    </div>
                                </div>

                                <div id="mcqOptions${uniqueId}" class="mcq-options">
                                    <label class="form-label">Question Options</label>

                                    <div class="option-item option-correct">
                                        <div class="option-marker">A</div>
                                        <div class="option-text">
                                            <input type="text" class="form-control" placeholder="Option text...">
                                        </div>
                                        <div class="option-controls">
                                            <button class="option-control-btn">
                                                <i class="fas fa-check-circle"></i>
                                            </button>
                                            <button class="option-control-btn">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="option-item">
                                        <div class="option-marker">B</div>
                                        <div class="option-text">
                                            <input type="text" class="form-control" placeholder="Option text...">
                                        </div>
                                        <div class="option-controls">
                                            <button class="option-control-btn">
                                                <i class="fas fa-check-circle"></i>
                                            </button>
                                            <button class="option-control-btn">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <button class="add-option-btn">
                                        <i class="fas fa-plus"></i> Add Another Option
                                    </button>
                                </div>

                                <div id="descriptionOptions${uniqueId}" class="description-options" style="display: none;">
                                    <div class="form-group">
                                        <label class="form-label">Answer Format</label>
                                        <select class="form-select">
                                            <option value="text">Plain Text</option>
                                            <option value="richtext">Rich Text</option>
                                            <option value="fileupload">File Upload</option>
                                        </select>
                                        <div class="form-text mt-2">For description-based questions, students will provide detailed written answers or upload files as their response.</div>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label class="form-label">Word Limit (Optional)</label>
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <div class="input-group">
                                                    <span class="input-group-text">Min</span>
                                                    <input type="number" class="form-control" placeholder="Minimum words">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group">
                                                    <span class="input-group-text">Max</span>
                                                    <input type="number" class="form-control" placeholder="Maximum words">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="question-footer">
                            <div class="question-info">
                                Marks: <span>5</span> | Type: <span>Multiple Choice</span>
                            </div>
                            <div class="question-actions-buttons">
                                <button class="btn btn-secondary question-footer-btn">
                                    <i class="fas fa-cog"></i> Settings
                                </button>
                                <button class="btn btn-primary question-footer-btn add-next-question-btn">
                                    <i class="fas fa-plus"></i> Add Question
                                </button>
                            </div>
                        </div>
                    `;

                    // Insert the new question after the current question
                    currentQuestionItem.insertAdjacentElement('afterend', newQuestion);

                    // Add event listeners to the new question's controls
                    addQuestionEventListeners(newQuestion);

                    // Add event listener to the new "Add Question" button
                    const newAddButton = newQuestion.querySelector('.add-next-question-btn');
                    if (newAddButton) {
                        newAddButton.addEventListener('click', function() {
                            // Reuse the same function for adding more questions
                            addNextQuestionButtons[0].click();
                        });
                    }

                    // Scroll to the new question
                    newQuestion.scrollIntoView({ behavior: 'smooth', block: 'start' });
                });
            });

            // Question type toggle functionality
            const questionTypeRadios = document.querySelectorAll('input[name^="questionType"]');
            questionTypeRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    const questionItem = this.closest('.question-item');
                    const mcqOptions = questionItem.querySelector('.mcq-options');
                    const descriptionOptions = questionItem.querySelector('.description-options');

                    if (this.value === 'mcq') {
                        mcqOptions.style.display = 'block';
                        descriptionOptions.style.display = 'none';
                    } else {
                        mcqOptions.style.display = 'none';
                        descriptionOptions.style.display = 'block';
                    }
                });
            });

            // Clone question functionality
            const cloneButtons = document.querySelectorAll('.clone-question-btn');
            cloneButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Get the parent question item
                    const questionItem = this.closest('.question-item');

                    // Clone the question
                    const clonedQuestion = questionItem.cloneNode(true);

                    // Update question number
                    const questionItems = document.querySelectorAll('.question-item');
                    const newQuestionNumber = questionItems.length + 1;
                    clonedQuestion.querySelector('.question-number').textContent = `Question ${newQuestionNumber}`;

                    // Update IDs and names to avoid duplicates
                    const uniqueId = Date.now();
                    const questionText = clonedQuestion.querySelector('textarea');
                    if (questionText) {
                        questionText.id = `questionText${uniqueId}`;
                    }

                    // Update radio button IDs and names
                    const radioButtons = clonedQuestion.querySelectorAll('input[type="radio"]');
                    const newGroupName = `questionType${uniqueId}`;
                    radioButtons.forEach((radio, index) => {
                        radio.name = newGroupName;
                        radio.id = `${radio.value}Type${uniqueId}`;
                        const label = radio.nextElementSibling;
                        if (label) {
                            label.setAttribute('for', radio.id);
                        }
                    });

                    // Update option container IDs
                    const mcqOptions = clonedQuestion.querySelector('.mcq-options');
                    const descOptions = clonedQuestion.querySelector('.description-options');
                    if (mcqOptions) mcqOptions.id = `mcqOptions${uniqueId}`;
                    if (descOptions) descOptions.id = `descriptionOptions${uniqueId}`;

                    // Add event listeners to the cloned question's controls
                    addQuestionEventListeners(clonedQuestion);

                    // Insert the cloned question before the "Add Question" card
                    const addQuestionCard = document.getElementById('addQuestionBtn');
                    addQuestionCard.parentNode.insertBefore(clonedQuestion, addQuestionCard);

                    // Show success message
                    alert('Question cloned successfully!');
                });
            });

            // Function to add event listeners to question controls
            function addQuestionEventListeners(questionElement) {
                // Add event listeners to radio buttons
                const radios = questionElement.querySelectorAll('input[name^="questionType"]');
                radios.forEach(radio => {
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

                // Add event listener to clone button
                const cloneBtn = questionElement.querySelector('.clone-question-btn');
                if (cloneBtn) {
                    cloneBtn.addEventListener('click', function() {
                        const questionItem = this.closest('.question-item');
                        // Clone functionality would be identical to the one above
                        // Using the existing clone buttons event handler system
                    });
                }

                // Add event listener to delete button
                const deleteBtn = questionElement.querySelector('.question-action-btn:last-child');
                if (deleteBtn) {
                    deleteBtn.addEventListener('click', function() {
                        if (confirm('Are you sure you want to delete this question?')) {
                            questionElement.remove();
                            // Renumber remaining questions
                            updateQuestionNumbers();
                        }
                    });
                }

                // Add event listeners to option control buttons
                const optionButtons = questionElement.querySelectorAll('.option-control-btn');
                optionButtons.forEach((btn, index) => {
                    if (index % 2 === 0) { // Check button (even index)
                        btn.addEventListener('click', function() {
                            const optionItem = this.closest('.option-item');

                            // Toggle correct answer selection
                            const allOptions = questionElement.querySelectorAll('.option-item');
                            allOptions.forEach(option => {
                                option.classList.remove('option-correct');
                            });

                            optionItem.classList.add('option-correct');
                        });
                    } else { // Delete button (odd index)
                        btn.addEventListener('click', function() {
                            const optionItem = this.closest('.option-item');
                            optionItem.remove();
                        });
                    }
                });

                // Add event listener to "Add Another Option" button
                const addOptionBtn = questionElement.querySelector('.add-option-btn');
                if (addOptionBtn) {
                    addOptionBtn.addEventListener('click', function() {
                        const optionsContainer = this.closest('.mcq-options');
                        const options = optionsContainer.querySelectorAll('.option-item');
                        const nextLetter = String.fromCharCode(65 + options.length); // A, B, C...

                        const newOption = document.createElement('div');
                        newOption.className = 'option-item';
                        newOption.innerHTML = `
                            <div class="option-marker">${nextLetter}</div>
                            <div class="option-text">
                                <input type="text" class="form-control" placeholder="Option text...">
                            </div>
                            <div class="option-controls">
                                <button class="option-control-btn">
                                    <i class="fas fa-check-circle"></i>
                                </button>
                                <button class="option-control-btn">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        `;

                        // Insert before the "Add Another Option" button
                        optionsContainer.insertBefore(newOption, this);

                        // Add event listeners to the new option's buttons
                        const checkBtn = newOption.querySelector('.option-control-btn:first-child');
                        const deleteBtn = newOption.querySelector('.option-control-btn:last-child');

                        checkBtn.addEventListener('click', function() {
                            const optionItem = this.closest('.option-item');
                            const allOptions = optionsContainer.querySelectorAll('.option-item');

                            allOptions.forEach(option => {
                                option.classList.remove('option-correct');
                            });

                            optionItem.classList.add('option-correct');
                        });

                        deleteBtn.addEventListener('click', function() {
                            newOption.remove();
                        });
                    });
                }
            }

            // Function to update question numbers after deletion
            function updateQuestionNumbers() {
                const questions = document.querySelectorAll('.question-item');
                questions.forEach((question, index) => {
                    question.querySelector('.question-number').textContent = `Question ${index + 1}`;
                });
            }

            // Initialize event listeners for all existing questions
            document.querySelectorAll('.question-item').forEach(question => {
                addQuestionEventListeners(question);
            });
        });
    </script>
@endpush
