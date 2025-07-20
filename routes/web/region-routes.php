<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;

Route::prefix('region')
    ->name('region.')
    ->controller(RegionController::class)
    ->group(function () {

        Route::get('index', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::get('show/{region}', 'show')->name('show');
        Route::get('edit/{region}', 'edit')->name('edit');
        Route::patch('update/{region}', 'update')->name('update');
        Route::delete('destroy/{region}', 'destroy')->name('delete');

    });
