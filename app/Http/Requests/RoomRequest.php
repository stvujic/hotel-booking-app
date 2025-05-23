<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'room_type_id' => 'required|exists:room_types,id',
            'no_beds' => 'required|integer|min:1',
            'total_room' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string',
            'desc' => 'required|string',
            'status' => 'required|boolean',
        ];
    }
}
