<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

class PayPalGateway implements ModernPaymentGateway
{
    public function charge(array $paymentData): array
    {
        // Simulate PayPal API response
        return [
            'payment_id' => 'pp_' . uniqid(),
            'state' => 'approved',
            'amount' => [
                'total' => $paymentData['amount'],
                'currency' => $paymentData['currency']
            ],
            'create_time' => date('Y-m-d H:i:s')
        ];
    }

    public function verifyPayment(string $paymentId): object
    {
        return (object)[
            'payment_id' => $paymentId,
            'state' => str_starts_with($paymentId, 'pp_') ? 'approved' : 'failed'
        ];
    }

    public function refund(string $paymentId): object
    {
        return (object)[
            'payment_id' => $paymentId,
            'refund_id' => 'refpp_' . uniqid(),
            'state' => 'completed'
        ];
    }
}
