<?php

use EdemotsCourses\EsgiDesignPattern\Exercice4\LegacyPaymentProcessor;
use EdemotsCourses\EsgiDesignPattern\Exercice4\PayPalGateway;
use EdemotsCourses\EsgiDesignPattern\Exercice4\PayPalPaymentAdapter;
use EdemotsCourses\EsgiDesignPattern\Exercice4\StripeGateway;
use EdemotsCourses\EsgiDesignPattern\Exercice4\StripePaymentAdapter;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class Exercice4Test extends TestCase
{
    private StripePaymentAdapter $stripeAdapter;
    private PayPalPaymentAdapter $paypalAdapter;

    protected function setUp(): void
    {
        $this->stripeAdapter = new StripePaymentAdapter(new StripeGateway());
        $this->paypalAdapter = new PayPalPaymentAdapter(new PayPalGateway());
    }

    #[Test]
    #[DataProvider('paymentProcessorProvider')]
    public function itProcessesValidPayments(
        LegacyPaymentProcessor $processor,
        float $amount,
        string $currency,
        array $paymentDetails
    ): void {
        $result = $processor->processPayment($amount, $currency, $paymentDetails);

        $this->assertArrayHasKey('transaction_id', $result);
        $this->assertArrayHasKey('status', $result);
        $this->assertEquals('success', $result['status']);
        $this->assertEquals($amount, $result['amount']);
        $this->assertEquals($currency, $result['currency']);
    }

    public static function paymentProcessorProvider(): array
    {
        return [
            'stripe credit card payment' => [
                new StripePaymentAdapter(new StripeGateway()),
                100.00,
                'USD',
                [
                    'card_number' => '4242424242424242',
                    'expiry_month' => '12',
                    'expiry_year' => '2024',
                    'cvv' => '123'
                ]
            ],
            'paypal digital wallet payment' => [
                new PayPalPaymentAdapter(new PayPalGateway()),
                50.00,
                'EUR',
                [
                    'email' => 'customer@example.com',
                    'paypal_token' => 'token123'
                ]
            ]
        ];
    }

    #[Test]
    #[DataProvider('invalidAmountProvider')]
    public function itThrowsExceptionForInvalidAmount(
        LegacyPaymentProcessor $processor,
        float $amount
    ): void {
        $this->expectException(\InvalidArgumentException::class);

        $processor->processPayment($amount, 'USD', ['card_number' => '4242424242424242']);
    }

    public static function invalidAmountProvider(): array
    {
        return [
            'stripe zero amount' => [new StripePaymentAdapter(new StripeGateway()), 0.00],
            'stripe negative amount' => [new StripePaymentAdapter(new StripeGateway()), -10.00],
            'paypal zero amount' => [new PayPalPaymentAdapter(new PayPalGateway()), 0.00],
            'paypal negative amount' => [new PayPalPaymentAdapter(new PayPalGateway()), -10.00]
        ];
    }

    #[Test]
    #[DataProvider('paymentStatusProvider')]
    public function itRetrievesPaymentStatus(
        LegacyPaymentProcessor $processor,
        string $transactionId,
        string $expectedStatus
    ): void {
        $status = $processor->getPaymentStatus($transactionId);
        $this->assertEquals($expectedStatus, $status);
    }

    public static function paymentStatusProvider(): array
    {
        return [
            'stripe successful payment' => [
                new StripePaymentAdapter(new StripeGateway()),
                'stripe_123',
                'success'
            ],
            'stripe failed payment' => [
                new StripePaymentAdapter(new StripeGateway()),
                'invalid_id',
                'failed'
            ],
            'paypal successful payment' => [
                new PayPalPaymentAdapter(new PayPalGateway()),
                'pp_123',
                'success'
            ],
            'paypal failed payment' => [
                new PayPalPaymentAdapter(new PayPalGateway()),
                'invalid_id',
                'failed'
            ]
        ];
    }

    #[Test]
    #[DataProvider('refundProvider')]
    public function itProcessesRefunds(
        LegacyPaymentProcessor $processor,
        string $transactionId
    ): void {
        $result = $processor->refundPayment($transactionId);
        $this->assertTrue($result);
    }

    public static function refundProvider(): array
    {
        return [
            'stripe refund' => [
                new StripePaymentAdapter(new StripeGateway()),
                'stripe_123'
            ],
            'paypal refund' => [
                new PayPalPaymentAdapter(new PayPalGateway()),
                'pp_123'
            ]
        ];
    }

    #[Test]
    public function itMaintainsConsistentResponseFormat(): void
    {
        $stripeResult = $this->stripeAdapter->processPayment(100.00, 'USD', [
            'card_number' => '4242424242424242'
        ]);

        $paypalResult = $this->paypalAdapter->processPayment(100.00, 'USD', [
            'email' => 'customer@example.com'
        ]);

        $requiredKeys = ['transaction_id', 'status', 'amount', 'currency', 'timestamp'];

        foreach ($requiredKeys as $key) {
            $this->assertArrayHasKey($key, $stripeResult);
            $this->assertArrayHasKey($key, $paypalResult);
        }
    }
}
