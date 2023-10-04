<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'book_image' => ['required', 'image'],
            'book_category_id' => ['required'],
            'book_title' => ['required'],
            'author' => ['required'],
            'sample_pdf' => ['mimes:pdf'],
            'pdf' => ['required', 'mimes:pdf'],
            'book_desc' => ['required'],
            'price' => ['required'],
        ];
    }
}
