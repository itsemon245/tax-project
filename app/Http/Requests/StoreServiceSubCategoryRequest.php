<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceSubCategoryRequest extends FormRequest
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
        return[
            'category' => ['required'],
            'service_sub_category' => ['string', 'required', 'max:20', 'unique:service_sub_categories,name'],
            'image' => ['required'],
            'description' => ['string','required', 'max:500'],
        ];
    }
}
