<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

abstract class AbstractShippingFactory
{
    abstract public function createShippingMethod(): ShippingMethod;

    public function getShippingInfo(float $weight, float $distance, string $trackingNumber): array
    {
        $shipping = $this->createShippingMethod();

        return [
            'cost' => $shipping->calculateCost($weight, $distance),
            'estimatedDays' => $shipping->getEstimatedDays(),
            'tracking' => $shipping->formatTracking($trackingNumber)
        ];
    }
}
