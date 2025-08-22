<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequestRequest extends FormRequest
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
            'client_name' => [
                'required',
                'string',
                'max:255'
            ],
            'client_email' => [
                'required',
                'string',
                'email',
                'max:255'
            ],
            'client_phone' => [
                'required',
                'string',
                'max:20'
            ],
            'region_id' => [
                'required',
                'integer',
                'exists:regions,id'
            ],
            'district_id' => [
                'required',
                'integer',
                'exists:districts,id'
            ],
            'service_center_id' => [
                'required',
                'integer',
                'exists:service_centers,id'
            ],
            'trade_id' => [
                'required',
                'integer',
                'exists:trades,id'
            ],
            'description' => [
                'required',
                'string',
            ]
        ];
    }
}
