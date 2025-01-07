<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

class Pizza
{
    private string $size;
    private string $crust;
    private string $sauce;
    private string $cheese;
    private array $toppings = [];
    private string $cookingInstructions;

    public function __construct(string $size, string $crust, string $sauce, string $cheese, array $toppings, string $cookingInstructions)
    {
        $this->size = $size;
        $this->crust = $crust;
        $this->sauce = $sauce;
        $this->cheese = $cheese;
        $this->toppings = $toppings;
        $this->cookingInstructions = $cookingInstructions;
    }

    public function getSize(): string
    {
        return $this->size;
    }
}
