<?php

declare(strict_types=1);

use EdemotsCourses\EsgiDesignPattern\Exercice1\Car;
use EdemotsCourses\EsgiDesignPattern\Exercice1\Truck;
use EdemotsCourses\EsgiDesignPattern\Exercice1\Vehicle;
use PHPUnit\Framework\TestCase;

final class Exercice1Test extends TestCase
{
    public function testCarHasZeroSpeed()
    {
        $car = new Car();
        $this->assertSame(0.0, $car->speed);
    }

    public function testCarAccelerates()
    {
        $car = new Car();
        $expectedSpeed = $car->speed + 3.5;
        $this->assertSame($expectedSpeed, $car->accelerate());
    }

    public function testCarBreaks()
    {
        $car = new Car();
        $car->accelerate();
        $this->assertEquals(0, $car->breaks());
    }

    public function testCarIsVehicle()
    {
        $car = new Car();
        $this->assertInstanceOf(Vehicle::class, $car);
    }

    public function testTruckHasZeroSpeed()
    {
        $truck = new Truck();
        $this->assertSame(0.0, $truck->speed);
    }

    public function testTruckAccelerates()
    {
        $truck = new Truck();
        $expectedSpeed = $truck->speed + 1.75;
        $this->assertSame($expectedSpeed, $truck->accelerate());
    }

    public function testTruckBreaks()
    {
        $truck = new Truck();
        $truck->accelerate();
        $this->assertEquals(0, $truck->breaks());
    }

    public function testTruckIsVehicle()
    {
        $car = new Truck();
        $this->assertInstanceOf(Vehicle::class, $car);
    }
}
