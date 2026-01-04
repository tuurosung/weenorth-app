<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RegistrationHandler;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Middleware\Auth\VerificationMiddleware;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\IdVerificationController;

Route::prefix('signup')
    ->name('signup.')
    ->middleware('guest')
    ->group(function () {

        Route::middleware(VerificationMiddleware::class)->group(function () {

            Route::get('/register', SignupController::class)
                ->name('register');

        });

        Route::post('/verifyId', IdVerificationController::class)->name('verifyId');

        Route::middleware(RegistrationHandler::class)
            ->group(function () {

                    Route::get('/registration', function () {
                        return view('auth.registration');
                    })->name('registration');

                    Route::post('/complete-registration', RegistrationController::class)
                        ->name('complete-registration');
        });

});
