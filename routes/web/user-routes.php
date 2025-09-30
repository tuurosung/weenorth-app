<?php

use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('user')
    ->name('users.')
    ->group(function() {

        Route::controller(UserController::class)
            ->group(function() {

                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{user}', 'show')->name('show');
                Route::get('/edit/{user}/edit', 'edit')->name('edit');
                Route::patch('/update/{user}', 'update')->name('update');
                Route::delete('/destroy/{user}', 'destroy')->name('delete');

            });

    });
