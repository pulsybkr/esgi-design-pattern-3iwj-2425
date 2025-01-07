<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

class AirShippingFactory extends AbstractShippingFactory
{
    public function createShippingMethod(): ShippingMethod
    {
        return new AirShipping();
    }
}