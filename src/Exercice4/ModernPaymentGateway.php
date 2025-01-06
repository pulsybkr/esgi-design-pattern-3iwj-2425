<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice4;

interface ModernPaymentGateway
{
    public function charge(array $paymentData): array;
    public function verifyPayment(string $paymentId): object;
    public function refund(string $paymentId): object;
}
