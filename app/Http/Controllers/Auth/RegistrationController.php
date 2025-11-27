<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Member;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\RegistrationRequest;
use Illuminate\Http\RedirectResponse;

class RegistrationController extends Controller
{
    private const SESSION_KEY = 'weenorth_registration_session';

    /**
     * Handle user registration request.
     */
    public function __invoke(RegistrationRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $registrationSession = Session::get(self::SESSION_KEY);

        if (!$registrationSession || !isset($registrationSession['weenorth_id'])) {
            Log::warning('Registration attempted without valid session');
            return redirect()->back()->withErrors(['error' => 'Invalid registration session. Please start the registration process again.']);
        }

        $member = Member::where('weenorth_id', $registrationSession['weenorth_id'])->first();

        if (!$member) {
            Log::error('Member not found during registration', ['weenorth_id' => $registrationSession['weenorth_id']]);
            return redirect()->back()->withErrors(['error' => 'Member information not found. Please contact support.']);
        }

        try {

            $user = DB::transaction(function () use ($validatedData, $member) {
                return User::create([
                    'name' => $member->name,
                    'email' => $validatedData['email'],
                    'phone_number' => $member->contact,
                    'access_level' => 'member',
                    'password' => Hash::make($validatedData['password']),
                    'weenorth_id' => $member->weenorth_id ?? null,
                ]);
            });

            Auth::login($user);
            Session::forget(self::SESSION_KEY);

            Log::info('User registered successfully', ['user_id' => $user->id, 'email' => $user->email]);

            return redirect()->route('member-profile.index')->with('success', 'Registration successful!');

        } catch (\Exception $e) {

            Log::error('User registration failed', [
                'email' => $validatedData['email'],
                'error' => $e->getMessage()
            ]);

            return redirect()->back()->withErrors(['error' => 'Registration failed. Please try again.']);
        }
    }
}
