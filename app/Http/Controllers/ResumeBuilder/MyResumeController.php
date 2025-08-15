<?php

namespace App\Http\Controllers\ResumeBuilder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Config\CityService;
use Illuminate\Support\Facades\Auth;
use App\Services\Config\RegionService;
use App\Services\Config\LocationService;

class MyResumeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $degrees = config('resume.degrees');
        $regions = LocationService::getRegions();
        $cities = LocationService::getCities();

        $currentUser = Auth::user();

        // dd($currentUser);

        return view('app.resume-builder.my-resume', [
            'degrees' => $degrees,
            'regions' => $regions,
            'cities' => $cities,
            'currentUser' => $currentUser
        ]);
    }
}
