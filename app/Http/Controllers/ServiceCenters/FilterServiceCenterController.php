<?php

namespace App\Http\Controllers\ServiceCenters;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\ServiceCenters\ServiceCenterService;

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
