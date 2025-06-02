<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        // Check user status
        switch ($user->status) {
            case 'suspended':
                auth()->logout();
                return redirect()->route('login')->with('error', 'Your account has been suspended. Please contact administrator.');

            case 'inactive':
                auth()->logout();
                return redirect()->route('login')->with('error', 'Your account is inactive. Please contact administrator.');

            case 'pending':
                if (!$request->routeIs('account.pending')) {
                    return redirect()->route('account.pending');
                }
                break;

            case 'active':
                // User is active, proceed normally
                break;

            default:
                auth()->logout();
                return redirect()->route('login')->with('error', 'Invalid account status.');
        }

        return $next($request);
    }
}
