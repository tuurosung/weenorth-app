<?php

namespace App\Services\Districts;

use App\Models\District;
use App\Models\Region;

class DistrictService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function getDistricts()
    {
        return District::with('region')->orderBy('district_name')->get();
    }

    public static function getRegions()
    {
        return Region::orderBy('region_name')->get();
    }
}
