<?php

namespace App\Http\Controllers\WeeNetwork;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegionalExecutiveController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('app.the-network.regional-executives');
    }
}
