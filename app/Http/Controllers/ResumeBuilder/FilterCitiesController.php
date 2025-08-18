<?php

namespace App\Http\Controllers\ResumeBuilder;

use App\Http\Controllers\Controller;
use App\Services\Config\CityService;
use App\Services\Config\LocationService;
use Illuminate\Http\Request;

class FilterCitiesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return response()->json([
            'status' => 'success',
            'cities' => LocationService::getCitiesByRegion($request->input('region'))
        ]);
    }
}
