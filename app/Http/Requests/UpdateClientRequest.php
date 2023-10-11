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
        return  [
            'name' =>['required', 'string'],
            'tin' =>['required', 'string'],
            'nid' =>['required', 'string', 'max:13'],
            'circle' =>['required', 'string'],
            'zone' =>['required', 'string'],
            'dob' =>['required', 'date'],
            'phone' =>['nullable', 'string'],
            'taxpayer_status' =>['required', 'string'],
            'special_benefits' =>['nullable', 'string'],
            'father_name' =>['required', 'string'],
            'mother_name' =>['required', 'string'],
            'company_name' =>['required', 'string'],
            'spouse_name' =>['nullable', 'string'],
            'spouse_tin' =>['nullable', 'string', 'max:13'],
            'present_address' =>['required', 'string'],
            'permanent_address' =>['required', 'string'],
            'nature_of_business' =>['required', 'string'],
            'ref_no' =>['required', 'string'],
        ];
    }
}
