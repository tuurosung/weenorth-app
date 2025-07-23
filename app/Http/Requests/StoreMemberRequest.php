<?php

namespace App\Http\Requests;

use App\Services\Members\MemberService;
use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
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
        return [
            'member_id' => ['sometimes', 'string', 'max:20', 'unique:members,member_id'],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['nullable', 'email', 'unique:members,email'],
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

    protected function prepareForValidation(): void
    {
        // Generate member_id if not provided
        if (!$this->input('member_id')) {
            $memberService = app(MemberService::class);
            $this->merge([
                'member_id' => $memberService->generateMemberId()
            ]);
        }
    }
}
