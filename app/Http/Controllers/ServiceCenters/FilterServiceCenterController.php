<?php

namespace App\Http\Controllers\ServiceCenters;

use App\Http\Controllers\Controller;
use App\Services\ServiceCenters\ServiceCenterService;
use Illuminate\Http\Request;

class FilterServiceCenterController extends Controller
{

    public function __construct(
        private $serviceCenterService = new ServiceCenterService()
    ){}


    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $districtId = $request->input('districtId');

        $serviceCenters = $this->serviceCenterService->getServiceCentersByDistrict($districtId);

        return response()->json([
            'status' => 'success',
            'service_centers' => $serviceCenters
        ]);
    }
}
