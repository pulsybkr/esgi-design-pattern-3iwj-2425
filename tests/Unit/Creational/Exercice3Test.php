<?php

declare(strict_types=1);

use EdemotsCourses\EsgiDesignPattern\Exercice3\CanBuildPizza;
use EdemotsCourses\EsgiDesignPattern\Exercice3\PizzaBuilder;
use EdemotsCourses\EsgiDesignPattern\Exercice3\Pizzaiolo;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class Exercice3Test extends TestCase
{
    private CanBuildPizza $builder;
    private Pizzaiolo $director;

    protected function setUp(): void
    {
        $this->builder = new PizzaBuilder();
        $this->director = new Pizzaiolo();
        $this->director->setBuilder($this->builder);
    }

    #[Test]
    public function itBuildsCustomPizzaWithFluentInterface(): void
    {
        $pizza = $this->builder
            ->reset()
            ->setSize('large')
            ->setCrustType('thin')
            ->setSauce('bbq')
            ->addCheese('mozzarella')
            ->addCheese('cheddar')
            ->addTopping('mushrooms')
            ->addTopping('onions')
            ->setCookingInstructions('well done')
            ->build();

        $this->assertEquals('large', $pizza->getSize());
        $this->assertEquals('thin', $pizza->getCrustType());
        $this->assertEquals('bbq', $pizza->getSauce());
        $this->assertEquals(['mozzarella', 'cheddar'], $pizza->getCheeses());
        $this->assertEquals(['mushrooms', 'onions'], $pizza->getToppings());
        $this->assertEquals('well done', $pizza->getCookingInstructions());
    }

    #[Test]
    public function itBuildsMargheritaPizza(): void
    {
        $pizza = $this->director->buildMargherita();

        $this->assertEquals('medium', $pizza->getSize());
        $this->assertEquals('regular', $pizza->getCrustType());
        $this->assertEquals('tomato', $pizza->getSauce());
        $this->assertEquals(['mozzarella'], $pizza->getCheeses());
        $this->assertEquals([], $pizza->getToppings());
        $this->assertEquals('normal', $pizza->getCookingInstructions());
    }

    #[Test]
    public function itBuildsPepperoniPizza(): void
    {
        $pizza = $this->director->buildPepperoni();

        $this->assertEquals('medium', $pizza->getSize());
        $this->assertEquals('regular', $pizza->getCrustType());
        $this->assertEquals('tomato', $pizza->getSauce());
        $this->assertEquals(['mozzarella'], $pizza->getCheeses());
        $this->assertEquals(['pepperoni'], $pizza->getToppings());
        $this->assertEquals('normal', $pizza->getCookingInstructions());
    }

    #[Test]
    public function itBuildsVegetarianPizza(): void
    {
        $pizza = $this->director->buildVegetarian();

        $this->assertEquals('medium', $pizza->getSize());
        $this->assertEquals('thin', $pizza->getCrustType());
        $this->assertEquals('tomato', $pizza->getSauce());
        $this->assertEquals(['mozzarella', 'cheddar'], $pizza->getCheeses());
        $this->assertGreaterThanOrEqual(1, count($pizza->getToppings()));
        $this->assertEquals('light', $pizza->getCookingInstructions());
    }

    #[Test]
    public function itValidatesMaximumToppings(): void
    {
        $this->expectException(\LogicException::class);

        $this->builder
            ->reset()
            ->setSize('large')
            ->setCrustType('regular')
            ->setSauce('tomato')
            ->addCheese('mozzarella')
            ->addTopping('pepperoni')
            ->addTopping('mushrooms')
            ->addTopping('onions')
            ->addTopping('bell peppers')
            ->addTopping('olives')
            ->addTopping('bacon')
            ->addTopping('ham')
            ->addTopping('pineapple')
            ->addTopping('extra Topping')  // This should throw
            ->build();
    }

    #[Test]
    public function itRequiresAtLeastOneCheese(): void
    {
        $this->expectException(\LogicException::class);

        $this->builder
            ->reset()
            ->setSize('large')
            ->setCrustType('regular')
            ->setSauce('tomato')
            ->addTopping('pepperoni')
            ->build();
    }

    #[Test]
    public function itRequiresSizeAndCrustType(): void
    {
        $this->expectException(\LogicException::class);

        $this->builder
            ->reset()
            ->setSauce('tomato')
            ->addCheese('mozzarella')
            ->build();
    }
}
