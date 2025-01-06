<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

interface CanBuildPizza
{
    public function reset(): self;
    /* setters, adders */
    public function build(): Pizza;
}
