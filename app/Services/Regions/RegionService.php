<?php

namespace App\Services\Regions;

use App\Models\Region;
use App\Traits\Cacheable;

class RegionService
{
    use Cacheable;

    /**
     * Create a new class instance.
     */
    public function __construct(
        protected $cacheTag = 'regions'
    )
    {
        //
    }



    /**
     * Get all regions with their district counts.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRegions()
    {
        return $this->rememberCache(
            'all_regions',
            function () {
                return Region::withCount('districts')->orderBy('region_name')->get();
            }
        );
    }


    /**
     * Get all regions as an associative array with region IDs as keys and names as values.
     *
     * @return array
     */
    public function getRegionsArray()
    {
        $regions = $this->getRegions();

        return $regions->mapWithKeys(fn ($region) => [
            $region->id => $region->region_name
        ])->toArray();
    }


    public function filterRegions()
    {
        $searchTerm = request('q');

        // clean the search term to prevent SQL injection
        $searchTerm = preg_replace('/[^a-zA-Z0-9\s]/', '', $searchTerm);

        return Region::whereLike('region_name', '%'.$searchTerm.'%')
            ->orderBy('region_name')
            ->get();
    }



    /**
     * Drop caches related to regions.
     * This method is used to clear cached data when regions are updated or deleted.
     * @return void
     */
    public function dropCaches()
    {
        $this->forgetCache('all_regions');
        $this->forgetCache('regions');
    }
}
