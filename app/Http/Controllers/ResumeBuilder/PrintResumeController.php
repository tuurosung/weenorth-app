<?php

namespace App\Http\Controllers\ResumeBuilder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PrintResumeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $currentUser = Auth::user();
        return view('app.resume-builder.print-cv', [
            'currentUser' => $currentUser
        ]);
    }
}
