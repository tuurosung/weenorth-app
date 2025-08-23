<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\Districts\FilterDistrictController;

Route::prefix('district')
    ->name('district.')
    ->controller(DistrictController::class)
    ->group(function () {

        Route::get('index', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::get('show/{district}', 'show')->name('show');
        Route::get('edit/{district}', 'edit')->name('edit');
        Route::patch('update/{district}', 'update')->name('update');
        Route::delete('destroy/{district}', 'destroy')->name('delete');

    });

Route::get('districts/filter-districts', FilterDistrictController::class)->name('districts.filter-districts');
