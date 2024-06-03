<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpertProfileRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name"          => 'required',
            "post"          => 'required',
            "description"   => 'required',
            "experience"    => 'required',
            "join_date"     => 'required',
            "availability"  => 'required',
            "image"         => 'required|image',
        ];
    }
}
