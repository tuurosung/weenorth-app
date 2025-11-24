<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Traits\HandleResourceActions;
use App\Models\Community\NetworkEvent;
use App\Services\Community\NetworkEventService;
use App\Http\Requests\UpdateNetworkEventRequest;
use App\Http\Requests\Community\Events\StoreNetworkEventRequest;

class NetworkEventController extends Controller
{

    use HandleResourceActions;

    public function __construct(
        private $model = new NetworkEvent(),
        private $modelName = "Network Event"
    ){}



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.community.events.index', [
            'networkEvents' => NetworkEventService::getUpcomingEvents()
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
    public function store(StoreNetworkEventRequest $request)
    {
        return $this->handleStore($request->eventData());
    }

    /**
     * Display the specified resource.
     */
    public function show(NetworkEvent $networkEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NetworkEvent $networkEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNetworkEventRequest $request, NetworkEvent $networkEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NetworkEvent $networkEvent)
    {
        //
    }
}
