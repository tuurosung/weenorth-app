<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class RegistrationHandler
{
    private const SESSION_KEY = 'weenorth_registration_session';
    private const REGISTRATION_ROUTE = 'register';

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$this->hasValidRegistrationSession()) {

            Log::warning('Registration session validation failed', [
                'ip' => $request->ip(),
                'url' => $request->fullUrl(),
            ]);

            return $this->redirectToRegistrationStart();
        }

        return $next($request);
    }

    /**
     * Check if a valid registration session exists.
     */
    private function hasValidRegistrationSession(): bool
    {
        if (!Session::has(self::SESSION_KEY)) {
            return false;
        }

        $sessionData = Session::get(self::SESSION_KEY);

        return is_array($sessionData) && isset($sessionData['weenorth_id']);
    }

    /**
     * Redirect to registration start with error message.
     */
    private function redirectToRegistrationStart(): Response
    {
        return redirect()
            ->route(self::REGISTRATION_ROUTE)
            ->withErrors(['error' => 'Registration session has expired. Please start the registration process again.']);
    }
}
