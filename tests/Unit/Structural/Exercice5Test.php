<?php

use EdemotsCourses\EsgiDesignPattern\Exercice5\Beverage;
use EdemotsCourses\EsgiDesignPattern\Exercice5\Americano;
use EdemotsCourses\EsgiDesignPattern\Exercice5\Expresso;
use EdemotsCourses\EsgiDesignPattern\Exercice5\MilkDecorator;
use EdemotsCourses\EsgiDesignPattern\Exercice5\VegetalMilkDecorator;
use EdemotsCourses\EsgiDesignPattern\Exercice5\WhipedCreamDecorator;
use EdemotsCourses\EsgiDesignPattern\Exercice5\SyrupDecorator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class Exercice5Test extends TestCase
{
    #[Test]
    #[DataProvider('beverageProvider')]
    public function itCreatesBasicBeverages(string $beverageClass, float $price)
    {
        $beverage = new $beverageClass();

        $this->assertInstanceOf(Beverage::class, $beverage);
        $this->assertEquals($price, $beverage->getCost());
    }

    public static function beverageProvider()
    {
        return [
            "basic expresso" => [Expresso::class, 2],
            "basic americano" => [Americano::class, 2.5],
        ];
    }

    #[Test]
    #[DataProvider('beverageWithDecoratorProvider')]
    public function itCreatesBeveragesWithDecorator(string $beverageClass, string $decoratorClass, float $price)
    {
        $beverage = new $beverageClass();
        $decoratedBeverage = new $decoratorClass($beverage);

        $this->assertInstanceOf(Beverage::class, $decoratedBeverage);
        $this->assertEquals($price, $decoratedBeverage->getCost());
    }

    public static function beverageWithDecoratorProvider()
    {
        return [
            "expresso with milk" => [Expresso::class, MilkDecorator::class, 2.5],
            "americano with milk" => [Americano::class, MilkDecorator::class, 3],
            "expresso with vegetal milk" => [Expresso::class, VegetalMilkDecorator::class, 3],
            "americano with vegetal milk" => [Americano::class, VegetalMilkDecorator::class, 3.5],
            "expresso with whiped cream" => [Expresso::class, WhipedCreamDecorator::class, 3],
            "americano with whiped cream" => [Americano::class, WhipedCreamDecorator::class, 3.5],
            "expresso with syrup" => [Expresso::class, SyrupDecorator::class, 2.75],
            "americano with syrup" => [Americano::class, SyrupDecorator::class, 3.25],
        ];
    }

    #[Test]
    #[DataProvider('beverageWithDoubledDecoratorProvider')]
    public function itCreatesBeveragesWithStackedDecorator(string $beverageClass, array $decoratorClass, float $price)
    {
        $beverage = new $beverageClass();
        foreach ($decoratorClass as $decorator) {
            $beverage = new $decorator($beverage);
        }

        $this->assertInstanceOf(Beverage::class, $beverage);
        $this->assertEquals($price, $beverage->getCost());
    }

    public static function beverageWithDoubledDecoratorProvider()
    {
        return [
            "expresso with milk and whiped cream" => [Expresso::class, [MilkDecorator::class, WhipedCreamDecorator::class], 3.5],
            "americano with vegetal milk and syrup" => [Americano::class, [VegetalMilkDecorator::class, SyrupDecorator::class], 4.25],
            "expresso with double syrup" => [Expresso::class, [SyrupDecorator::class, SyrupDecorator::class], 3.5],
        ];
    }
}
