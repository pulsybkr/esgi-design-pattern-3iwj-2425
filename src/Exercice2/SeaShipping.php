<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

class SeaShipping implements ShippingMethod
{
    private $price = 30.0;
    private $pricePerKm = 0.3;
    private $pricePerKg = 0.5;

    public function calculateCost(float $weight, float $distance): float
    {
        return $this->price + ($this->pricePerKm * $distance) + ($this->pricePerKg * $weight);
    }   

    public function getEstimatedDays(): array
    {
        return [7, 14];
    }

    public function formatTracking(string $trackingNumber): string
    {
        return 'SEA-' . $trackingNumber;
    }
}