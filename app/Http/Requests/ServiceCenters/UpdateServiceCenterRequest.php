<?php

namespace App\Http\Requests\ServiceCenters;

use App\Models\ServiceCenter;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceCenterRequest extends FormRequest
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
        $serviceCenterId = request()->route('service_center')?->id ?? null;

        return [
            'district_id' => [
                'required',
                'integer',
                'exists:districts,id'
            ],
            'location' => [
                'required',
                'max:255',
                'string',
                Rule::unique(ServiceCenter::class, 'location')
                    ->ignore($serviceCenterId, 'id')
            ],
            'town_city' => [
                'required',
                'max:255',
                'string'
            ],
            'address' => [
                'required',
                'string'
            ],
            'email' => [
                'nullable',
                'email',
                'max:255'
            ],
            'phone_number' => [
                'nullable',
                'string',
                'max:20'
            ],
            'center_representative' => [
                'nullable',
                'string',
                'max:255'
            ],
            'opening_hours' => [
                'nullable',
                'string',
                'max:255'
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
            'district_id.required' => 'Please select a district.',
            'district_id.exists' => 'The selected district is invalid.',
            'location.required' => 'The location field is required.',
            'location.unique' => 'A service center with this location already exists.',
            'town_city.required' => 'The town/city field is required.',
            'address.required' => 'The address field is required.',
            'email.email' => 'Please enter a valid email address.',
        ];
    }
}
