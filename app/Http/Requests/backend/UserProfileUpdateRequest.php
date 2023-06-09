<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'max:11', 'min:11'],
            'user_name' => ['required', 'string', 'max:255'],
            'profile_img' => ['mimes:jpeg,png,jpg,gif,svg', 'max:5048'],
            'email' => ['required', 'email', 'max:255'],

        ];
    }
}
