<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceRequests\ServiceRequestController;
use App\Http\Controllers\ServiceRequests\RejectServiceRequestController;
use App\Http\Controllers\ServiceRequests\ApproveServiceRequestController;


Route::prefix('service-requests')
    ->name('service-requests.')
    ->group(function() {

        Route::controller(ServiceRequestController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{serviceRequest}', 'show')->name('show');
                Route::get('/edit/{serviceRequest}/edit', 'edit')->name('edit');
                Route::patch('/update/{serviceRequest}', 'update')->name('update');
                Route::delete('/delete/{serviceRequest}', 'destroy')->name('destroy');

            });

        Route::patch('/approve/{serviceRequest}', ApproveServiceRequestController::class)->name('approve-request');
        Route::patch('/reject/{serviceRequest}', RejectServiceRequestController::class)->name('reject-request');
    });
