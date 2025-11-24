<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // check if the user is a member
        if (Auth::check() && Auth::user()->access_level == 'member') {

            Session::put('weenorth_id', Auth::user()->weenorth_id);
            Session::put('access_level', Auth::user()->access_level);
            Session::put('name', Auth::user()->name);

            // set sessions for logged in user
            Session::put('active_user_data', [
                'weenorth_id' => Auth::user()->weenorth_id,
                'access_level' => Auth::user()->access_level,
                'name' => Auth::user()->name
            ]);
        }

        // if user is member, redirect to member dashboard
        if (Auth::user()->access_level == 'member') {
            return redirect()->intended(route('member-profile.index', absolute: false));
        }

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
