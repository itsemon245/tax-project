<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileUpdateRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return null !== auth()->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array {
        $id = auth()->id();

        return [
            'name' => ['string', 'max:255'],
            'user_name' => ['string', 'max:255', "unique:users,user_name,$id"],
            'phone' => ['max:20', 'min:11'],
            'avatar' => ['image', 'max:5120'],
            'email' => ['email', 'max:255', "unique:users,email,$id"],
        ];
    }
}
