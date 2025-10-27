<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\Members\FilterMemberController;

Route::prefix('member')
    ->name('member.')
    ->group(function () {

        Route::controller(MemberController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{member}', 'show')->name('show');
                Route::get('/edit/{member}/edit', 'edit')->name('edit');
                Route::patch('/update/{member}', 'update')->name('update');
                Route::delete('/destroy/{member}', 'destroy')->name('delete');
            });

        Route::get('/filter', FilterMemberController::class)->name('filter');

    });
