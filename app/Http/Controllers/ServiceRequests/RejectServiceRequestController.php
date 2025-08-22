<?php

namespace App\Http\Controllers\ServiceRequests;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequests\ServiceRequest;
use Illuminate\Http\Request;

class RejectServiceRequestController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ServiceRequest $serviceRequest)
    {
        // ensure serviceRequest is not null
        if (!$serviceRequest) {
            return redirect()->back()->withErrors("Service request not found.");
        }

        // early exit, check if the service request is already rejected
        if ($serviceRequest->status == 'rejected') {
            return redirect()->back()->withErrors("This request is already rejected.");
        }

        if (
            // update the service request status to 'rejected'
            $serviceRequest->update([
                'status' => 'rejected'
            ])
        )
        {
            return redirect()->back()->with('success', "Service request rejected successfully.");
        }

        return redirect()->back()->withErrors("Failed to reject service request.");
    }
}
