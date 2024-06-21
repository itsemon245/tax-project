<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAchievementRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user' => 'required',
            'total_user' => 'required',
            'image' => 'nullable',
        ];
    }
}
