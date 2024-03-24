<?php

namespace App\Services;


use Stripe\Checkout\Session as StripeSession;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use Stripe\StripeClient;

class StripeApiService
{
    /**
     * @throws ApiErrorException
     */
    public function generateProductId(StripeClient $stripeClient, array $data): string
    {
        return $stripeClient->products->create($data)->id;
    }

    /**
     * @throws ApiErrorException
     */
    public function generatePriceId(StripeClient $stripeClient, array $data): string
    {
        return $stripeClient->prices->create($data)->id;
    }

    /**
     * @throws ApiErrorException
     */
    public function generateSession(array $data): StripeSession
    {
        return StripeSession::create($data);
    }

    /**
     * @throws ApiErrorException
     */
    public function retrievePaymentIntent(string $paymentIntentCode): PaymentIntent
    {
        return PaymentIntent::retrieve($paymentIntentCode);
    }

    /**
     * @throws ApiErrorException
     */
    public function retrieveStripeSession(string $sessionId): StripeSession
    {
        return StripeSession::retrieve($sessionId);
    }
}
