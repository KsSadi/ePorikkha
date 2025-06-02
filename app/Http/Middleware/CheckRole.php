<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
   /* public function handle(Request $request, Closure $next, $role): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $roles = is_array($role) ? $role : explode('|', $role);

        foreach ($roles as $role) {
            if (auth()->user()->hasRole($role)) {
                return $next($request);
            }
        }

        return redirect()->route('landing-page')->with('error', 'You do not have permission to access this page.');

    }*/

    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        $user = auth()->user();

        // Check if user has any of the required roles
        if (!in_array($user->role, $roles)) {
            // Redirect to appropriate dashboard based on user role
            return $this->redirectToUserDashboard($user->role);
        }

        return $next($request);
    }

    /**
     * Redirect user to their appropriate dashboard
     */
    private function redirectToUserDashboard($role)
    {
        $dashboards = [
            'admin' => 'admin.dashboard',
            'instructor' => 'instructor.dashboard',
            'evaluator' => 'evaluator.dashboard',
            'student' => 'student.dashboard'
        ];

        $route = $dashboards[$role] ?? 'student.dashboard';

        return redirect()->route($route)->with('error', 'You do not have permission to access that page.');
    }
}
