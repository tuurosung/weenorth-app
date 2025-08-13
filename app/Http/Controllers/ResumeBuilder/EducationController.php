<?php

namespace App\Http\Controllers\ResumeBuilder;

use App\Http\Controllers\Controller;
use App\Traits\HandleResourceActions;
use App\Models\ResumeBuilder\Education;
use App\Services\Config\LocationService;
use App\Http\Requests\ResumeBuilder\Education\StoreEducationRequest;
use App\Http\Requests\ResumeBuilder\Education\UpdateEducationRequest;

class EducationController extends Controller
{

    use HandleResourceActions;

    public function __construct(
        protected $model = new Education(),
        private $modelName = "Education"
    ) {}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreEducationRequest $request)
    {
       return $this->handleStore($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        $degrees = config('resume.degrees');
        $regions = LocationService::getRegions();
        $cities = LocationService::getCities();

        return view('app.resume-builder.modals.education.edit-education-modal', [
            'education' => $education,
            'degrees' => $degrees,
            'regions' => $regions,
            'cities' => $cities
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEducationRequest $request, Education $education)
    {
        return $this->handleUpdate($request, $education);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        return $this->handleDelete($education);
    }
}
