<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

class StripePaymentAdapter implements LegacyPaymentProcessor
{
    private StripeGateway $stripeGateway;

    public function __construct(StripeGateway $stripeGateway)
    {
        $this->stripeGateway = $stripeGateway;
    }

    public function processPayment(float $amount, string $currency, array $paymentDetails): array
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException("Le montant doit être supérieur à 0");
        }

        $response = $this->stripeGateway->charge([
            'amount' => $amount,
            'currency' => $currency,
            'details' => $paymentDetails
        ]);

        return [
            'transaction_id' => $response['id'],
            'status' => 'success',
            'amount' => $response['amount'],
            'currency' => $response['currency'],
            'timestamp' => date('Y-m-d H:i:s', $response['created'])
        ];
    }

    public function getPaymentStatus(string $transactionId): string
    {
        $response = $this->stripeGateway->verifyPayment($transactionId);
        return $response->status === 'succeeded' ? 'success' : 'failed';
    }

    public function refundPayment(string $transactionId): bool
    {
        $response = $this->stripeGateway->refund($transactionId);
        return $response->status === 'refunded';
    }
} 