<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

class GroundShipping implements ShippingMethod
{
    private $price = 10.0;
    private $pricePerKm = 0.5;
    private $pricePerKg = 1.0;

    public function calculateCost(float $weight, float $distance): float
    {
        return $this->price + ($this->pricePerKm * $distance) + ($this->pricePerKg * $weight);
    }   

    public function getEstimatedDays(): array
    {
        return [3, 5];
    }

    public function formatTracking(string $trackingNumber): string
    {
        return 'GRD-' . $trackingNumber;
    }
} 