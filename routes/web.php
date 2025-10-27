<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('website.index');
});

Route::middleware(['auth', 'verified'])->group(function () {

    require __DIR__ .'/web/dashboard-routes.php';
    require __DIR__.'/web/region-routes.php';
    require __DIR__.'/web/district-routes.php';
    require __DIR__.'/web/service-center-routes.php';
    require __DIR__.'/web/trade-routes.php';
    require __DIR__.'/web/member-routes.php';
    require __DIR__.'/web/resume-routes.php';
    require __DIR__.'/web/service-request-routes.php';
    require __DIR__.'/web/user-routes.php';
    require __DIR__.'/web/network-routes.php';
    require __DIR__.'/web/normalization-routes.php';
    require __DIR__.'/web/member-profile-routes.php';
    require __DIR__.'/web/community-routes.php';

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__ . '/web/signup-routes.php';

Route::get('/kill-session', function () {
    Session::flush();
    return redirect('/');
});
