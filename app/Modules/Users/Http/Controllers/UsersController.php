<?php

namespace App\Modules\Users\Http\Controllers;

use App\Modules\Authentication\Models\User;
use Illuminate\Http\Request;

class UsersController
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|object
     */
    public function overview(Request $request)
    {
        $statistics = User::getStatistics();
        $institutions = User::getInstitutions();

        $query = User::query();

        // Apply filters
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        if ($request->filled('role')) {
            $query->byRole($request->role);
        }

        if ($request->filled('status')) {
            $query->byStatus($request->status);
        }

        if ($request->filled('institution')) {
            $query->byInstitution($request->institution);
        }

        if ($request->filled('date_range')) {
            $this->applyDateFilter($query, $request->date_range);
        }

        // Apply tab filter
        if ($request->filled('tab') && $request->tab !== 'all') {
            $query->byRole($request->tab);
        }

        $users = $query->latest('last_activity')
            ->paginate(10)
            ->withQueryString();

        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.users.partials.table', compact('users'))->render(),
                'pagination' => view('admin.users.partials.pagination', compact('users'))->render(),
                'statistics' => $statistics
            ]);
        }

        return view('Users::overview', compact('users', 'statistics', 'institutions'));

    }
    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:activate,suspend,delete,send_email',
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id'
        ]);

        $users = User::whereIn('id', $request->user_ids);

        switch ($request->action) {
            case 'activate':
                $users->update(['status' => 'active']);
                $message = 'Users activated successfully';
                break;
            case 'suspend':
                $users->update(['status' => 'suspended']);
                $message = 'Users suspended successfully';
                break;
            case 'delete':
                $users->delete();
                $message = 'Users deleted successfully';
                break;
            case 'send_email':
                // Implement email sending logic
                $message = 'Emails sent successfully';
                break;
        }

        return response()->json(['message' => $message]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:admin,instructor,evaluator,student',
            'institution' => 'nullable|string|max:255',
            'status' => 'required|in:active,pending,suspended,inactive'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'institution' => $request->institution,
            'status' => $request->status,
            'password' => bcrypt('password123'), // Default password
            'last_activity' => now()
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'role' => 'required|in:admin,instructor,evaluator,student',
            'institution' => 'nullable|string|max:255',
            'status' => 'required|in:active,pending,suspended,inactive'
        ]);

        $user->update($request->only(['name', 'email', 'role', 'institution', 'status']));

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }

    private function applyDateFilter($query, $dateRange)
    {
        switch ($dateRange) {
            case 'today':
                $query->whereDate('created_at', today());
                break;
            case 'week':
                $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                break;
            case 'month':
                $query->whereMonth('created_at', now()->month);
                break;
            case 'quarter':
                $query->whereBetween('created_at', [now()->subMonths(3), now()]);
                break;
        }
    }
    public function show(User $user)
    {
        return response()->json($user);
    }
}
