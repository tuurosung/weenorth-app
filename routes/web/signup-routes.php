<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\IdVerificationController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Middleware\RegistrationHandler;

Route::prefix('signup')
    ->name('signup.')
    ->middleware('guest')
    ->middleware(RegistrationHandler::class)
    ->group(function () {

    Route::post('/verifyId', IdVerificationController::class)->name('verifyId');

    Route::get('/registration', function () {
        return view('auth.registration');
    })->name('registration');

    Route::post('/complete-registration', RegistrationController::class)->name('complete-registration');
});
