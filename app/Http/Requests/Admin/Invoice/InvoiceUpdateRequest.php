<?php

namespace App\Http\Requests\Admin\Invoice;

use App\Models\Invoice;
use Illuminate\Foundation\Http\FormRequest;

class InvoiceUpdateRequest extends FormRequest
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
        $clientTypes = implode(',', array_keys(Invoice::getClientTypes()));
        $clientType = !empty($this->client_type) && is_numeric($this->client_type) ? (int) $this->client_type : 0;

        $rules = [
            'company_id'                => 'required|int|exists:companies,id',
            'tax_rate'                  => 'required|numeric|min:0|max:100',
            'client_type'               => 'required|int|in:' . $clientTypes,
            'client_name'               => 'required|string|max:255',
            'client_email'              => 'required|string|email|max:255',
            'client_phone'              => 'required|string|max:255',
            'services'                  => 'required|array',
            'services.*.name'           => 'required|string|max:255',
            'services.*.price'          => 'required|numeric|min:0|max:9999999999',
        ];

        if ($clientType === Invoice::CLIENT_TYPE_LEGAL_ENTITY) {
            $rules = array_merge($rules, [
                'client_company'    => 'required|string|max:255',
                'client_vat_number' => 'required|string|max:255',
                'client_reg_number' => 'required|string|max:255',
                'client_iban'       => 'required|string|max:255',
                'client_swift'      => 'required|string|max:255',
            ]);
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'services'         => __('services'),
            'services.*.name'  => __('service name'),
            'services.*.price' => __('service price')
        ];
    }
}
