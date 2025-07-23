<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TradeController;

Route::prefix('trade')
    ->name('trade.')
    ->controller(TradeController::class)
    ->group(function () {

        Route::get('index', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::get('show/{trade}', 'show')->name('show');
        Route::get('edit/{trade}', 'edit')->name('edit');
        Route::patch('update/{trade}', 'update')->name('update');
        Route::delete('destroy/{trade}', 'destroy')->name('delete');

    });
