<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMemberRequest extends FormRequest
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
        $memberId = $this->route('member')->id;

        return [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['nullable', 'email', Rule::unique('members', 'email')->ignore($memberId)],
            'phone' => ['nullable', 'string', 'max:20'],
            'date_of_birth' => ['nullable', 'date'],
            'gender' => ['nullable', 'in:male,female,other'],
            'cohort' => ['nullable', 'string', 'max:25'],
            'address' => ['nullable', 'string'],
            'region_id' => ['nullable', 'exists:regions,id'],
            'district_id' => ['nullable', 'exists:districts,id'],
            'trade_id' => ['nullable', 'exists:trades,id'],
            'experience_years' => ['nullable', 'integer', 'min:0'],
            'skill_level' => ['nullable', 'in:beginner,intermediate,advanced,expert'],
            'membership_type' => ['required', 'in:individual,corporate,student'],
            'membership_status' => ['required', 'in:active,inactive,suspended,pending'],
            'joined_date' => ['required', 'date'],
            'bio' => ['nullable', 'string'],
        ];
    }
}
