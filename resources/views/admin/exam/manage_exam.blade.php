
@extends('layouts.main')

@section('pageTitle', 'Manage Exam')
@push('style')
    <style>

        /* Page Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        .page-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        .btn-custom {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
        }
        .btn-primary-custom {
            background-color: var(--primary-color);
            color: white;
        }
        .btn-primary-custom:hover {
            background-color: #4a4adf;
        }

        /* Search and Filter */
        .search-filter-container {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 20px;
            margin-bottom: 30px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .search-box {
            position: relative;
        }
        .search-input {
            width: 100%;
            padding: 12px 20px 12px 45px;
            border: 1px solid #e5e9f2;
            border-radius: 8px;
            font-size: 0.95rem;
        }
        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #777;
        }
        .filter-buttons {
            display: flex;
            gap: 12px;
        }
        .filter-btn {
            padding: 10px 20px;
            border: 1px solid #e5e9f2;
            border-radius: 8px;
            background-color: white;
            color: var(--text-color);
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .filter-btn:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }
        .filter-btn.active {
            background-color: var(--primary-light);
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Featured Exam Card */
        .featured-exam {
            background: linear-gradient(135deg, var(--primary-color) 0%, #7d7df8 100%);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            color: white;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 10px 25px rgba(90, 90, 243, 0.2);
        }
        .featured-exam::before {
            content: '';
            position: absolute;
            top: -30px;
            right: -30px;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            z-index: 0;
        }
        .featured-exam::after {
            content: '';
            position: absolute;
            bottom: -40px;
            left: -40px;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            z-index: 0;
        }
        .featured-content {
            position: relative;
            z-index: 1;
        }
        .featured-badge {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 15px;
            display: inline-block;
        }
        .featured-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .featured-details {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        .featured-detail-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .featured-detail-item i {
            font-size: 0.85rem;
            opacity: 0.8;
        }
        .featured-action {
            padding: 10px 25px;
            background-color: white;
            color: var(--primary-color);
            border-radius: 8px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
            text-decoration: none;
        }
        .featured-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            color: var(--primary-color);
        }
        .featured-illustration {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .featured-icon {
            font-size: 8rem;
            opacity: 0.2;
        }

        /* Modern Card Styles */
        .exam-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .exam-card {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .exam-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .create-exam-card {
            background-color: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            height: 100%;
        }

        .create-exam-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .create-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--primary-light);
            color: var(--primary-color);
            font-size: 24px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .create-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .create-text {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 20px;
        }

        .btn-primary-custom {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .btn-primary-custom:hover {
            background-color: #4a4adf;
        }

        /* Exam card content */
        .subject-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin-bottom: 15px;
        }

        .icon-math {
            background-color: #e0f7fa;
            color: #00acc1;
        }

        .icon-cs {
            background-color: #e8f5e9;
            color: #43a047;
        }

        .status-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .status-active {
            background-color: #e8f5e9;
            color: var(--success-color);
        }

        .status-upcoming {
            background-color: #fff8e1;
            color: var(--warning-color);
        }

        .status-completed {
            background-color: #e3f2fd;
            color: var(--info-color);
        }
        .status-draft {
            background-color: #fce4ec;
            color: var(--danger-color);
        }

        .exam-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .exam-info {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 20px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
            color: #666;
        }

        .stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            margin-top: auto;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.75rem;
            color: #777;
        }

        .card-actions {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 15px;
        }

        .btn-view {
            flex: 1;
            background-color: var(--primary-light);
            color: var(--primary-color);
            border: none;
            padding: 8px 0;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .btn-view:hover {
            background-color: #e1e1ff;
        }

        .btn-edit {
            flex: 1;
            background-color: #f0f0f0;
            color: #555;
            border: none;
            padding: 8px 0;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .btn-edit:hover {
            background-color: #e0e0e0;
        }

        /* Pagination */
        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .pagination {
            display: flex;
            gap: 8px;
        }

        .page-item {
            list-style: none;
        }

        .page-link {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background-color: white;
            color: var(--text-color);
            font-weight: 500;
            text-decoration: none;
            border: 1px solid #e5e9f2;
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




    </style>
    <style>
        .icon-history {
            background-color: #e3f2fd;
            color: #2196f3;
        }
        /* You can add any additional styles here */
        .empty-state {
            text-align: center;
            padding: 40px;
            background: #f8f9fa;
            border-radius: 8px;
            margin: 20px 0;
        }

        .empty-state i {
            font-size: 3rem;
            color: #adb5bd;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            margin-bottom: 10px;
            color: #495057;
        }

        .empty-state p {
            color: #6c757d;
            margin-bottom: 20px;
        }
    </style>
@endpush

@section('content')
    <div class="page-header">
        <h1 class="page-title">Manage Exams</h1>
        <a href="{{ route('admin.exam.create') }}" class="btn-primary-custom" style="text-decoration: none;">
            <i class="fas fa-plus"></i>
            Create New Exam
        </a>
    </div>

    <div class="search-filter-container">
        <form id="searchForm" action="{{ route('admin.manage.exam') }}" method="GET">
            <div class="search-box">
                <i class="fas fa-search search-icon"></i>
                <input type="text" name="search" class="search-input" placeholder="Search exams..." value="{{ request('search') }}">
            </div>
            <input type="hidden" name="filter" id="filterInput" value="{{ $filter ?? 'all' }}">
        </form>

        <div class="filter-buttons">
            <button class="filter-btn {{ ($filter ?? 'all') == 'all' ? 'active' : '' }}" data-filter="all">
                <i class="fas fa-list"></i>
                All
            </button>
            <button class="filter-btn {{ ($filter ?? '') == 'upcoming' ? 'active' : '' }}" data-filter="upcoming">
                <i class="fas fa-clock"></i>
                Upcoming
            </button>
            <button class="filter-btn {{ ($filter ?? '') == 'active' ? 'active' : '' }}" data-filter="active">
                <i class="fas fa-play-circle"></i>
                Active
            </button>
            <button class="filter-btn {{ ($filter ?? '') == 'completed' ? 'active' : '' }}" data-filter="completed">
                <i class="fas fa-check-circle"></i>
                Completed
            </button>
            <button class="filter-btn {{ ($filter ?? '') == 'draft' ? 'active' : '' }}" data-filter="draft">
                <i class="fas fa-file-alt"></i>
                Draft
            </button>
        </div>
    </div>

    @if(isset($featuredExam) && $featuredExam)
        <div class="featured-exam">
            <div class="featured-content">
                <div class="featured-badge">Featured Exam</div>
                <h2 class="featured-title">{{ $featuredExam->title }}</h2>
                <div class="featured-details">
                    <div class="featured-detail-item">
                        <i class="fas fa-calendar-alt"></i>
                        <span>{{ $featuredExam->formatted_date }}</span>
                    </div>
                    <div class="featured-detail-item">
                        <i class="fas fa-clock"></i>
                        <span>{{ $featuredExam->formatted_time }}</span>
                    </div>

                </div>
                <a href="{{ route('admin.exam.show', $featuredExam) }}" class="featured-action">
                    <i class="fas fa-eye"></i>
                    View Details
                </a>
            </div>
            <div class="featured-illustration">
                <i class="{{ $featuredExam->icon_class }} featured-icon"></i>
            </div>
        </div>
    @endif

    <div class="exam-grid">
        <!-- Create New Exam Card -->
        <div class="create-exam-card">
            <div class="create-icon">
                <i class="fas fa-plus"></i>
            </div>
            <h3 class="create-title">Create New Exam</h3>
            <p class="create-text">Set up a new exam with questions, settings, and schedule</p>
            <a href="{{ route('admin.exam.create') }}">
                <button class="btn-primary-custom">Get Started</button>
            </a>
        </div>

        @forelse($exams as $exam)
            <!-- Exam Card -->
            <div class="exam-card">
                <span class="status-badge {{ $exam->status_class }}">{{ $exam->status_text }}</span>
                <div class="subject-icon {{ explode(' ', $exam->icon_class)[0] }}">
                    <i class="{{ implode(' ', array_slice(explode(' ', $exam->icon_class), 1)) }}"></i>
                </div>
                <h3 class="exam-title">{{ $exam->title }}</h3>
                <div class="exam-info">
                    <div class="info-item">
                        <i class="fas fa-calendar-alt"></i>
                        {{ $exam->isActive() ? 'Today' : \Carbon\Carbon::parse($exam->exam_date)->format('j M Y') }} , {{ $exam->isActive() ? 'Now' : \Carbon\Carbon::parse($exam->start_time)->format('h:i A') }}
                    </div>
                    <div class="info-item">
                        <i class="fas fa-clock"></i>
                        <span>{{ $exam->formatted_duration }}</span>
                    </div>
                  {{--  <div class="info-item">
                        <i class="fas fa-user-tie"></i>
                        <span>{{ $exam->creator->name ?? 'Unknown' }}</span>
                    </div>--}}
                </div>
                <div class="stats">
                    <div class="stat-item">
                        <div class="stat-value">{{ $exam->question_count }}</div>
                        <div class="stat-label">{{ Str::plural('Question', $exam->question_count) }}</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">{{ $exam->total_marks }}</div>
                        <div class="stat-label">{{ Str::plural('Mark', $exam->total_marks) }}</div>
                    </div>
                </div>
                <div class="card-actions">
                    <a href="{{ route('admin.exam.show', $exam) }}" class="btn-view" style="text-decoration: none">
                        <i class="fas fa-eye"></i>
                        View Details
                    </a>
                    <a href="{{ route('admin.exam.edit', $exam) }}" class="btn-edit" style="text-decoration: none">
                        <i class="fas fa-edit"></i>
                        Edit
                    </a>
                </div>
            </div>
        @empty
            <!-- Empty State -->
            <div class="empty-state" style="grid-column: span 3;">
                <i class="fas fa-clipboard-list"></i>
                <h3>No Exams Found</h3>
                <p>There are no exams matching your criteria. Try adjusting your search or filters.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="pagination-container">
        {{ $exams->appends(['search' => request('search'), 'filter' => $filter ?? 'all'])->links() }}
    </div>
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle search form submission
            const searchForm = document.getElementById('searchForm');
            const searchInput = document.querySelector('.search-input');

            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    searchForm.submit();
                }
            });

            // Handle filter button clicks
            const filterButtons = document.querySelectorAll('.filter-btn');
            const filterInput = document.getElementById('filterInput');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Update active class
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Update hidden filter input and submit form
                    filterInput.value = this.getAttribute('data-filter');
                    searchForm.submit();
                });
            });
        });
    </script>
@endpush
