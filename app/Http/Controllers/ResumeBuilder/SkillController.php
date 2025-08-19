<?php

namespace App\Http\Controllers\ResumeBuilder;

use App\Models\ResumeBuilder\Skill;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResumeBuilder\Skill\StoreSkillRequest;
use App\Http\Requests\ResumeBuilder\Skill\UpdateSkillRequest;
use App\Traits\HandleResourceActions;

class SkillController extends Controller
{

    use HandleResourceActions;

    public function __construct(
        protected $model = new Skill(),
        private $modelName = "Skill"
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
    public function store(StoreSkillRequest $request)
    {
        return $this->handleStore($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return view('app.resume-builder.modals.skill.edit-skill-modal', [
            'skill' => $skill
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        return $this->handleDelete($skill);
    }
}
