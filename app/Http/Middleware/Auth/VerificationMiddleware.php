<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class VerificationMiddleware
{
    private const REGISTRATION_SESSION_KEY = 'weenorth_registration_session';
    private const OTP_SESSION_KEY = 'otp_verification_pending';
    private const OTP_VERIFICATION_ROUTE = 'signup.registration';


    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($this->awaitingOtpVerification($request)) {
            return $this->redirectToOtpVerification();
        }

        return $next($request);
    }


    private function awaitingOtpVerification(Request $request): bool
    {
        if (Session::has(self::REGISTRATION_SESSION_KEY)) {

            $sessionData = Session::get(self::REGISTRATION_SESSION_KEY);
            return is_array($sessionData) && isset($sessionData[self::OTP_SESSION_KEY]) && $sessionData[self::OTP_SESSION_KEY] === true;
        }

        return false;
    }

    private function redirectToOtpVerification(): Response
    {
        return redirect()
            ->route(self::OTP_VERIFICATION_ROUTE);
            // ->withErrors(['error' => 'OTP verification is required. Please verify your OTP to proceed.']);
    }
}
