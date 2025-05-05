<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'holder_name' => 'required|string|max:255',
            'document_number' => 'required|string|max:50',
            'account_type' => 'required|string|max:50',
            'balance' => 'required|numeric|min:0',
        ];
    }
}
