<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResumeBuilder\BioController;
use App\Http\Controllers\ResumeBuilder\SkillController;
use App\Http\Controllers\ResumeBuilder\MyResumeController;
use App\Http\Controllers\ResumeBuilder\EducationController;
use App\Http\Controllers\ResumeBuilder\FilterCitiesController;
use App\Http\Controllers\ResumeBuilder\PrintResumeController;
use App\Http\Controllers\ResumeBuilder\WorkExperienceController;

Route::prefix('resume-builder')
    ->name('resume-builder.')
    ->group(function () {

        Route::get('/', MyResumeController::class)->name('my-resume');
        Route::get('/print', PrintResumeController::class)->name('print');

        Route::get('/filterCities', FilterCitiesController::class)->name('filter-cities');

        Route::prefix('bio')
            ->name('bio.')
            ->controller(BioController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::patch('/edit/{bio}', 'update')->name('update');
                Route::delete('/delete/{bio}', 'destroy')->name('delete');

            });


        Route::prefix('education')
            ->name('education.')
            ->controller(EducationController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::get('/edit/{education}', 'edit')->name('edit');
                Route::patch('/{education}', 'update')->name('update');
                Route::delete('/{education}', 'destroy')->name('delete');

            });


        Route::prefix('work-experience')
            ->name('work-experience.')
            ->controller(WorkExperienceController::class)
            ->group(function () {

                Route::get('/', 'index');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{workExperience}', 'edit')->name('edit');
                Route::patch('/update/{workExperience}', 'update')->name('update');
                Route::delete('/delete/{workExperience}', 'destroy')->name('delete');

            });


        Route::prefix('skills')
            ->name('skills.')
            ->controller(SkillController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{skill}', 'edit')->name('edit');
                Route::patch('/update/{skill}', 'update')->name('update');
                Route::delete('/delete/{skill}', 'destroy')->name('delete');

            });

    });
