<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartnerSectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'required'],
            'designation' => ['string', 'required'],
            'email' => ['required','email', 'unique:partner_sections,email'],
            'phone' => ['required'],
            'facebook' => ['url','regex:/http(?:s):\/\/(?:www\.)facebook\.com\/.+/i'],
            // 'twitter' => ['url','regex:/((https?):\/\/)?(www.)?twitter\.com(\/@?(\w){1,15})\/status\/[0-9]{19}\?/'],
            'linkedin' => ['url','regex:/http(?:s):\/\/(?:www\.)linkedin\.com\/.+/i'],
        ];
    }
}
