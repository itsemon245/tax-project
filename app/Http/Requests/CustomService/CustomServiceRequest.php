<?php

namespace App\Http\Requests\CustomService;

use App\Enums\PageName;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomServiceRequest extends FormRequest {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'page_name' => ['required', Rule::enum(PageName::class)],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'link' => ['required', 'starts_with:https://,http://'],
            'image' => ['sometimes', 'required', 'image', 'max:5124'],
        ];
    }
}
