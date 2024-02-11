<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use HasFactory;

    public const CLIENT_TYPE_INDIVIDUAL = 1;
    public const CLIENT_TYPE_LEGAL_ENTITY = 2;
    public const PRICE_ROUNDING = 2;

    protected $fillable = [
        'reference',
        'company_id',
        'tax_rate',
        'provider_name',
        'provider_email',
        'provider_phone',
        'provider_company',
        'provider_vat_number',
        'provider_reg_number',
        'provider_iban',
        'provider_swift',
        'client_type',
        'client_name',
        'client_email',
        'client_phone',
        'client_company',
        'client_vat_number',
        'client_reg_number',
        'client_iban',
        'client_swift',
        'paid',
        'transaction_code'
    ];

    /**
     * @return HasMany
     */
    public function invoiceServices(): HasMany
    {
        return $this->hasMany(InvoiceService::class);
    }

    public static function getClientTypes(): array
    {
        return [
            self::CLIENT_TYPE_INDIVIDUAL => __('Individual'),
            self::CLIENT_TYPE_LEGAL_ENTITY => __('Legal Entity'),
        ];
    }

    /**
     * @return bool
     */
    public function isLegalEntityInvoice(): bool
    {
        return (int)$this->client_type === self::CLIENT_TYPE_LEGAL_ENTITY;
    }

    public function getTotalPriceWithoutTax(): float
    {
        $price = 0.0;
        foreach ($this->invoiceServices as $service) {
            $price += round($service->price, self::PRICE_ROUNDING);
        }
        return round($price, self::PRICE_ROUNDING);
    }

    public function getTotalPriceWithTax(): float
    {
        $price = 0.0;
        foreach ($this->invoiceServices as $service) {
            $price += round($service->price + ($service->price / 100 * $this->tax_rate), self::PRICE_ROUNDING);
        }
        return round($price, self::PRICE_ROUNDING);
    }
}
