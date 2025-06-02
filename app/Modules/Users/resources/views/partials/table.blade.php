<table class="users-table">
    <thead>
        <tr>
            <th>
                <input type="checkbox" id="selectAll">
            </th>
            <th>User</th>
            <th>Role</th>
            <th>Institution</th>
            <th>Status</th>
            <th>Points</th>
            <th>Last Activity</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
@forelse($users as $user)
    <tr>
        <td>
            <input type="checkbox" class="user-checkbox" data-user-id="{{ $user->id }}">
        </td>
        <td>
            <div class="user-info">
                <div class="user-avatar-table">{{ $user->avatar }}</div>
                <div class="user-details">
                    <div class="user-name-table">{{ $user->name }}</div>
                    <div class="user-email">{{ $user->email }}</div>
                </div>
            </div>
        </td>
        <td>
                    <span class="user-role-badge {{ $user->role_badge_color }}">
                        {{ ucfirst($user->role) }}
                    </span>
        </td>
        <td>{{ $user->institution ?? 'N/A' }}</td>
        <td>
                    <span class="status-badge {{ $user->status_badge_color }}">
                        {{ ucfirst($user->status) }}
                    </span>
        </td>
        <td>
            @if($user->role === 'admin')
                ∞
            @else
                {{ number_format($user->points) }}
            @endif
        </td>
        <td>{{ $user->last_activity_formatted }}</td>
        <td>
            <div class="action-buttons">
                <button class="action-btn view" title="View Profile" data-user-id="{{ $user->id }}">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="action-btn edit" title="Edit User" data-user-id="{{ $user->id }}"
                        data-bs-toggle="modal" data-bs-target="#userModal">
                    <i class="fas fa-edit"></i>
                </button>
                @if($user->role !== 'admin')
                    <button class="action-btn delete" title="Delete User" data-user-id="{{ $user->id }}">
                        <i class="fas fa-trash"></i>
                    </button>
                @endif
            </div>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="8" class="text-center py-4">
            <div class="empty-state">
                <i class="fas fa-users fa-3x text-muted mb-3"></i>
                <h5>No users found</h5>
                <p class="text-muted">Try adjusting your filters or search criteria.</p>
            </div>
        </td>
    </tr>
    @endforelse
    </tbody>
    </table>

    @if($users->hasPages())
        <div class="pagination-container">
            <div class="pagination-info">
                Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} users
            </div>
            <div class="pagination-controls">
                {{-- Previous Page Link --}}
                @if ($users->onFirstPage())
                    <button class="pagination-btn disabled">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                @else
                    <button class="pagination-btn" onclick="loadPage({{ $users->currentPage() - 1 }})">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                    @if ($page == $users->currentPage())
                        <button class="pagination-btn active">{{ $page }}</button>
                    @else
                        <button class="pagination-btn" onclick="loadPage({{ $page }})">{{ $page }}</button>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($users->hasMorePages())
                    <button class="pagination-btn" onclick="loadPage({{ $users->currentPage() + 1 }})">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                @else
                    <button class="pagination-btn disabled">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                @endif
            </div>
        </div>

        <script>
            function loadPage(page) {
                const currentUrl = new URL(window.location.href);
                currentUrl.searchParams.set('page', page);

                fetch(currentUrl.toString(), {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('usersTableContent').innerHTML = data.html;
                        window.history.pushState({}, '', currentUrl.toString());
                    })
                    .catch(error => console.error('Error loading page:', error));
            }
        </script>
    @endif
