<?php

use App\Http\Controllers\Members\MemberProfileController;
use Illuminate\Support\Facades\Route;


Route::prefix('member-profile')
    ->name('member-profile.')
    ->group(function () {

        Route::get('/', MemberProfileController::class)->name('index');

    });
