<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

class PayPalPaymentAdapter implements LegacyPaymentProcessor
{
    private PayPalGateway $paypalGateway;

    public function __construct(PayPalGateway $paypalGateway)
    {
        $this->paypalGateway = $paypalGateway;
    }

    public function processPayment(float $amount, string $currency, array $paymentDetails): array
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException("Le montant doit être supérieur à 0");
        }

        $response = $this->paypalGateway->charge([
            'amount' => $amount,
            'currency' => $currency,
            'details' => $paymentDetails
        ]);

        return [
            'transaction_id' => $response['payment_id'],
            'status' => 'success',
            'amount' => $response['amount']['total'],
            'currency' => $response['amount']['currency'],
            'timestamp' => $response['create_time']
        ];
    }

    public function getPaymentStatus(string $transactionId): string
    {
        $response = $this->paypalGateway->verifyPayment($transactionId);
        return $response->state === 'approved' ? 'success' : 'failed';
    }

    public function refundPayment(string $transactionId): bool
    {
        $response = $this->paypalGateway->refund($transactionId);
        return $response->state === 'completed';
    }
} 