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
    </style>
@endpush

@section('content')
<div class="container">
    <h1>Manage Report</h1>
    <div class="row">
        <div class="col-md-12">
{{--            <a href="{{ route('admin.report.create') }}" class="btn btn-primary">Create Report</a>--}}
        </div>
    </div>
    <br>
    <div id="upcomingExamContainer">

        <h2 class="section-title">Recent Exams</h2>

        <div class="exams-grid">
            @forelse($filteredExams as $exam)
                <div class="exam-card">
                    <div class="exam-card-header">
                        <div class="exam-subject-icon {{ Str::contains(strtolower($exam->getIconClassAttribute()), 'cs') ? 'cs-icon' :
                                                  (Str::contains(strtolower($exam->getIconClassAttribute()), 'math') ? 'math-icon' :
                                                  (Str::contains(strtolower($exam->getIconClassAttribute()), 'science') ? 'science-icon' :
                                                  (Str::contains(strtolower($exam->getIconClassAttribute()), 'english') ? 'english-icon' : 'cs-icon'))) }}">
                            <i class="{{ explode(' ', $exam->getIconClassAttribute())[1] }}"></i>
                        </div>
                        <div class="exam-info">
                            <div class="exam-title">{{ $exam->title }}</div>
                            <div class="exam-subtitle">{{ $exam->question_count }} Questions</div>
                        </div>
                    </div>

                    <div class="exam-details">
                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="detail-text">{{ $exam->formatted_date }}</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="detail-text">{{ $examStats[$exam->id]['totalStudents'] }} Students</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="fas fa-paper-plane"></i>
                            </div>
                            <div class="detail-text">{{ $examStats[$exam->id]['totalSubmissions'] }} Submissions</div>
                        </div>
                    </div>

                    <div class="student-progress">
                    <span class="status-badge status-{{ $examStats[$exam->id]['status'] == 'active' ? 'active' : 'completed' }}">
                        {{ $examStats[$exam->id]['status'] == 'active' ? 'Active Now' : 'Completed' }}
                    </span>
                        <div class="progress-info">
                            <div class="progress-text">Student Progress</div>
                            <div class="progress-value">{{ $examStats[$exam->id]['progress'] }}%</div>
                        </div>
                        <div class="progress-bar-container">
                            <div class="progress-bar-fill" style="width: {{ $examStats[$exam->id]['progress'] }}%;"></div>
                        </div>
                        <a href="{{ route('exams.report', $exam->id) }}" class="view-details">View Details</a>
                    </div>
                </div>
            @empty
                <div class="text-center p-5">
                    <i class="fas fa-clipboard-list fa-3x mb-3 text-muted"></i>
                    <h3>No active or completed exams</h3>
                    <p>There are no exams currently active or completed.</p>
                </div>
            @endforelse
        </div>

    </div>
</div>
@endsection
@push('script')

@endpush
