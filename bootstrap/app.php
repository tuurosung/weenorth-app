<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Redirect all 404 errors to dashboard
        $exceptions->render(function (Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e, $request) {
            // Only redirect 404s for web requests (not API calls)
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Not Found',
                    'redirect' => route('dashboard')
                ], 404);
            }

            // Redirect to dashboard for web requests
            return redirect()->route('dashboard')
                ->with('info', 'The page you were looking for was not found. You have been redirected to the dashboard.');
        });
    })->create();
