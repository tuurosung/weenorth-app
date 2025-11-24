<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Executives\RegionalExecutive;
use Illuminate\Http\Request;

class StoreRegionalExecutive extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'weenorth_id' => 'required|exists:members,weenorth_id',
            'region_id' => 'required|exists:regions,id',
            'position' => 'required|string|in:' . implode(',', array_keys(config('weenorth.the-network.executive_positions'))),
        ]);


        // check if member is already an executive
        $memberIsExecutive = RegionalExecutive::where('weenorth_id', $data['weenorth_id'])
            ->exists();

        if ($memberIsExecutive) {
            return redirect()->back()
                ->withInput()
                ->withErrors('This member already holds an executive position');
        }

        // check if executive exists
        $positionOccupied = RegionalExecutive::where('region_id', $data['region_id'])
            ->where('position', $data['position'])
            ->exists();

        if ($positionOccupied) {
            return redirect()->back()
                ->withInput()
                ->withErrors('This position is already occupied in the selected region.');
        }

        if (!RegionalExecutive::create($data))
        {
            return redirect()->back()
                ->withInput()
                ->withErrors('Failed to assign Regional Executive. Please try again.');
        }

        return redirect()->back()
            ->with('success', 'Regional Executive assigned successfully.');
    }
}
