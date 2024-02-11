<?php

namespace App\Http\Requests\Admin\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
        $companyId = isset($this->company->id) ? (int) $this->company->id : 0;

        return [
            'name' => 'required|string|min:3|max:255',
            'reg_number' => 'required|string|min:3|max:255|unique:companies,reg_number,' . $companyId ,
            'vat_number' => 'required|string|min:3|max:255|unique:companies,vat_number,' . $companyId ,
            'address' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|min:3|max:255|unique:companies,email,' . $companyId ,
            'phone' => 'required|string|min:3|max:255|unique:companies,phone,' . $companyId ,
            'description' => 'nullable|string|max:9999',
            'api_code' => 'nullable|string|max:9999',
        ];
    }
}
