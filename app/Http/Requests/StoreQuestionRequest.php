<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "question"      => "required",
            "mark"          => "required",
            "option1"       => "required",
            "option2"       => "required",
            "option3"       => "required",
            "option4"       => "required",
            "currect_ans"   => "required",
        ];
    }
}
