<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceCenterController;
use App\Http\Controllers\ServiceCenters\FilterServiceCenterController;

Route::prefix('service-center')
    ->name('service-center.')
    ->controller(ServiceCenterController::class)
    ->group(function () {

        Route::get('index', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::get('show/{serviceCenter}', 'show')->name('show');
        Route::get('edit/{serviceCenter}', 'edit')->name('edit');
        Route::patch('update/{serviceCenter}', 'update')->name('update');
        Route::delete('destroy/{serviceCenter}', 'destroy')->name('delete');

    });


Route::get('service-centers/filter-service-centers', FilterServiceCenterController::class)->name('service-centers.filter-service-centers');
