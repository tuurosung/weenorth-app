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


    public function getDistrictsByRegion(string $regionId)
    {
        return $this->rememberCache(
            "districts_by_region_{$regionId}",
            function () use ($regionId) {
                return District::where('region_id', $regionId)->orderBy('district_name')->get();
            }
        );
    }


    public function getDistrictNameById(string $districtId): ?string
    {
        $district = District::find($districtId);
        return $district ? $district->district_name : null;
    }


    public function dropCaches()
    {
        $this->forgetCache('all_districts');
        $this->forgetCache('districts_array');
    }
}
