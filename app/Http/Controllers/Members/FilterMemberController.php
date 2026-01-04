<?php

namespace App\Http\Controllers\Members;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Trades\TradeService;
use App\Services\Members\MemberService;
use App\Services\Regions\RegionService;
use App\Services\Districts\DistrictService;

class FilterMemberController extends Controller
{

    public function __construct(
        private MemberService $memberService,
        private RegionService $regionService,
        protected DistrictService $districtService,
        protected TradeService $tradeService,
    ){}


    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $regionId = $request->input('regionId');
        $districtId = $request->input('districtId');
        $tradeId = $request->input('tradeId');

        if ($regionId) {
            $regionName = $this->regionService->getRegionNameById($regionId);
        }

        if ($districtId) {
            $districtName = $this->districtService->getDistrictNameById($districtId);
        }

        if ($tradeId) {
            $tradeName = $this->tradeService->getTradeNameById($tradeId);
        }

        $filteredMembers = $this->memberService->filterMembers($searchTerm, $regionId, $districtId, $tradeId);
        return view('app.members.filtered-members', [
            'members' => $filteredMembers,
            'regionName' => $regionName ?? null,
            'districtName' => $districtName ?? null,
            'tradeName' => $tradeName ?? null,
        ]);
    }
}
