<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // if (!Session::has('weenorth_registration_session')) {
        //     return redirect()->back()->withErrors(['Registration session has expired. Please start the registration process again.']);
        // }

        $registrationSession = Session::get('weenorth_registration_session');
        $otp = $registrationSession['otp'];


        return [
            'email' => [
                'required',
                'email',
                Rule::unique(User::class)
            ],
            'password' => [
                'required',
                'confirmed:confirm_password',
                'min:8',
            ],
            'otp' => [
                'required',
                function ($attribute, $value, $fail) use ($otp) {
                    if ((int) $value !== $otp) {
                        $fail('Invalid OTP');
                    }
                }
            ]
        ];
    }
}
