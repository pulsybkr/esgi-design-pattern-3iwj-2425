<?php

use EdemotsCourses\EsgiDesignPattern\TheGildedRose\GildedRose;
use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Item;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class BrieItemsTest extends TestCase
{
    #[Test]
    #[DataProvider('providesBrieItems')]
    public function itUpdatesBrieItemsBeforeSellDate(Item $gildedRose)
    {
        $gildedRose = new GildedRose([$gildedRose]);
        $gildedRose->updateQuality();

        $this->assertEquals(11, $gildedRose->getItems()[0]->quality);
        $this->assertEquals(4, $gildedRose->getItems()[0]->sellIn);
    }

    public static function providesBrieItems()
    {
        return [
            "Aged brie before sell date" => [new Item("Aged Brie", 10, 5)],
        ];
    }

    #[Test]
    #[DataProvider('providesMaximumQualityBrieItems')]
    public function itUpdatesBrieItemsBeforeSellDateWithMaximumQuality(Item $gildedRose)
    {
        $gildedRose = new GildedRose([$gildedRose]);
        $gildedRose->updateQuality();

        $this->assertEquals(50, $gildedRose->getItems()[0]->quality);
        $this->assertEquals(4, $gildedRose->getItems()[0]->sellIn);
    }

    public static function providesMaximumQualityBrieItems()
    {
        return [
            "Maximum quality aged brie before sell date" => [new Item("Aged Brie", 50, 5)],
        ];
    }

    #[Test]
    #[DataProvider('providesBrieItemsOnSellDate')]
    public function itUpdatesBrieItemsOnSellDate(Item $gildedRose)
    {
        $gildedRose = new GildedRose([$gildedRose]);
        $gildedRose->updateQuality();

        $this->assertEquals(12, $gildedRose->getItems()[0]->quality);
        $this->assertEquals(-1, $gildedRose->getItems()[0]->sellIn);
    }

    public static function providesBrieItemsOnSellDate()
    {
        return [
            "Aged brie on sell date" => [new Item("Aged Brie", 10, 0)],
        ];
    }

    #[Test]
    #[DataProvider('providesBrieItemsOnSellDateNearMaxQuality')]
    public function itUpdatesBrieItemsOnSellDateNearMaxQuality(Item $gildedRose)
    {
        $gildedRose = new GildedRose([$gildedRose]);
        $gildedRose->updateQuality();

        $this->assertEquals(50, $gildedRose->getItems()[0]->quality);
        $this->assertEquals(-1, $gildedRose->getItems()[0]->sellIn);
    }

    public static function providesBrieItemsOnSellDateNearMaxQuality()
    {
        return [
            "Near max quality aged brie on sell date" => [new Item("Aged Brie", 49, 0)],
        ];
    }

    #[Test]
    #[DataProvider('providesBrieItemsOnSellDateAtMaxQuality')]
    public function itUpdatesBrieItemsOnSellDateAtMaxQuality(Item $gildedRose)
    {
        $gildedRose = new GildedRose([$gildedRose]);
        $gildedRose->updateQuality();

        $this->assertEquals(50, $gildedRose->getItems()[0]->quality);
        $this->assertEquals(-1, $gildedRose->getItems()[0]->sellIn);
    }

    public static function providesBrieItemsOnSellDateAtMaxQuality()
    {
        return [
            "Max quality aged brie on sell date" => [new Item("Aged Brie", 50, 0)],
        ];
    }

    #[Test]
    #[DataProvider('providesBrieItemsAfterSellDate')]
    public function itUpdatesBrieItemsAfterSellDate(Item $gildedRose)
    {
        $gildedRose = new GildedRose([$gildedRose]);
        $gildedRose->updateQuality();

        $this->assertEquals(12, $gildedRose->getItems()[0]->quality);
        $this->assertEquals(-11, $gildedRose->getItems()[0]->sellIn);
    }

    public static function providesBrieItemsAfterSellDate()
    {
        return [
            "Aged brie after sell date" => [new Item("Aged Brie", 10, -10)],
        ];
    }

    #[Test]
    #[DataProvider('providesBrieItemsAfterSellDateMaxQuality')]
    public function itUpdatesBrieItemsAfterSellDateMaxQuality(Item $gildedRose)
    {
        $gildedRose = new GildedRose([$gildedRose]);
        $gildedRose->updateQuality();

        $this->assertEquals(50, $gildedRose->getItems()[0]->quality);
        $this->assertEquals(-11, $gildedRose->getItems()[0]->sellIn);
    }

    public static function providesBrieItemsAfterSellDateMaxQuality()
    {
        return [
            "Max quality aged brie after sell date" => [new Item("Aged Brie", 50, -10)],
        ];
    }
}
