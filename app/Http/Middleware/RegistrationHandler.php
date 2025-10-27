<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class RegistrationHandler
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // if session weenorth_registration_session is set, redirect to registration page
        // if (Session::has('weenorth_registration_session')) {
        //     return redirect()->route('signup.registration');
        // }

        // if the session is not set, redirect to verification page
        // if (!Session::has('weenorth_registration_session')) {
        //     return redirect()->route('register');
        // }

        return $next($request);
    }
}
