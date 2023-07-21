<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            "name" => "required|max:255",
            "price" => "required",
            // "page_banner" => "required|file|image|max:5120",
            "page_title" => "required|max:255",
            "description" => "required",
            "page_card_titles" => "required",
            "page_card_descriptions" => "required",
            "learn_more_description" => "required",
            // "learn_more_images" => "required|array",
            "preview" => "required|max:255",
        ];
    }
}
