<?php

namespace App\Http\Requests\ResumeBuilder\Skill;

use Illuminate\Foundation\Http\FormRequest;

class StoreSkillRequest extends FormRequest
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
            'skill_description' => [
                'required',
                'string',
                'max:255'
            ],
            'years_of_experience' => [
                'required',
                'string',
                'min:0'
            ],
            'experience_level' => [
                'required',
                'string',
                'in:' . implode(',', config('resume.experience'))
            ],
        ];
    }
}
