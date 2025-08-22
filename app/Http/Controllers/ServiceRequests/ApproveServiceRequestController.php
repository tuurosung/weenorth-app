<?php

namespace App\Http\Controllers\ServiceRequests;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequests\ServiceRequest;
use Illuminate\Http\Request;

class ApproveServiceRequestController extends Controller
{

    /**
     * Initialize the class with the ServiceRequest model.
     *
     * @param ServiceRequest $serviceRequest
     */
    public function __construct(
        private ServiceRequest $serviceRequest
    ){}



    /**
     * Handle the incoming request.
     */
    public function __invoke(ServiceRequest $serviceRequest)
    {
        // ensure serviceRequest is not null
        if (!$serviceRequest) {
            return redirect()->back()->withErrors("Service request not found.");
        }

        // early exit, check if the service request is already approved
        if ($serviceRequest->status == 'approved') {
            return redirect()->back()->withErrors("This request is already approved.");
        }

        if (
            // trigger the update method on the model
            $serviceRequest->update([
                'status' => 'approved'
            ])
        )
        {
            return redirect()->back()->with('success', "Service request approved successfully.");
        }

        return redirect()->back()->withErrors("Failed to approve service request.");
    }
}
