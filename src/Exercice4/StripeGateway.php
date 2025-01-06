<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

class StripeGateway implements ModernPaymentGateway
{
    public function charge(array $paymentData): array
    {
        // Simulate Stripe API response
        return [
            'id' => 'stripe_' . uniqid(),
            'status' => 'succeeded',
            'amount' => $paymentData['amount'],
            'currency' => $paymentData['currency'],
            'created' => time()
        ];
    }

    public function verifyPayment(string $paymentId): object
    {
        return (object)[
            'id' => $paymentId,
            'status' => str_starts_with($paymentId, 'stripe_') ? 'succeeded' : 'failed'
        ];
    }

    public function refund(string $paymentId): object
    {
        return (object)[
            'id' => $paymentId,
            'refund_id' => 'ref_' . uniqid(),
            'status' => 'refunded'
        ];
    }
}
