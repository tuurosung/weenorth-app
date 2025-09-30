<?php

use App\Http\Controllers\WeeNetwork\RegionalExecutiveController;
use Illuminate\Support\Facades\Route;


Route::prefix('network')
    ->name('network.')
    ->group(function () {

        Route::get('/regional-executives', RegionalExecutiveController::class)->name('regional-executives');

    });
