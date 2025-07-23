<?php

namespace App\Services\ServiceCenters;

use App\Models\ServiceCenter;
use App\Models\District;

class ServiceCenterService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function getServiceCenters()
    {
        return ServiceCenter::with(['district', 'district.region'])->orderBy('location')->get();
    }

    public static function getDistricts()
    {
        return District::with('region')->orderBy('district_name')->get();
    }
}
