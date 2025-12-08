<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class StoreNewUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validatedData = $this->validateData($request);

        try {

            $user = DB::transaction(function () use ($validatedData) {

                return User::create([
                    'name' => $validatedData['name'],
                    'email' => $validatedData['email'],
                    'phone_number' => $validatedData['phone_number'],
                    'access_level' => $validatedData['access_level'],
                    'password' => Hash::make($validatedData['phone_number']), // Default password is phone number
                ]);

                if (!$user) {
                    throw new Exception('User creation failed');
                }


            });


            return redirect()
                ->back()
                ->with('success', 'User created successfully!');


        } catch (Exception $e) {

            Log::warning('Error creating new user', ['error' => $e->getMessage()]);

            return redirect()
                ->back()
                ->withErrors(['error' => 'An error occurred while creating the user. Please try again.']);

        }

    }


    protected function validateData(Request $request)
    {
        return $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users'
            ],
            'phone_number' => [
                'required',
                'string',
                'max:10',
                'unique:users'
            ],
            'access_level' => [
                'required',
            ],
        ]);
    }
}
