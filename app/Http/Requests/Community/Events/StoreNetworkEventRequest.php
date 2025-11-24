<?php

namespace App\Http\Requests\Community\Events;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreNetworkEventRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
            ],
            'location' => [
                'required',
                'string',
            ],
            'date' => [
                'required',
                'date',
            ],
            'time' => [
                'required',
                'date_format:H:i',
            ],
            'description' => [
                'required',
                'string',
            ],
        ];
    }


    public function eventData(): array
    {
        $data = $this->validated();

        return [
            'event_id' => $this->generateEventId(),
            'title' => $data['title'],
            'location' => $data['location'],
            'date' => $data['date'],
            'time' => $data['time'],
            'description' => $data['description'],
            'created_by_id' => Auth::user()->id
        ];
    }


    private function generateEventId(): string
    {
        $id = '';

        for ($i = 0; $i < 16; $i++) {
            $id .= random_int(0, 9);
        }

        return $id;
    }
}
