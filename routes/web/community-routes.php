<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Community\NetworkEventController;


Route::prefix('community')
    ->name('community.')
    ->group(function () {


        Route::get('/chat', function () {
            return view('app.community.chat');
        })->name('chat');


        Route::prefix('events')
            ->name('events.')
            ->controller(NetworkEventController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::get('/{networkEvent}', 'show')->name('show');
                Route::get('/edit/{networkEvent}', 'edit')->name('edit');
                Route::patch('/update/{networkEvent}', 'update')->name('update');
                Route::delete('/delete/{networkEvent}', 'destroy')->name('delete');

            });
    });
