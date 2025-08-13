<?php

namespace App\Http\Controllers\ResumeBuilder;

use App\Models\ResumeBuilder\Bio;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\HandleResourceActions;
use App\Http\Requests\ResumeBuilder\Bio\StoreBioRequest;
use App\Http\Requests\ResumeBuilder\Bio\UpdateBioRequest;

class BioController extends Controller
{

    use HandleResourceActions;

    public function __construct(
        protected $model = new Bio(),
        private $modelName = 'Personal Information'
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
    public function store(StoreBioRequest $request)
    {
        $data = $request->validated();

        if (Bio::updateOrCreate(
            ['user_id' => Auth::user()->id],
        $data))
        {
            return redirect()->back()->with('success', "Successfully updated {$this->modelName}");
        } else {
            return redirect()->back()->withErrors("Failed to update {$this->modelName}");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bio $bio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bio $bio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBioRequest $request, Bio $bio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bio $bio)
    {
        //
    }
}
