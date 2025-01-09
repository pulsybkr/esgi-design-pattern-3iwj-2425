<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice10;

interface PaymentMethod
{
    public function pay(float $amount): array;
}
