<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user() != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'client_name' => ['required'],
            'father_name' => ['required'],
            'mother_name' => ['required'],
            'company_name' => ['required'],
            'husband_wife_name' => ['required'],
            'present_address' => ['required'],
            'phone' => ['required'],
            'tin' => ['required'],
            'circle' => ['required'],
            'parmentat_address' => ['required'],
            'zone' => ['required'],
        ];
    }
}
