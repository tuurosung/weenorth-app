<?php

namespace App\Http\Controllers\Members;

use App\Models\Member;
use App\Models\Region;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Districts\DistrictService;

class MakeDistrictExecutiveController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'weenorth_id' => 'required|exists:members,weenorth_id',
            'district_id' => 'required|exists:districts,id',
        ]);

        $member = Member::where('weenorth_id', $data['weenorth_id'])->first();
        $district = District::where('id', $data['district_id'])->first();

        return view('app.districts.modals.make-district-executive', [
            'weenorth_id' => $data['weenorth_id'],
            'district_id' => $data['district_id'],
            'member' => $member,
            'selected_district' => $district,
            'districts' => (new DistrictService())->getDistricts()
        ]);
    }
}
