<?php

namespace App\Http\Requests\Regions;

use App\Models\Region;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRegionRequest extends FormRequest
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
        $regionId = request()->route('region')?->id ?? null;

        return [
            'region_name' => [
                'required',
                'max:255',
                'string',
                Rule::unique(Region::class, 'region_name')
                    ->ignore($regionId, 'id')
            ]
        ];
    }
}
