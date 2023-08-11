<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCaseStudyPageRequest extends FormRequest
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
            'title' => ['required','max:50','string'],
            'page_description' => ['required','max:400','string'],
            'image' => ['required','mimes:png,jpg,jpeg','image'],
            'duration' => ['required'],
            'type' => ['required'],
            'orders' => ['required'],
            'rate' => ['required'],
        ];
    }
}
