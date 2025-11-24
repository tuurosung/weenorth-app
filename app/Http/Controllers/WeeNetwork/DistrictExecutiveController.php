<?php

namespace App\Http\Controllers\WeeNetwork;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Executives\DistrictExecutive;

class DistrictExecutiveController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $districtExecutives = DistrictExecutive::all();

        return view('app.the-network.district-executives', compact('districtExecutives'));
    }
}
