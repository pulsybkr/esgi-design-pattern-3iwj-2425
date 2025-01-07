<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice3;

class PizzaBuilder implements CanBuildPizza
{
    private string $size;
    private string $crust;
    private string $sauce;
    private string $cheese;
    private array $toppings = [];
    private string $cookingInstructions;

    public function reset(): self
    {
        $this->size = '';
        $this->crust = '';
        $this->sauce = '';
        $this->cheese = '';
        $this->toppings = [];
        $this->cookingInstructions = '';
        return $this;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;
        return $this;
    }

    public function setCrust(string $crust): self
    {
        $this->crust = $crust;
        return $this;
    }

    public function setSauce(string $sauce): self
    {
        $this->sauce = $sauce;
        return $this;
    }

    public function setCheese(string $cheese): self
    {
        $this->cheese = $cheese;
        return $this;
    }

    public function addTopping(string $topping): self
    {
        if (count($this->toppings) < 8) {
            $this->toppings[] = $topping;
        }
        return $this;
    }

    public function setCookingInstructions(string $instructions): self
    {
        $this->cookingInstructions = $instructions;
        return $this;
    }

    public function setCrustType(string $crust): self
    {
        $this->crust = $crust;
        return $this;
    }

    public function addCheese(string $cheese): self
    {
        $this->cheese = $cheese;
        return $this;
    }

    public function build(): Pizza
    {
        if (empty($this->cheese)) {
            throw new \Exception("La pizza doit contenir au moins un type de fromage.");
        }
        if (empty($this->size) || empty($this->crust)) {
            throw new \Exception("La taille et le type de croûte sont obligatoires.");
        }

        return new Pizza($this->size, $this->crust, $this->sauce, $this->cheese, $this->toppings, $this->cookingInstructions);
    }
}
