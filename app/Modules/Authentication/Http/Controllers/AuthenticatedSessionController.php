<?php

namespace App\Modules\Authentication\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Authentication\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('Authentication::login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        // Validate the request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Get authenticated user
            $user = Auth::user();

            // Get redirect URL based on user role
            $redirectUrl = $this->getRedirectUrl($user);

            return response()->json([
                'success' => true,
                'redirect_url' => $redirectUrl,
                'message' => 'Login successful'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'The provided credentials do not match our records.'
        ], 401);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Get redirect URL based on user role
     */
    private function getRedirectUrl($user)
    {
        if ($user->isAdmin()) {
            return route('admin.dashboard');
        } elseif ($user->isOrganizer()) {
            return route('organizer.dashboard');
        } elseif ($user->isEvaluator()) {
            return route('evaluator.dashboard');
        } else {
            return route('participant.dashboard');
        }
    }
}
