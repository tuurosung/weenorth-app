<?php

namespace App\Services\Community;

use App\Models\Community\NetworkEvent;
use Illuminate\Database\Eloquent\Collection;

class NetworkEventService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    /**
     * Return the list of upcoming events
     *
     * @return Collection
     */
    public static function getUpcomingEvents(): Collection
    {
        return NetworkEvent::upcomingEvents()->get();
    }
}
