<?php

namespace App\Services\Districts;

use App\Models\District;
use App\Models\Region;
use App\Traits\Cacheable;

class DistrictService
{

    use Cacheable;


    /**
     * Create a new class instance.
     */
    public function __construct(
        protected $cacheTag = 'districts'
    )
    {
        //
    }


    /**
     * Get all districts with their associated regions.
     *
     * @return \Illuminate\Support\Collection<int, \stdClass>
     */
    public function getDistricts()
    {
        return $this->rememberCache(
            'all_districts',
            function () {
                return District::with('region')->orderBy('district_name')->get();
            }
        );
    }


    /**
     * Get all districts as an associative array with district IDs as keys and names as values.
     *
     * @return array
     */
    public function getDistrictsArray()
    {
        $districts = $this->getDistricts();

        return $districts->mapWithKeys(fn ($district) => [
            $district->id => $district->district_name
        ])->toArray();
    }


    public function dropCaches()
    {
        $this->forgetCache('all_districts');
        $this->forgetCache('districts_array');
    }
}
