<?php

namespace App\Http\Requests\Admin\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCreateRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255',
            'reg_number' => 'required|string|min:3|max:255|unique:companies,reg_number',
            'vat_number' => 'required|string|min:3|max:255|unique:companies,vat_number',
            'address' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|min:3|max:255|unique:companies,email',
            'phone' => 'required|string|min:3|max:255|unique:companies,phone',
            'description' => 'nullable|string|max:9999',
            'api_code' => 'nullable|string|max:9999',
            'password' => 'required|string|min:8|max:100',
        ];
    }
}
