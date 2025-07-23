<?php

namespace App\Http\Controllers;

use App\Http\Requests\Districts\StoreDistrictRequest;
use App\Http\Requests\Districts\UpdateDistrictRequest;
use App\Models\District;
use App\Services\Districts\DistrictService;
use App\Services\Regions\RegionService;
use App\Traits\HandleResourceActions;
use Illuminate\Http\Request;

class DistrictController extends Controller
{

    use HandleResourceActions;

    public function __construct(
        protected $model = new District(),
        private $modelName = "District",
        private $regionService = new RegionService(),
        public $districtService = new DistrictService()
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.districts.index', [
            'districts' => $this->districtService->getDistricts(),
            'regions' => $this->regionService->getRegions()
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
    public function store(StoreDistrictRequest $request)
    {
        $this->districtService->dropCaches(); // Clear caches before storing
        
        return $this->handleStore($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(District $district)
    {
        return view('app.districts.show', [
            'district' => $district->load('region')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(District $district)
    {
        return view('app.districts.modals.edit', [
            'district' => $district,
            'regions' => $this->regionService->getRegions()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDistrictRequest $request, District $district)
    {
        $this->districtService->dropCaches(); // Clear caches before updating

        return $this->handleUpdate($request, $district);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $district)
    {
        $this->districtService->dropCaches(); // Clear caches before deleting

        return $this->handleDelete($district);
    }
}
