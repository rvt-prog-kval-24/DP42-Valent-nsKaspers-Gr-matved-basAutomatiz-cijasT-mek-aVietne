<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoicePaymentRequest;
use App\Models\Invoice;
use App\Services\InvoiceService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private InvoiceService $invoiceService;

    /**
     * @param InvoiceService $invoiceService
     */
    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    public function showPaymentForm(Invoice $invoice): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        if ($invoice->paid) {
            return view('payment.invoice-paid', compact('invoice'));
        } else {
            return view('payment.payment-form', compact('invoice'));
        }
    }

    public function executePayment(InvoicePaymentRequest $request, Invoice $invoice)
    {
        if ($invoice->paid) {
            return redirect()->route('payment.show-form', $invoice)
                ->with('error', __('Invoice has been already paid'));
        }

        $this->invoiceService->setPaid($invoice);
        return redirect()->route('payment.show-form', $invoice);
    }
}
