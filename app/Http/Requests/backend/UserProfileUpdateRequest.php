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
        $id = auth()->id();
        return [
            'name' => ['required', 'string', 'max:255'],
<<<<<<< HEAD
            'phone' => ['required', 'min:11'],
            'user_name' => ['required', 'string', 'max:255'],
            'profile_img' => ['mimes:jpeg,png,jpg,gif,svg', 'max:5048'],
=======
            'user_name' => ['required', 'string', 'max:255', "unique:users,user_name,$id"],
            'phone' => ['required', 'max:20', 'min:11'],
            'profile_img' => ['image', 'max:2048'],
            'email' => ['required', 'email', 'max:255', "unique:users,email,$id"],
>>>>>>> d85c75049872ec5223a3cfbc7a60b30c108392e7

        ];
    }
}
