<?php

namespace App\Services\ServiceCenters;

use App\Models\District;
use App\Traits\Cacheable;
use App\Models\ServiceCenter;
use Illuminate\Support\Facades\Log;

class ServiceCenterService
{

    use Cacheable;

    /**
     * Create a new class instance.
     */
    public function __construct(
        protected $cacheTag = 'service_centers',
    )
    {
        //
    }

    public function getServiceCenters()
    {
        return $this->rememberCache(
            'all_service_centers',
            function () {
                return ServiceCenter::with(['district', 'district.region'])
                    ->orderBy('location')
                    ->get();
            }
        );
    }



    public function getServiceCentersByDistrict(string $districtId)
    {

        if (empty($districtId)) {
            Log::warning('No district ID provided for fetching service centers.');
            return null;
        }

        return $this->rememberCache(
            "service_centers_by_district_{$districtId}",
            function () use ($districtId) {

                return ServiceCenter::where('district_id', $districtId)
                    ->with(['district', 'district.region'])
                    ->orderBy('location')
                    ->get();

            }
        );
    }


    public function dropCaches()
    {
        $this->forgetCache('all_service_centers');
    }
}
