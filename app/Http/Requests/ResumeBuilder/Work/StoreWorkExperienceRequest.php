<?php

namespace App\Http\Requests\ResumeBuilder\Work;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkExperienceRequest extends FormRequest
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
            'employment_type' => [
                'required',
                'string',
                'max:255'
            ],
            'job_title' => [
                'required',
                'string',
                'max:255'
            ],
            'company_name' => [
                'required',
                'string',
                'max:255'
            ],
            'start_date' => [
                'required',
                'date'
            ],
            'end_date' => [
                'nullable',
                'date',
                'after_or_equal:start_date'
            ],
            "still_working_here" => [
                'nullable',
                'boolean'
            ],
            'location' => [
                'required',
                'string',
                'max:255'
            ],
            "work_description" => [
                'nullable',
                'string',
            ]
        ];
    }
}
