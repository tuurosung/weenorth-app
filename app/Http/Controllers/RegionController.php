<?php

namespace App\Http\Controllers;

use App\Http\Requests\Regions\StoreRegionRequest;
use App\Models\Region;
use App\Services\Regions\RegionService;
use App\Traits\HandleResourceActions;
use Illuminate\Http\Request;

class RegionController extends Controller
{

    use HandleResourceActions;

    public function __construct(
        protected $model = new Region(),
        private $modelName = "Region",
        public $regionService = new RegionService()
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.regions.index', [
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
    public function store(StoreRegionRequest $request)
    {
        return $this->handleStore($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region)
    {
        return view('app.regions.modals.edit', [
            'region' => $region
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRegionRequest $request, Region $region)
    {
        return $this->handleUpdate($request, $region);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        return $this->handleDelete($region);
    }
}
