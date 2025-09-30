<?php

namespace App\Http\Controllers\Districts;

use App\Http\Controllers\Controller;
use App\Services\Districts\DistrictService;
use Illuminate\Http\Request;

class FilterDistrictListController extends Controller
{

    public function __construct(
        private DistrictService $districtService
    ){}

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $regionId = $request->input('regionId');

        // validate the region ID
        if (!is_numeric($regionId)) {
            $districts = $this->districtService->getDistricts();
        } else {
            // fetch districts based on the region ID
            $districts = $this->districtService->getDistrictsByRegion($regionId);
        }

        return view('app.districts.filtered-districts', [
            'districts' => $districts
        ]);
    }
}
