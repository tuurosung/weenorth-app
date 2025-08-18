<?php

namespace App\Http\Controllers\ResumeBuilder;

use App\Http\Controllers\Controller;
use App\Models\ResumeBuilder\WorkExperience;
use App\Http\Requests\ResumeBuilder\Work\StoreWorkExperienceRequest;
use App\Http\Requests\ResumeBuilder\Work\UpdateWorkExperienceRequest;
use App\Traits\HandleResourceActions;

class WorkExperienceController extends Controller
{

    use HandleResourceActions;

    public function __construct(
        protected $model = new WorkExperience(),
        private $modelName = "Work Experience",
    ){}


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
    public function store(StoreWorkExperienceRequest $request)
    {
        return $this->handleStore($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkExperience $workExperience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkExperience $workExperience)
    {
        return view('app.resume-builder.modals.work.edit-work-experience-modal', [
            'workExperience' => $workExperience
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkExperienceRequest $request, WorkExperience $workExperience)
    {
        return $this->handleUpdate($request, $workExperience);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkExperience $workExperience)
    {
        return $this->handleDelete($workExperience);
    }
}
