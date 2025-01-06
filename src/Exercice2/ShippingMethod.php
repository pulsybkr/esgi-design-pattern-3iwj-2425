<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

interface ShippingMethod
{
    public function calculateCost(float $weight, float $distance): float;

    public function getEstimatedDays(): array;

    public function formatTracking(string $trackingNumber): string;
}
