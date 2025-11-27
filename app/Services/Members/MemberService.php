<?php

namespace App\Services\Members;

use App\Models\Trade;
use App\Models\Member;
use App\Models\Region;
use App\Models\District;
use App\Traits\Cacheable;
use App\Services\Trades\TradeService;
use App\Services\Regions\RegionService;
use App\Services\Districts\DistrictService;

class MemberService
{
    use Cacheable;

    /**
     * Create a new class instance.
     */
    public function __construct(
        protected $cacheTag = 'members',
        private $regionService = new RegionService(),
        private $districtService = new DistrictService(),
        private $tradeService = new TradeService()
    )
    {
        //
    }


    /**
     * Get all members with their associated regions, districts, and trades.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getMembers()
    {
        // return $this->rememberCache(
        //     'all_members',
        //     function () {
        //         return Member::with(['region', 'district', 'trade'])
        //             ->orderBy('last_name')
        //             ->orderBy('first_name')
        //             ->get();
        //     }
        // );
        return Member::query()
            ->orderBy('last_name')
            ->orderBy('first_name')
            ->limit(100)
            ->get();
    }


    /**
     * Generate a new member ID.
     *
     * @return string
     */
    public function generateMemberId(): string
    {
        $lastMember = Member::orderBy('id', 'desc')->first();
        $nextNumber = $lastMember ? (int) substr($lastMember->member_id, 3) + 1 : 1;
        return 'MEM' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }


    public function formData()
    {
        return [
            'regions' => $this->regionService->getRegionsArray(),
            'districts' => $this->districtService->getDistrictsArray(),
            'trades' => $this->tradeService->getTradesArray()
        ];
    }


    public function filterMembers($searchTerm, $regionId, $districtId, $tradeId)
    {
        $baseQuery = Member::query();

        if ($searchTerm) {
            $baseQuery->where(function ($query) use ($searchTerm) {
                $query->where('first_name', 'like', '%' . $searchTerm . '%')
                      ->orWhere('last_name', 'like', '%' . $searchTerm . '%')
                      ->orWhere('email', 'like', '%' . $searchTerm . '%')
                      ->orWhere('contact', 'like', '%' . $searchTerm . '%')
                      ->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }
        $baseQuery->when($regionId, function ($query) use ($regionId) {
            return $query->where('region_id', $regionId);
        });

        $baseQuery->when($districtId, function ($query) use ($districtId) {
            return $query->where('district_id', $districtId);
        });

        $baseQuery->when($tradeId, function ($query) use ($tradeId) {
            return $query->where('trade_id', $tradeId);
        });

        return $baseQuery->orderBy('last_name')
            ->orderBy('first_name')
            ->get();
    }


    public function dropCaches()
    {
        $this->forgetCache('all_members');
    }
}
