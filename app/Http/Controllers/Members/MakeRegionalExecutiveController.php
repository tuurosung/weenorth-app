<?php

namespace App\Http\Controllers\Members;

use App\Models\Member;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Members\MemberService;
use App\Services\Regions\RegionService;

class MakeRegionalExecutiveController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'weenorth_id' => 'required|exists:members,weenorth_id',
            'region_id' => 'required|exists:regions,id',
        ]);

        $member = Member::where('weenorth_id', $data['weenorth_id'])->first();
        $region = Region::where('id', $data['region_id'])->first();

        return view('app.regions.modals.make-executive', [
            'weenorth_id' => $data['weenorth_id'],
            'region_id' => $data['region_id'],
            'member' => $member,
            'selected_region' => $region,
            'regions' => (new RegionService())->getRegions()
        ]);
    }
}
