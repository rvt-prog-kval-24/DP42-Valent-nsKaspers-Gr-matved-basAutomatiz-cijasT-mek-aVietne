<?php

namespace App\Services;

use App\Mail\UnpaidInvoiceEmail;
use App\Models\Invoice;
use DomainException;
use Illuminate\Support\Facades\Mail;

class MailSendingService
{
    /**
     * @var InvoiceService
     */
    private InvoiceService $invoiceService;

    /**
     * @param InvoiceService $invoiceService
     */
    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    public function sendUnpaidInvoiceMessage(Invoice $invoice): void
    {
        if ($invoice->paid) {
            throw new DomainException(__('This invoice has already been paid.'));
        }

        Mail::to($invoice->client_email)->send(new UnpaidInvoiceEmail($invoice, $this->invoiceService));
    }
}
