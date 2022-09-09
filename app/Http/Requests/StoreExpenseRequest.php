<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'date' => ['date', 'required'],
            'amount' => ['required', 'min:0', 'numeric'],
            'expense_subtype_id' => ['required', 'integer', 'exists:expense_subtypes,id'],
            'description' => ['nullable', 'string']
        ];
    }
}
