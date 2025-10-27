<?php

use Illuminate\Support\Facades\Route;


Route::prefix('community')
    ->name('community.')
    ->group(function () {

        Route::get('/chat', function () {
            return view('app.community.chat');
        })->name('chat');
    });
