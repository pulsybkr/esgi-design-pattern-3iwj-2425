<?php

use EdemotsCourses\EsgiDesignPattern\Exercice10\PaymentMethod;
use EdemotsCourses\EsgiDesignPattern\Exercice10\PaymentProcessor;
use PHPUnit\Framework\TestCase;

class Exercice10Test extends TestCase
{
    public function testCreditCardPayment()
    {
        $processor = new PaymentProcessor();
        $creditCardPayment = new CreditCardPayment();

        $processor->setPaymentMethod($creditCardPayment);
        $result = $processor->processPayment(100.00);

        $this->assertEquals([
            'method' => 'credit_card',
            'amount' => 100.00,
        ], $result);
    }

    public function testPayPalPayment()
    {
        $processor = new PaymentProcessor();
        $payPalPayment = new PayPalPayment();

        $processor->setPaymentMethod($payPalPayment);
        $result = $processor->processPayment(200.50);

        $this->assertEquals([
            'method' => 'paypal',
            'amount' => 200.50,
        ], $result);
    }

    public function testCryptoPayment()
    {
        $processor = new PaymentProcessor();
        $cryptoPayment = new CryptoPayment();

        $processor->setPaymentMethod($cryptoPayment);
        $result = $processor->processPayment(0.05);

        $this->assertEquals([
            'method' => 'crypto',
            'amount' => 0.05,
        ], $result);
    }

    public function testThrowsExceptionWhenPaymentMethodNotSet()
    {
        $processor = new PaymentProcessor();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Payment method not set.");

        $processor->processPayment(50.00);
    }

    public function testMockingPaymentMethod()
    {
        $processor = new PaymentProcessor();

        $mockPaymentMethod = $this->createMock(PaymentMethod::class);

        $mockPaymentMethod->expects($this->once())
            ->method('pay')
            ->with($this->equalTo(150.75))
            ->willReturn([
                'method' => 'mock',
                'amount' => 150.75,
            ]);

        $processor->setPaymentMethod($mockPaymentMethod);
        $result = $processor->processPayment(150.75);

        $this->assertEquals([
            'method' => 'mock',
            'amount' => 150.75,
        ], $result);
    }
}
