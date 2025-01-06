<?php

declare(strict_types=1);

use EdemotsCourses\EsgiDesignPattern\Exercice2\AbstractShippingFactory;
use EdemotsCourses\EsgiDesignPattern\Exercice2\GroundShipping;
use EdemotsCourses\EsgiDesignPattern\Exercice2\GroundShippingFactory;
use EdemotsCourses\EsgiDesignPattern\Exercice2\AirShipping;
use EdemotsCourses\EsgiDesignPattern\Exercice2\AirShippingFactory;
use EdemotsCourses\EsgiDesignPattern\Exercice2\SeaShipping;
use EdemotsCourses\EsgiDesignPattern\Exercice2\SeaShippingFactory;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class Exercice2Test extends TestCase
{
    private const DELTA = 0.01;

    #[Test]
    #[DataProvider('shippingFactoryProvider')]
    public function itImplementsShippingFactory(string $factoryClass): void
    {
        $this->assertInstanceOf(AbstractShippingFactory::class, new $factoryClass());
    }

    public static function shippingFactoryProvider(): array
    {
        return [
            'ground shipping factory' => [GroundShippingFactory::class],
            'air shipping factory' => [AirShippingFactory::class],
            'sea shipping factory' => [SeaShippingFactory::class],
        ];
    }

    #[Test]
    #[DataProvider('shippingFactoryWithMethodProvider')]
    public function itCorrectlyCreatesShippingMethod(string $factoryClass, string $shippingClass): void
    {
        $factory = new $factoryClass();
        $this->assertInstanceOf($shippingClass, $factory->createShippingMethod());
    }

    public static function shippingFactoryWithMethodProvider(): array
    {
        return [
            'ground shipping factory' => [GroundShippingFactory::class, GroundShipping::class],
            'air shipping factory' => [AirShippingFactory::class, AirShipping::class],
            'sea shipping factory' => [SeaShippingFactory::class, SeaShipping::class],
        ];
    }

    #[Test]
    #[DataProvider('shippingCostProvider')]
    public function itCalculatesCorrectShippingCosts(
        string $factoryClass,
        float $weight,
        float $distance,
        float $expectedCost
    ): void {
        $factory = new $factoryClass();
        $shipping = $factory->createShippingMethod();

        $this->assertEqualsWithDelta(
            $expectedCost,
            $shipping->calculateCost($weight, $distance),
            self::DELTA
        );
    }

    public static function shippingCostProvider(): array
    {
        return [
            'ground shipping light short distance' => [
                GroundShippingFactory::class,
                1.0, // kg
                10.0, // km
                16.00,
            ],
            'ground shipping heavy long distance' => [
                GroundShippingFactory::class,
                10.0,
                100.0,
                70.00,
            ],
            'air shipping light short distance' => [
                AirShippingFactory::class,
                1.0,
                10.0,
                73.00,
            ],
            'sea shipping bulk long distance' => [
                SeaShippingFactory::class,
                100.0,
                1000.0,
                380.00,
            ],
        ];
    }

    #[Test]
    #[DataProvider('estimatedDaysProvider')]
    public function itProvidesCorrectDeliveryEstimates(
        string $factoryClass,
        array $expectedRange
    ): void {
        $factory = new $factoryClass();
        $shipping = $factory->createShippingMethod();
        $range = $shipping->getEstimatedDays();

        $this->assertEquals($expectedRange, $range);
    }

    public static function estimatedDaysProvider(): array
    {
        return [
            'ground shipping range' => [GroundShippingFactory::class, [3, 5]],
            'air shipping range' => [AirShippingFactory::class, [1, 2]],
            'sea shipping range' => [SeaShippingFactory::class, [7, 14]],
        ];
    }

    #[Test]
    #[DataProvider('trackingFormatProvider')]
    public function itFormatsTrackingNumbersCorrectly(
        string $factoryClass,
        string $trackingNumber,
        string $expectedFormat
    ): void {
        $factory = new $factoryClass();
        $shipping = $factory->createShippingMethod();

        $this->assertEquals(
            $expectedFormat,
            $shipping->formatTracking($trackingNumber)
        );
    }

    public static function trackingFormatProvider(): array
    {
        return [
            'ground tracking format' => [
                GroundShippingFactory::class,
                '123456',
                'GRD-123456'
            ],
            'air tracking format' => [
                AirShippingFactory::class,
                '123456',
                'AIR-123456'
            ],
            'sea tracking format' => [
                SeaShippingFactory::class,
                '123456',
                'SEA-123456'
            ],
        ];
    }

    #[Test]
    #[DataProvider('shippingInfoProvider')]
    public function itProvidesCompleteShippingInfo(
        string $factoryClass,
        float $weight,
        float $distance,
        string $tracking,
        array $expectedInfo
    ): void {
        $factory = new $factoryClass();
        $info = $factory->getShippingInfo($weight, $distance, $tracking);

        $this->assertEqualsWithDelta(
            $expectedInfo['cost'],
            $info['cost'],
            self::DELTA
        );
        $this->assertEquals($expectedInfo['estimatedDays'], $info['estimatedDays']);
        $this->assertEquals($expectedInfo['tracking'], $info['tracking']);
    }

    public static function shippingInfoProvider(): array
    {
        return [
            'ground shipping info' => [
                GroundShippingFactory::class,
                1.0,
                10.0,
                '123456',
                [
                    'cost' => 16.00,
                    'estimatedDays' => [3, 5],
                    'tracking' => 'GRD-123456'
                ]
            ],
        ];
    }
}
