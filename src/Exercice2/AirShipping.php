<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

class AirShipping implements ShippingMethod
{
    private $price = 50.0;
    private $pricePerKm = 2.0;
    private $pricePerKg = 3.0;

    public function calculateCost(float $weight, float $distance): float
    {
        return $this->price + ($this->pricePerKm * $distance) + ($this->pricePerKg * $weight);
    }   

    public function getEstimatedDays(): array
    {
        return [1, 2];
    }

    public function formatTracking(string $trackingNumber): string
    {
        return 'AIR-' . $trackingNumber;
    }
} 