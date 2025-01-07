<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice1;

interface Vehicle {
    public function accelerate(): float;
    public function breaks(): float;
}

class Car implements Vehicle
{
    public float $speed = 0.0;

    public function accelerate(): float
    {
        $this->speed += 3.5;
        return $this->speed;
    }

    public function breaks(): float
    {
        $this->speed -= 5;
        if($this->speed <= 0 ){
            return 0;
        }
        
        return $this->speed;
    }
}

class Truck implements Vehicle
{
    public float $speed = 0.0;

    public function accelerate(): float
    {
        $this->speed += 1.75;
        return $this->speed;
    }

    public function breaks(): float
    {
        $this->speed -= 2;
        if($this->speed <= 0 ){
            return 0;
        }
        
        return $this->speed;
    }
}
