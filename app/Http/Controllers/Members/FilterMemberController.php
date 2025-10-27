<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Services\Members\MemberService;
use Illuminate\Http\Request;

class FilterMemberController extends Controller
{

    public function __construct(
        private MemberService $memberService
    ){}


    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $regionId = $request->input('regionId');
        $districtId = $request->input('districtId');
        $tradeId = $request->input('tradeId');


        $filteredMembers = $this->memberService->filterMembers($regionId, $districtId, $tradeId);
        return view('app.members.filtered-members', [
            'members' => $filteredMembers
        ]);
    }
}
