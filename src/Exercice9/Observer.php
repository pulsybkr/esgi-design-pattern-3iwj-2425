<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice9;

interface Observer
{
    public function update(float $stockPrice): void;
}
