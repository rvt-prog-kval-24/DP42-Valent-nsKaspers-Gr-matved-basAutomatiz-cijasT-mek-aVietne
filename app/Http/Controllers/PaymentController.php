<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Services\StripeService;
use DomainException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class PaymentController extends Controller
{
    private StripeService $stripeService;

    /**
     * @param StripeService $stripeService
     */
    public function __construct(StripeService $stripeService)
    {
        $this->stripeService = $stripeService;
    }

    /**
     * @param Invoice $invoice
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function showPaymentForm(Invoice $invoice): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        if ($invoice->paid) {
            return view('payment.invoice-paid', compact('invoice'));
        } else {
            return view('payment.payment-form', compact('invoice'));
        }
    }

    /**
     * @param Invoice $invoice
     * @return RedirectResponse
     */
    public function executePayment(Invoice $invoice): RedirectResponse
    {
        if ($invoice->paid) {
            return redirect()->route('payment.show-form', $invoice)
                ->with('error', __('Invoice has been already paid'));
        }

        try {
            $redirectUrl = $this->stripeService->getRedirectUrl($invoice);
        } catch (DomainException $e) {
            return redirect()->route('payment.show-form', $invoice)->with('error', $e->getMessage());
        }

        return redirect()->to($redirectUrl);
    }

    public function finish(Invoice $invoice)
    {
        try {
            $this->stripeService->finalizeStripePayment($invoice);
        } catch (DomainException $e) {
            return redirect()->route('payment.show-form', $invoice)->with('error', $e->getMessage());
        }

        if (!$invoice->paid) {
            return redirect()->route('payment.show-form', $invoice)
                ->with('error', __('Payment is not accepted'));
        }

        return redirect()->route('payment.show-form', $invoice);
    }

    /**
     * @param Invoice $invoice
     * @return RedirectResponse
     */
    public function cancel(Invoice $invoice): RedirectResponse
    {
        return redirect()->route('payment.show-form', $invoice);
    }
}
