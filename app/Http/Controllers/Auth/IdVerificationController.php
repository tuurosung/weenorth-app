<?php

namespace App\Http\Controllers\Auth;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Services\MessagingService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\VerifyIdRequest;

class IdVerificationController extends Controller
{

    public function __construct(
        private MessagingService $messagingService
    ){}


    /**
     * Handle the incoming request.
     */
    public function __invoke(VerifyIdRequest $request)
    {

        $data = $request->validated();
        $weenorth_id = $data['weenorth_id'];
        $verificationResults = $this->checkIfValidWeenorthID($weenorth_id);

        if (!$verificationResults) {
            return redirect()->back()->withErrors('Invalid Weenorth ID');
        }

        // Perform verification logic here
        $phoneNumber = $verificationResults->contact;

        if (strlen($phoneNumber) == 9) {
            $phoneNumber = sprintf("0%s", $phoneNumber);
        }

        $otp = rand(1000, 9999);

        $message = sprintf(
            "Dear %s, your Weenorth ID has been verified.
            Use this OTP to complete your registration: %s",
            $verificationResults->name,
            $otp
        );

        $this->messagingService->setRecipient($phoneNumber);
        $this->messagingService->setMessage($message);
        $this->messagingService->sendMessage();

        // set a registration session that expires in 5 minutes
        Session::put('weenorth_registration_session', [
            'weenorth_id' => $weenorth_id,
            'name' => $verificationResults->name,
            'otp' => $otp,
            'otp_verification_pending' => true,
            'expires_at' => now()->addMinutes(5)->timestamp
        ]);

        return redirect()->route('signup.registration');
    }


    private function checkIfValidWeenorthID($weenorth_id)
    {
        $verificationResults = Member::where('weenorth_id', $weenorth_id)->first();

        return $verificationResults;
    }
}
