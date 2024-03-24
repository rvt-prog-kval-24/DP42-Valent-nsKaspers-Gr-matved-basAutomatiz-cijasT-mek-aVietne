<?php

namespace App\Services;

use App\Models\Invoice;
use DomainException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;
use Stripe\StripeClient;

class StripeService
{
    /**
     * @var InvoiceService
     */
    private InvoiceService $invoiceService;

    /**
     * @var StripeApiService
     */
    private StripeApiService $stripeApiService;

    /**
     * @param InvoiceService $invoiceService
     * @param StripeApiService $stripeApiService
     */
    public function __construct(InvoiceService $invoiceService, StripeApiService $stripeApiService)
    {
        $this->invoiceService = $invoiceService;
        $this->stripeApiService = $stripeApiService;
    }

    public function getRedirectUrl(Invoice $invoice): string
    {
        if ($invoice->getTotalPriceWithTax() <= 0) {
            throw new DomainException(__('Stripe payment can not bee free.'));
        }

        $stripeClient = $this->getStripeClient();

        $priceId = $this->getPriceId($invoice, $stripeClient);

        $stripeSession = $this->createStripeSession($invoice, $priceId);

        $this->saveStripeSessionId($invoice, $stripeSession->id);

        return $stripeSession->url;
    }

    private function getStripeClient(): StripeClient
    {
        return new StripeClient($this->getStripeSecretKey());
    }

    private function getStripeSecretKey(): string
    {
        return  env('STRIPE_SECRET_KEY');
    }

    private function getPriceId(Invoice $invoice, StripeClient $stripeClient): string
    {
        try {
            $productId = $this->stripeApiService
                ->generateProductId($stripeClient, ['name' => $invoice->reference]);
            $priceId = $this->stripeApiService
                ->generatePriceId($stripeClient, [
                'product'     => $productId,
                'unit_amount' => $this->getSumInBaseIntegers($invoice->getTotalPriceWithTax(), 2),
                'currency'    => 'EUR',
            ]);
        } catch (ApiErrorException $e) {
            Log::error($e->getMessage(), debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS));
            throw new DomainException(__('Impossible to obtain Stripe price.'));
        }

        return $priceId;
    }

    private function createStripeSession(Invoice $invoice, string $priceId): StripeSession
    {
        Stripe::setApiKey($this->getStripeSecretKey());

        try {
            $session = $this->stripeApiService->generateSession([
                'line_items'  => [
                    [
                        'price'    => $priceId,
                        'quantity' => 1,
                    ],
                ],
                'mode'        => 'payment',
                'success_url' => route('payment.finish', $invoice),
                'cancel_url'  => route('payment.cancel', $invoice),
                'locale'      => $this->getStripeSessionLocale(),
            ]);
        } catch (ApiErrorException $e) {
            Log::error($e->getMessage(), debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS));
            throw new DomainException(__('Impossible to obtain Stripe session.'));
        }

        return $session;
    }

    private function getStripeSessionLocale(): string
    {
      return 'lv';
    }

    /**
     * @param Invoice $invoice
     * @param string $sessionId
     * @return void
     */
    private function saveStripeSessionId(Invoice $invoice, string $sessionId): void
    {
        DB::table('stripe_tokens')->where(['invoice_id' => $invoice->id])->delete();

        DB::table('stripe_tokens')->insert([
            'invoice_id' => $invoice->id,
            'token'      => $sessionId,
        ]);
    }

    public function finalizeStripePayment(Invoice $invoice): void
    {
        if ($invoice->paid) {
            return;
        }

        $sessionId = $this->getStripeSessionId($invoice);
        Stripe::setApiKey($this->getStripeSecretKey());

        try {
            $session = $this->stripeApiService->retrieveStripeSession($sessionId);
            $intent = $this->stripeApiService->retrievePaymentIntent($session->payment_intent ?? '');
        } catch (ApiErrorException $e) {
            Log::error($e->getMessage(), debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS));
            throw new DomainException(__('Impossible to obtain Stripe payment code.'));
        }

        if ($intent->status === 'succeeded' || $intent->status === 'pending') {
            $transactionId = $intent->latest_charge;
            $this->invoiceService->setPaidWithTransaction($invoice, $transactionId);
        }
    }

    /**
     * @param Invoice $invoice
     * @return string
     */
    public function getStripeSessionId(Invoice $invoice): string
    {
        return (string)DB::table('stripe_tokens')->where('invoice_id', $invoice->id)
            ->value('token');
    }

    /**
     * @param float $sum
     * @param int $decimalPlaces
     * @return int
     */
    private function getSumInBaseIntegers(float $sum, int $decimalPlaces): int
    {
        return (int)round($sum * (10 ** $decimalPlaces));
    }
}
