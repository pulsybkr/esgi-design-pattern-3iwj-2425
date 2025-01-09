<?php

use EdemotsCourses\EsgiDesignPattern\TheGildedRose\GildedRose;
use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Item;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class SulfurasItemsTest extends TestCase
{
    #[Test]
    #[DataProvider('providesSulfurasItems')]
    public function itUpdatesSulfurasItemsBeforeSellDate(Item $gildedRose)
    {
        $gildedRose = new GildedRose([$gildedRose]);
        $gildedRose->updateQuality();

        $this->assertEquals(10, $gildedRose->getItems()[0]->quality);
        $this->assertEquals(5, $gildedRose->getItems()[0]->sellIn);
    }

    public static function providesSulfurasItems()
    {
        return [
            "Sulfuras before sell date" => [new Item("Sulfuras, Hand of Ragnaros", 10, 5)],
        ];
    }

    #[Test]
    #[DataProvider('providesSulfurasItemsOnSellDate')]
    public function itUpdatesSulfurasItemsOnSellDate(Item $gildedRose)
    {
        $gildedRose = new GildedRose([$gildedRose]);
        $gildedRose->updateQuality();

        $this->assertEquals(10, $gildedRose->getItems()[0]->quality);
        $this->assertEquals(0, $gildedRose->getItems()[0]->sellIn);
    }

    public static function providesSulfurasItemsOnSellDate()
    {
        return [
            "Sulfuras on sell date" => [new Item("Sulfuras, Hand of Ragnaros", 10, 0)],
        ];
    }

    #[Test]
    #[DataProvider('providesSulfurasItemsAfterSellDate')]
    public function itUpdatesSulfurasItemsAfterSellDate(Item $gildedRose)
    {
        $gildedRose = new GildedRose([$gildedRose]);
        $gildedRose->updateQuality();

        $this->assertEquals(10, $gildedRose->getItems()[0]->quality);
        $this->assertEquals(-1, $gildedRose->getItems()[0]->sellIn);
    }

    public static function providesSulfurasItemsAfterSellDate()
    {
        return [
            "Sulfuras after sell date" => [new Item("Sulfuras, Hand of Ragnaros", 10, -1)],
        ];
    }
}
