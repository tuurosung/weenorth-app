<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

Route::prefix('member')
    ->name('member.')
    ->controller(MemberController::class)
    ->group(function () {

        Route::get('index', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::get('show/{member}', 'show')->name('show');
        Route::get('edit/{member}', 'edit')->name('edit');
        Route::patch('update/{member}', 'update')->name('update');
        Route::delete('destroy/{member}', 'destroy')->name('delete');

    });
