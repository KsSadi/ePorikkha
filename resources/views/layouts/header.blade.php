<div class="dashboard-header">
    <div class="header-left">
        <div class="logo">
            <i class="fas fa-graduation-cap logo-icon"></i>
            <span>ePorikkha </span>
        </div>
        @if (Auth::user()->role == 'admin')

            <nav class="nav-menu">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>

                <a href="{{ route('admin.manage.exam') }}"
                   class="nav-link {{ request()->is('admin/exam*') ? 'active' : '' }}">
                    Manage Exam
                </a>

                <a href="{{ route('admin.manage.student') }}"
                   class="nav-link {{ request()->is('admin/student*') ? 'active' : '' }}">
                    Students
                </a>

               {{-- <a href="{{ route('admin.dashboard') }}"
                   class="nav-link {{ request()->is('admin/leaderboard*') ? 'active' : '' }}">
                    Leaderboard
                </a>--}}
            </nav>

        @endif
    </div>
    <div class="header-right">
        @if (Auth::user()->role == 'admin')
        <div class="user-info">
            <div class="user-avatar" id="adminAvatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div>
                <div class="user-name" id="adminName">{{ Auth::user()->name }}</div>
                @if (Auth::user()->role == 'admin')
                <div class="user-role">Admin</div>
                @elseif(Auth::user()->role == 'user')
                <div class="user-role">Student</div>
                @endif
            </div>
        </div>
        @endif
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="header-action logout-btn" id="logoutBtn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>

    </div>
</div>
