<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return null !== auth()->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array {
        return [
            'client' => ['bail', 'required', 'exists:clients,id'],
            'issue_date' => ['bail', 'required', 'date'],
            'due_date' => ['bail', 'required', 'date'],
            'reference' => ['bail', 'required', 'string', 'max:255'],
            'item_names' => ['bail', 'required', 'array'],
            'item_names.*' => ['bail', 'required', 'string', 'max:255'],
            'item_descriptions' => ['bail', 'required', 'array'],
            'item_descriptions.*' => ['bail', 'nullable', 'string', 'max:255'],
            'item_rates' => ['bail', 'required', 'array'],
            'item_rates.*' => ['bail', 'required', 'integer'],
            'item_qtys' => ['bail', 'required', 'array'],
            'item_qtys.*' => ['bail', 'required', 'integer', 'min:1'],
            'item_totals' => ['bail', 'required', 'array'],
            'item_totals.*' => ['bail', 'required', 'integer'],
            'tax_rates' => ['bail', 'required', 'array'],
            'tax_rates.*' => ['bail', 'nullable', 'array'],
            'tax_rates.*.*' => ['bail', 'nullable', 'integer'],
            'payment_method' => ['bail', 'nullable', 'string', 'in:cash,bkash,rocket,nagad,card,bank'],
            'payment_note' => ['bail', 'nullable', 'string'],
            'note' => ['bail', 'nullable', 'string'],
            'total' => ['bail', 'required', 'decimal:0'],
            'paid' => ['bail', 'nullable', 'decimal:0'],
            'due' => ['bail', 'required', 'decimal:0'],
            'sub_total' => ['bail', 'required', 'decimal:0'],
            'discount' => ['bail', 'required', 'decimal:0'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array {
        return [
            'total.decimal' => 'The :attribute field must be a number or decimal',
            'paid.decimal' => 'The :attribute field must be a number or decimal',
            'due.decimal' => 'The :attribute field must be a number or decimal',
            'sub_total.decimal' => 'The :attribute field must be a number or decimal',
            'discount.decimal' => 'The :attribute field must be a number or decimal',
        ];
    }
}
