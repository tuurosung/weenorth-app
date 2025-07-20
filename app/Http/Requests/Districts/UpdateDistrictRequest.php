<?php

namespace App\Http\Requests\Districts;

use App\Models\District;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDistrictRequest extends FormRequest
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
        $district = request()->route('district');
        $districtId = $district ? $district->id : null;

        return [
            'region_id' => [
                'required',
                'integer',
                'exists:regions,id'
            ],
            'district_name' => [
                'required',
                'max:255',
                'string',
                Rule::unique(District::class, 'district_name')
                    ->ignore($districtId, 'id')
            ]
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'region_id.required' => 'Please select a region.',
            'region_id.exists' => 'The selected region does not exist.',
            'district_name.required' => 'District name is required.',
            'district_name.unique' => 'This district name already exists.',
        ];
    }
}
