@extends('layouts.main')
@section('title', 'Exam Question')
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
        .question-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
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
        .main-content {
            display: flex;
            gap: 30px;
            margin-bottom: 30px;
        }
        .sidebar {
            width: 300px;
            flex-shrink: 0;
        }
        .timer-card {
            background-color: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            text-align: center;
            margin-bottom: 25px;
            transition: all 0.3s;
        }
        .timer-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        .timer-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 15px;
        }
        .timer-display {
            background: linear-gradient(135deg, var(--primary-color) 0%, #7d7df8 100%);
            color: white;
            border-radius: 12px;
            padding: 15px;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            box-shadow: 0 5px 15px rgba(90, 90, 243, 0.3);
            position: relative;
            overflow: hidden;
        }
        .timer-display::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to right,
                rgba(255,255,255,0) 0%,
                rgba(255,255,255,0.3) 50%,
                rgba(255,255,255,0) 100%
            );
            transform: rotate(30deg);
            animation: shine 4s infinite linear;
        }
        @keyframes shine {
            0% { transform: translateX(-100%) rotate(30deg); }
            100% { transform: translateX(100%) rotate(30deg); }
        }
        .timer-warning {
            color: var(--warning-color);
        }
        .timer-danger {
            color: var(--danger-color);
        }
        .timer-text {
            color: #777;
            font-size: 0.9rem;
        }
        .progress-card {
            background-color: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 25px;
        }
        .progress-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 15px;
        }
        .progress-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 0.9rem;
        }
        .progress-bar-container {
            height: 8px;
            background-color: #f0f0f0;
            border-radius: 4px;
            overflow: hidden;
        }
        .progress-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--primary-color), #7d7df8);
            border-radius: 4px;
        }
        .instructions-card {
            background-color: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        .instructions-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        .instructions-title i {
            margin-right: 10px;
        }
        .instructions-list {
            padding-left: 20px;
            margin-bottom: 0;
        }
        .instructions-list li {
            margin-bottom: 10px;
            color: #555;
        }
        .instructions-list li:last-child {
            margin-bottom: 0;
        }
        .content-area {
            flex: 1;
        }
        .question-card {
            background-color: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 25px;
        }
        .question-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .question-info {
            display: flex;
            align-items: center;
        }
        .question-number {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            background-color: var(--primary-light);
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.2rem;
            margin-right: 15px;
        }
        .question-meta {
            color: #777;
            font-size: 0.9rem;
        }
        .question-meta span {
            display: inline-block;
            margin-right: 15px;
        }
        .question-meta i {
            margin-right: 5px;
        }
        .question-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 20px;
        }
        .question-text {
            color: #555;
            line-height: 1.7;
            margin-bottom: 25px;
        }
        .question-image {
            max-width: 100%;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        .answer-card {
            background-color: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        .answer-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        .answer-title i {
            margin-right: 10px;
        }
        .nav-tabs {
            border-bottom: 2px solid #eee;
            margin-bottom: 25px;
            gap: 15px;
        }
        .nav-tabs .nav-link {
            border: none;
            padding: 10px 20px;
            font-weight: 600;
            color: #777;
            border-radius: 8px 8px 0 0;
            transition: all 0.3s;
        }
        .nav-tabs .nav-link.active {
            color: var(--primary-color);
            background-color: var(--primary-light);
            border-bottom: 2px solid var(--primary-color);
        }
        .nav-tabs .nav-link:hover:not(.active) {
            background-color: #f8f9fa;
        }
        .tab-content {
            padding: 10px 0;
        }
        .form-control {
            border: 2px solid #eee;
            border-radius: 8px;
            padding: 12px;
            resize: none;
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(90, 90, 243, 0.1);
        }
        .form-label {
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
        }
        .upload-area {
            border: 2px dashed #ccc;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s;
            cursor: pointer;
            margin-bottom: 20px;
        }
        .upload-area:hover {
            border-color: var(--primary-color);
            background-color: var(--primary-light);
        }
        .upload-icon {
            font-size: 3rem;
            color: #ccc;
            margin-bottom: 15px;
            transition: all 0.3s;
        }
        .upload-area:hover .upload-icon {
            color: var(--primary-color);
        }
        .upload-text {
            font-weight: 600;
            margin-bottom: 5px;
        }
        .upload-subtext {
            color: #777;
            font-size: 0.9rem;
            margin-bottom: 15px;
        }
        .upload-btn {
            display: inline-flex;
            align-items: center;
            background-color: var(--primary-light);
            color: var(--primary-color);
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }
        .upload-btn:hover {
            background-color: var(--primary-color);
            color: white;
        }
        .upload-btn i {
            margin-right: 8px;
        }
        .file-list {
            margin-top: 20px;
        }
        .file-item {
            display: flex;
            align-items: center;
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 10px 15px;
            margin-bottom: 10px;
        }
        .file-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background-color: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            margin-right: 15px;
        }
        .file-info {
            flex: 1;
        }
        .file-name {
            font-weight: 600;
            margin-bottom: 2px;
        }
        .file-size {
            color: #777;
            font-size: 0.85rem;
        }
        .file-actions {
            display: flex;
            gap: 10px;
        }
        .file-action {
            width: 32px;
            height: 32px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        .file-view {
            background-color: var(--primary-light);
            color: var(--primary-color);
        }
        .file-view:hover {
            background-color: var(--primary-color);
            color: white;
        }
        .file-delete {
            background-color: #ffeeee;
            color: var(--danger-color);
        }
        .file-delete:hover {
            background-color: var(--danger-color);
            color: white;
        }
        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        .btn-custom {
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 600;
            display: flex;
            align-items: center;
            transition: all 0.3s;
        }
        .btn-primary {
            background: linear-gradient(45deg, var(--primary-color), #7d7df8);
            border: none;
            box-shadow: 0 5px 15px rgba(90, 90, 243, 0.2);
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #4b4bea, #6e6ef7);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(90, 90, 243, 0.3);
        }
        .btn-outline {
            border: 2px solid #ddd;
            background-color: transparent;
            color: #777;
        }
        .btn-outline:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }
        .btn-icon {
            margin-right: 8px;
        }
        .word-count {
            color: #777;
            font-size: 0.9rem;
            text-align: right;
            margin-top: 10px;
        }
        .tooltip-icon {
            color: #777;
            margin-left: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .tooltip-icon:hover {
            color: var(--primary-color);
        }
        .saved-indicator {
            display: flex;
            align-items: center;
            color: var(--success-color);
            font-size: 0.9rem;
            margin-top: 15px;
        }
        .saved-indicator i {
            margin-right: 5px;
        }
    </style>

    <style>




        .question-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #4a6cf7;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: 600;
            margin-right: 15px;
        }

        .question-info h2 {
            margin: 0 0 5px;
            font-size: 18px;
            color: #333;
        }

        .question-meta {
            display: flex;
            font-size: 13px;
            color: #666;
        }

        .question-meta span {
            margin-right: 15px;
            display: flex;
            align-items: center;
        }

        .question-meta i {
            margin-right: 5px;
        }

        .question-title {
            padding: 20px 20px 0;
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        .question-text {
            padding: 15px 20px;
            color: #555;
            line-height: 1.6;
        }

        .question-text p {
            margin-bottom: 15px;
        }

        .question-text ol,
        .question-text ul {
            padding-left: 25px;
            margin-bottom: 15px;
        }

        .question-text li {
            margin-bottom: 8px;
        }

        .question-image {
            width: 100%;
            max-height: 400px;
            object-fit: contain;
            margin-bottom: 20px;
            padding: 0 20px 20px;
        }

        /* Answer Card */
        .answer-card {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .answer-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #333;
            display: flex;
            align-items: center;
        }

        .answer-title i {
            margin-right: 8px;
            color: #4a6cf7;
        }

        /* MCQ Options */
        .mcq-options {
            margin-bottom: 20px;
        }

        .option-item {
            display: flex;
            align-items: flex-start;
            padding: 15px;
            border: 1px solid #eee;
            border-radius: 6px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .option-item:hover {
            border-color: #4a6cf7;
            background: #f7f9ff;
        }

        .option-item.selected {
            border-color: #4a6cf7;
            background: #f0f4ff;
        }

        .option-radio {
            margin-right: 15px;
            margin-top: 3px;
        }

        .option-letter {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #f0f4ff;
            color: #4a6cf7;
            font-weight: 600;
            margin-right: 15px;
        }

        .option-text {
            flex: 1;
            font-size: 15px;
            color: #333;
        }

        /* File Upload */
        .file-upload-container {
            border: 2px dashed #ddd;
            border-radius: 6px;
            padding: 25px;
            text-align: center;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .file-upload-container:hover {
            border-color: #4a6cf7;
        }

        .upload-icon {
            font-size: 40px;
            color: #4a6cf7;
            margin-bottom: 15px;
        }

        .upload-text {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        .upload-subtext {
            font-size: 14px;
            color: #888;
            margin-bottom: 15px;
        }

        .file-input {
            display: none;
        }

        .browse-btn {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            background: #f0f4ff;
            color: #4a6cf7;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .browse-btn:hover {
            background: #e0e8ff;
        }

        .browse-btn i {
            margin-right: 8px;
        }

        .file-info {
            margin-top: 15px;
            padding: 10px 15px;
            background: #f9f9f9;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .file-info-text {
            display: flex;
            align-items: center;
        }

        .file-info-text i {
            font-size: 18px;
            color: #4a6cf7;
            margin-right: 10px;
        }

        .file-name {
            font-size: 14px;
            color: #333;
        }

        .remove-file {
            color: #e74c3c;
            cursor: pointer;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            justify-content: flex-end;
        }




        </style>
@endpush
@section('content')
    <div class="main-content">
        <div class="sidebar">
            <div class="timer-card">
                <div class="timer-title">Time Spent in Exam</div>
                <div class="timer-display" id="timerDisplay">{{ $timeSpent }}</div>
                <div class="timer-text">Ongoing Exam Timer</div>
            </div>

            <div class="progress-card">
                <div class="progress-title">Your Progress</div>
                <div class="progress-info">
                    <span>Question {{ $currentNumber }} of {{ $totalQuestions }}</span>
                    <span>{{ number_format($progressPercentage) }}% Complete</span>
                </div>
                <div class="progress-bar-container">
                    <div class="progress-bar-fill" style="width: {{ $progressPercentage }}%;"></div>
                </div>
            </div>

            <div class="instructions-card">
                <div class="instructions-title">
                    <i class="fas fa-info-circle"></i> Instructions
                </div>
                <ul class="instructions-list">
                    <li>Read the question carefully before answering.</li>
                    <li>You can submit your answer using text or by uploading files.</li>
                    <li>For file uploads, acceptable formats are: PDF, DOC, DOCX, JPG, PNG.</li>
                    <li>Maximum file size: 10MB per file.</li>
                    <li>You can submit multiple files if needed.</li>
                    <li>Your answer is automatically saved every 30 seconds.</li>
                    <li>Once submitted, you cannot change your answer.</li>
                    @if($exam->prevent_backtracking)
                        <li>You cannot return to previous questions after submitting.</li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="content-area">
            <div class="question-card">
                <div class="question-header">
                    <div class="question-info">
                        <div class="question-number">{{ $currentNumber }}</div>
                        <div>
                            <h2>{{ $question->question_title }}</h2>
                            <div class="question-meta">
                                <span><i class="fas fa-award"></i> Points: {{ $question->marks }}</span>
                                @if($question->time_limit)
                                    <span><i class="fas fa-clock"></i> Time: {{ $question->time_limit }} minutes</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question-title">
                    {{ $question->question_title }}
                </div>

                <div class="question-text">
                    {!! nl2br(e($question->question_text)) !!}
                </div>

                @if(isset($question->image_path) && $question->image_path)
                    <img src="{{ asset('storage/' . $question->image_path) }}" alt="Question Image" class="question-image">
                @endif
            </div>

            <div class="answer-card">
                <div class="answer-title">
                    <i class="fas fa-pen-fancy"></i> Your Answer
                </div>

                <form id="answerForm" method="POST" action="{{ route('student.question.submit', ['exam' => $exam->id, 'question' => $question->id]) }}" enctype="multipart/form-data">
                    @csrf

                    @if($question->isMcq())
                        <!-- MCQ Options -->
                        <div class="mcq-options">
                            @foreach($options as $option)
                                <div class="option-item {{ $answer && $answer->selected_option_id == $option->id ? 'selected' : '' }}" onclick="selectOption({{ $option->id }})">
                                    <input type="radio" name="selected_option_id" id="option{{ $option->id }}" value="{{ $option->id }}" class="option-radio" {{ $answer && $answer->selected_option_id == $option->id ? 'checked' : '' }}>
                                    <div class="option-letter">{{ $option->letter }}</div>
                                    <div class="option-text">{{ $option->option_text }}</div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- Replace your file upload section with this -->
                        <!-- Replace your file upload section with this -->
                        <div class="file-upload-container" id="fileUploadContainer" onclick="
    // Only open file dialog if clicking container (not the file info)
    if (document.getElementById('fileInfo').style.display === 'none') {
        document.getElementById('fileInput').click();
    }
">
                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                            <div class="upload-text" id="uploadText">Click to upload your answer file</div>
                            <div class="upload-subtext">or</div>
                            <label for="fileInput" class="browse-btn">
                                <i class="fas fa-folder-open"></i> Browse Files
                            </label>
                            <input type="file" name="answer_file" id="fileInput" class="file-input" style="display: none;"
                                   onchange="
               if (this.files && this.files[0]) {
                   var file = this.files[0];
                   document.getElementById('fileName').textContent = file.name;
                   document.getElementById('fileInfo').style.display = 'flex';
                   document.getElementById('fileUploadContainer').style.borderColor = '#4a6cf7';
                   document.getElementById('fileUploadContainer').style.backgroundColor = '#f0f4ff';
                   document.getElementById('uploadText').style.color = '#4a6cf7';
                   document.getElementById('uploadText').textContent = 'File selected!';

                   var fileIcon = document.getElementById('fileIcon');
                   if (file.type.includes('pdf')) {
                       fileIcon.className = 'fas fa-file-pdf';
                   } else if (file.type.includes('image')) {
                       fileIcon.className = 'fas fa-file-image';
                   } else if (file.type.includes('word') || file.type.includes('doc')) {
                       fileIcon.className = 'fas fa-file-word';
                   } else {
                       fileIcon.className = 'fas fa-file';
                   }
               }
           ">
                        </div>

                        <div class="file-info" id="fileInfo" style="display: none;" onclick="event.stopPropagation();">
                            <div class="file-info-text">
                                <i class="fas fa-file" id="fileIcon"></i>
                                <span class="file-name" id="fileName"></span>
                            </div>
                            <div class="remove-file" id="removeFileBtn"
                                 onclick="
             event.stopPropagation();
             document.getElementById('fileInput').value = '';
             document.getElementById('fileInfo').style.display = 'none';
             document.getElementById('fileUploadContainer').style.borderColor = '';
             document.getElementById('fileUploadContainer').style.backgroundColor = '';
             document.getElementById('uploadText').style.color = '';
             document.getElementById('uploadText').textContent = 'Click to upload your answer file';
         ">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>

                    @endif

                    <div class="action-buttons">
                        <button class="btn btn-primary btn-custom" id="submitBtn" type="submit">
                            <i class="fas fa-paper-plane btn-icon"></i> Submit And Next
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Simple function to show selected file
            window.addEventListener('load', function() {
                @if($upload)
                document.getElementById('fileInfo').style.display = 'flex';
                document.getElementById('fileUploadContainer').style.borderColor = '#4a6cf7';
                document.getElementById('fileUploadContainer').style.backgroundColor = '#f0f4ff';
                document.getElementById('uploadText').style.color = '#4a6cf7';
                document.getElementById('uploadText').textContent = 'File selected!';
                @endif
            });
        </script>
    @endpush
@endsection
