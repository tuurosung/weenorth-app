<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('app.dashboard');
 })->name('dashboard');
