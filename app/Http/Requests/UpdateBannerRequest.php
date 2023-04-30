<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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
              // banner from rules
              'title'=>['required','max:255'],
              'sub_title'=>['required','max:255'],
              'button_link'=>['required','max:255'],
              'hero_image'=>['max:5120','image'],
        ];
    }
}
