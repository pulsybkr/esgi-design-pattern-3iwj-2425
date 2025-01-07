<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

class GroundShippingFactory extends AbstractShippingFactory
{
    public function createShippingMethod(): ShippingMethod
    {
        return new GroundShipping();
    }
}