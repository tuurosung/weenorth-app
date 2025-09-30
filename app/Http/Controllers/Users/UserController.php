<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Traits\HandleResourceActions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\District;
use App\Services\Districts\DistrictService;

class UserController extends Controller
{
    use HandleResourceActions;


    public function __construct(
        protected $model = new User(),
        private $modelName = 'User',
        private $districtService = new DistrictService()
    ){
        $this->districts = $this->districtService->getDistrictsArray();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('name')->get();

        return view('app.users.index', [
            'users' => $users,
            'districts' => $this->districts
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('app.users.modals.edit-user-modal', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        return $this->handleUpdate($request, $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
