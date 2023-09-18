<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMapRequest extends FormRequest
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
            'district' => ['string', 'required'],
            'thana' => ['string', 'required'],
            'location' => ['string', 'required'],
            'address' => ['string', 'required'],
            'iframe_link' => ['required', 'string', 'regex:/https:\/\/www\.google\.com\/maps\/embed/i'],
        ];
    }
}
