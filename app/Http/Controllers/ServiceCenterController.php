<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceCenters\StoreServiceCenterRequest;
use App\Http\Requests\ServiceCenters\UpdateServiceCenterRequest;
use App\Models\ServiceCenter;
use App\Services\Districts\DistrictService;
use App\Services\ServiceCenters\ServiceCenterService;
use App\Traits\HandleResourceActions;

class ServiceCenterController extends Controller
{

    use HandleResourceActions;

    public function __construct(
        protected $model = new ServiceCenter(),
        private $modelName = "Service Center",
        public $serviceCenterService = new ServiceCenterService(),
        public $districtService = new DistrictService()
    )
    {}
    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.service-centers.index', [
            'serviceCenters' => $this->serviceCenterService->getServiceCenters(),
            'districts' => $this->districtService->getDistricts()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceCenterRequest $request)
    {
        $this->serviceCenterService->dropCaches(); // Clear cache before storing

        return $this->handleStore($request->validated());
    }


    /**
     * Display the specified resource.
     */
    public function show(ServiceCenter $serviceCenter)
    {
        return view('app.service-centers.show', [
            'serviceCenter' => $serviceCenter->load(['district', 'district.region'])
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceCenter $serviceCenter)
    {
        return view('app.service-centers.modals.edit', [
            'serviceCenter' => $serviceCenter,
            'districts' => $this->districtService->getDistricts()
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceCenterRequest $request, ServiceCenter $serviceCenter)
    {
        $this->serviceCenterService->dropCaches(); // Clear cache before updating

        return $this->handleUpdate($request, $serviceCenter);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceCenter $serviceCenter)
    {
        $this->serviceCenterService->dropCaches(); // Clear cache before deleting

        return $this->handleDelete($serviceCenter);
    }
}
