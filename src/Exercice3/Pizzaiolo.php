<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

class Pizzaiolo
{
    private CanBuildPizza $builder;

    public function setBuilder(CanBuildPizza $builder): void
    {
        $this->builder = $builder;
    }
}
