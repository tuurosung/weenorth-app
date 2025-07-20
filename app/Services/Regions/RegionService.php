<?php

namespace App\Services\Regions;

use App\Models\Region;

class RegionService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public static function getRegions()
    {
        return Region::withCount('districts')->orderBy('region_name')->get();
    }
}
