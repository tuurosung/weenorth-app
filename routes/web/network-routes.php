<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Members\MakeRegionalExecutive;
use App\Http\Controllers\Members\StoreDistrictExecutive;
use App\Http\Controllers\Members\StoreRegionalExecutive;
use App\Http\Controllers\WeeNetwork\DistrictExecutiveController;
use App\Http\Controllers\WeeNetwork\RegionalExecutiveController;
use App\Http\Controllers\Members\MakeDistrictExecutiveController;
use App\Http\Controllers\Members\MakeRegionalExecutiveController;
use App\Http\Controllers\Members\StoreDistrictExecutiveController;

Route::prefix('network')
    ->name('network.')
    ->group(function () {

        Route::get('/regional-executives', RegionalExecutiveController::class)->name('regional-executives');
        Route::get('/district-executives', DistrictExecutiveController::class)->name('district-executives');

        Route::get('/make-regional-executive', MakeRegionalExecutiveController::class)->name('make-regional-executive');
        Route::post('/store-regional-executive', StoreRegionalExecutive::class)->name('store-regional-executive');

        Route::get('/make-district-executive', MakeDistrictExecutiveController::class)->name('make-district-executive');
        Route::post('/store-district-executive', StoreDistrictExecutiveController::class)->name('store-district-executive');
    });
