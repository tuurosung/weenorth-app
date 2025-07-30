<?php

namespace App\Services\ServiceCenters;

use App\Models\ServiceCenter;
use App\Models\District;
use App\Traits\Cacheable;

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


    public function dropCaches()
    {
        $this->forgetCache('all_service_centers');
    }
}
