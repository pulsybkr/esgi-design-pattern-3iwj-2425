<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

class Pizzaiolo
{
    private CanBuildPizza $builder;

    public function setBuilder(CanBuildPizza $builder): void
    {
        $this->builder = $builder;
    }

    public function buildMargherita(): Pizza
    {
        return $this->builder
            ->reset()
            ->setSize('medium')
            ->setCrustType('regular')
            ->setSauce('tomato')
            ->addCheese('mozzarella')
            ->setCookingInstructions('normal')
            ->build();
    }

    public function buildPepperoni(): Pizza
    {
        return $this->builder
            ->reset()
            ->setSize('medium')
            ->setCrustType('regular')
            ->setSauce('tomato')
            ->addCheese('mozzarella')
            ->addTopping('pepperoni')
            ->setCookingInstructions('normal')
            ->build();
    }

    public function buildVegetarian(): Pizza
    {
        return $this->builder
            ->reset()
            ->setSize('medium')
            ->setCrustType('regular')
            ->setSauce('tomato')
            ->addCheese('mixed')
            ->addTopping('vegetables')
            ->setCookingInstructions('normal')
            ->build();
    }
}
