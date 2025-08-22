<?php

namespace App\Http\Controllers\Districts;

use App\Http\Controllers\Controller;
use App\Services\Districts\DistrictService;
use Illuminate\Http\Request;

class FilterDistrictController extends Controller
{

    public function __construct(
        private $districtService = new DistrictService()
    ){}
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $regionId = $request->input('regionId');

        // return $regionId;

        // Validate the region ID
        if (!is_numeric($regionId)) {
            return response()->json(['error' => 'Invalid region ID'], 400);
        }

        // Fetch districts based on the region ID
        $districts = $this->districtService->getDistrictsByRegion($regionId);

        // convert to array of id => district_name
        $districts = collect($districts)->transform(function ($district) {
            return [
                'id' => $district->id,
                'district_name' => $district->district_name
            ];
        })->toArray();

        // Return the districts as a JSON response
        return response()->json([
            'status' => 'success',
            'districts' => $districts
        ]);
    }
}
