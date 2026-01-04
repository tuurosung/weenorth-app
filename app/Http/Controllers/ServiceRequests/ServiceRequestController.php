<?php

namespace App\Http\Controllers\ServiceRequests;

use App\Http\Controllers\Controller;
use App\Services\Trades\TradeService;
use App\Traits\HandleResourceActions;
use App\Services\Regions\RegionService;
use App\Services\Config\LocationService;
use App\Services\Districts\DistrictService;
use App\Models\ServiceRequests\ServiceRequest;
use App\Services\ServiceCenters\ServiceCenterService;
use App\Http\Requests\ServiceRequests\StoreServiceRequestRequest;
use App\Http\Requests\ServiceRequests\UpdateServiceRequestRequest;

class ServiceRequestController extends Controller
{

    use HandleResourceActions;

    private $regions;
    private $districts;

    public function __construct(
        protected $model = new ServiceRequest(),
        private $modelName = "Service Request",
        private $regionService = new RegionService(),
        private $districtService = new DistrictService(),
        private $tradeService = new TradeService(),
        private $serviceCenterService = new ServiceCenterService()
    ){
        $this->regions = $this->regionService->getRegionsArray();
        $this->districts = $this->districtService->getDistrictsArray();
        $this->trades = $this->tradeService->getTradesArray();
        $this->serviceCenters = $this->serviceCenterService->getServiceCenters();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceRequests = ServiceRequest::orderBy('created_at', 'desc')
            ->with(['district', 'district.region', 'serviceCenter'])
            ->get();

        return view('app.service-requests.index', [
            'regions' => $this->regions,
            'districts' => $this->districts,
            'trades' => $this->trades,
            'serviceRequests' => $serviceRequests
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
    public function store(StoreServiceRequestRequest $request)
    {
        return $this->handleStore($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceRequest $serviceRequest)
    {
        return view('app.service-requests.show', [
            'serviceRequest' => $serviceRequest
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceRequest $serviceRequest)
    {
        return view('app.service-requests.modals.edit-request', [
            'serviceRequest' => $serviceRequest,
            'regions' => $this->regions,
            'districts' => $this->districts,
            'trades' => $this->trades,
            'serviceCenters' => $this->serviceCenters

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequestRequest $request, ServiceRequest $serviceRequest)
    {
        return $this->handleUpdate($request, $serviceRequest);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceRequest $serviceRequest)
    {
        return $this->handleDelete($serviceRequest);
    }
}
