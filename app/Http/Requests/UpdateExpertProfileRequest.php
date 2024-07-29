<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpertProfileRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array {
        return
            [
                'name' => 'required',
                'post' => 'required',
                'description' => 'required',
                'experience' => 'required',
                'join_date' => 'required',
                'availability' => 'required',
                'image' => 'mimes:png,jpg,webp,jpeg|nullable',
            ];
    }
}
