<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Invoice;
use App\Models\InvoiceService as Service;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InvoiceService
{
    /**
     * @param array $data
     * @return Invoice
     */
    public function store(array $data): Invoice
    {
        return DB::transaction(static function () use ($data) : Invoice {
            $company = Company::find($data['company_id']);

            $invoice = Invoice::create([
                'reference' => Str::uuid(),
                'company_id' => $data['company_id'],
                'tax_rate' => $data['tax_rate'],
                'provider_name' => $company->name,
                'provider_email' => $company->email,
                'provider_phone' => $company->phone,
                'provider_company' => $company->name,
                'provider_vat_number' => $company->vat_number,
                'provider_reg_number' => $company->reg_number,
                'provider_iban' => '',
                'provider_swift' => '',
                'client_type' => $data['client_type'],
                'client_name' => $data['client_name'],
                'client_email' => $data['client_email'],
                'client_phone' => $data['client_phone'],
                'client_company' => $data['client_company'] ?? null,
                'client_vat_number' => $data['client_vat_number'] ?? null,
                'client_reg_number' => $data['client_reg_number'] ?? null,
                'client_iban' => $data['client_iban'] ?? null,
                'client_swift' => $data['client_swift'] ?? null
            ]);

            foreach ($data['services'] as $serviceData) {
                Service::create([
                    'id' => Str::uuid(),
                    'invoice_id' => $invoice->id,
                    'name' => $serviceData['name'],
                    'price' => $serviceData['price'],
                ]);
            }

            return $invoice;
        });
    }

    /**
     * @param Invoice $invoice
     * @param array $data
     */
    public function update(Invoice $invoice, array $data): void
    {
        DB::transaction(static function () use ($invoice, $data) : void {
            $company = Company::find($data['company_id']);

            $invoice->update([
                'company_id' => $data['company_id'],
                'tax_rate' => $data['tax_rate'],
                'provider_name' => $company->name,
                'provider_email' => $company->email,
                'provider_phone' => $company->phone,
                'provider_company' => $company->name,
                'provider_vat_number' => $company->vat_number,
                'provider_reg_number' => $company->reg_number,
                'provider_iban' => '',
                'provider_swift' => '',
                'client_type' => $data['client_type'],
                'client_name' => $data['client_name'],
                'client_email' => $data['client_email'],
                'client_phone' => $data['client_phone'],
                'client_company' => $data['client_company'] ?? null,
                'client_vat_number' => $data['client_vat_number'] ?? null,
                'client_reg_number' => $data['client_reg_number'] ?? null,
                'client_iban' => $data['client_iban'] ?? null,
                'client_swift' => $data['client_swift'] ?? null
            ]);

            // delete old non-provided services
            $invoice->invoiceServices()->delete();

            // create new services
            if (!empty($data['services'])) {
                foreach ($data['services'] as $serviceData) {
                    Service::create([
                        'id' => Str::uuid(),
                        'invoice_id' => $invoice->id,
                        'name' => $serviceData['name'],
                        'price' => $serviceData['price'],
                    ]);
                }
            }
        });
    }

    /**
     * @param Invoice $invoice
     * @return void
     */
    public function destroy(Invoice $invoice): void
    {
        $invoice->delete();
    }

    /**
     * @param Invoice $invoice
     * @return string|null
     */
    public function show(Invoice $invoice): ?string
    {
        $options = new Options();
        $options->set('defaultFont', 'DejaVu Sans');

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml(view('admin.invoice.pdf', compact('invoice'))->render());
        $dompdf->render();

        return $dompdf->output();
    }

    public function setPaid(Invoice $invoice): void
    {
        $invoice->update(['paid' => true]);
    }
}
