<?php

namespace App\Http\Controllers\Members;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Executives\DistrictExecutive;

class StoreDistrictExecutiveController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'weenorth_id' => 'required|exists:members,weenorth_id',
            'district_id' => 'required|exists:districts,id',
            'position' => 'required|string|in:' . implode(',', array_keys(config('weenorth.the-network.executive_positions'))),
        ]);


        // check if member is already an executive
        $memberIsExecutive = DistrictExecutive::where('weenorth_id', $data['weenorth_id'])
            ->exists();

        if ($memberIsExecutive) {
            return redirect()->back()
                ->withInput()
                ->withErrors('This member already holds an executive position');
        }

        // check if executive exists
        $positionOccupied = DistrictExecutive::where('district_id', $data['district_id'])
            ->where('position', $data['position'])
            ->exists();

        if ($positionOccupied) {
            return redirect()->back()
                ->withInput()
                ->withErrors('This position is already occupied in the selected district.');
        }

        if (!DistrictExecutive::create($data)) {
            return redirect()->back()
                ->withInput()
                ->withErrors('Failed to assign District Executive. Please try again.');
        }

        return redirect()->back()
            ->with('success', 'District Executive assigned successfully.');
    }
}
