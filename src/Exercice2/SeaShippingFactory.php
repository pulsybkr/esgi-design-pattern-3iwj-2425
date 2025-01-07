<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice2;

class SeaShippingFactory extends AbstractShippingFactory
{
    public function createShippingMethod(): ShippingMethod
    {
        return new SeaShipping();
    }
}