<?php

namespace App\Http\Controllers\Regions;

use App\Http\Controllers\Controller;
use App\Services\Regions\RegionService;
use Illuminate\Http\Request;

class FilterRegionController extends Controller
{

    public function __construct(
        private RegionService $regionService
    ){}


    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // return 
    }
}
