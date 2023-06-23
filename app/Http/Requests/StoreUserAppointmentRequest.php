<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserAppointmentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'location' => 'sometimes',
            'date' => 'required|date',
            'time' => 'required',
            'name'=> 'required|string|max:255',
            'email'=> 'required|email|max:255',
            'phone'=> 'required|string|max:14',
            'district'=> 'required|string',
            'thana'=> 'required|string',
        ];
    }
}
