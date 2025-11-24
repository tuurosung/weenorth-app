<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\RegistrationRequest;

class RegistrationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegistrationRequest $request)
    {
        $data = $request->validated();

        $registration_session = Session::get('weenorth_registration_session');

        // dd($registration_session);/

        $memberId = $registration_session['weenorth_id'];
        // $name = $registration_session['name'];

        $member = Member::where('weenorth_id', $memberId)->first();

        $name = $member->name;
        $phone = $member->contact;


        $createUser =  User::create([
            'name' => $name,
            'email' => $data['email'],
            'phone_number' => $member->contact,
            'access_level' => 'member',
            'password' => Hash::make($data['password']),
        ]);

        if ($createUser) {
            // log user in
            Auth::login($createUser);

            return redirect()->route('member-profile.index');
        }

        return redirect()->back()->withErrors('Failed to create user');
    }
}
