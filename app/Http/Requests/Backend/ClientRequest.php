<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'name' => ['required', 'string'],
            'ref_no' => ['required', 'string'],
            'tin' => ['nullable', 'string'],
            'nid' => ['nullable', 'string', 'max:13'],
            'circle' => ['nullable', 'string'],
            'zone' => ['nullable', 'string'],
            'dob' => ['nullable', 'date'],
            'phone' => ['nullable', 'string'],
            'email' => ['nullable', 'email'],
            'taxpayer_status' => ['nullable', 'string'],
            'special_benefits' => ['nullable', 'string'],
            'father_name' => ['nullable', 'string'],
            'mother_name' => ['nullable', 'string'],
            'company_name' => ['nullable', 'string'],
            'spouse_name' => ['nullable', 'string'],
            'spouse_tin' => ['nullable', 'string', 'max:13'],
            'present_address' => ['nullable', 'string'],
            'permanent_address' => ['nullable', 'string'],
            'nature_of_business' => ['nullable', 'string'],
        ];
    }
}
