<?php

namespace App\Http\Requests\Trades;

use App\Models\Trade;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTradeRequest extends FormRequest
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
        $tradeId = request()->route('trade')?->id ?? null;

        return [
            'trade_name' => [
                'required',
                'max:255',
                'string',
                Rule::unique(Trade::class, 'trade_name')
                    ->ignore($tradeId, 'id')
            ],
            'description' => [
                'required',
                'string'
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
            'trade_name.required' => 'The trade name field is required.',
            'trade_name.unique' => 'A trade with this name already exists.',
            'description.required' => 'The description field is required.',
        ];
    }
}
