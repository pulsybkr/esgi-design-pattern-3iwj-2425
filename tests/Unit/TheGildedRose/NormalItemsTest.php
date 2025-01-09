<?php

use EdemotsCourses\EsgiDesignPattern\TheGildedRose\GildedRose;
use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Item;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class NormalItemsTest extends TestCase
{
    #[Test]
    #[DataProvider('providesNormalItems')]
    public function itUpdatesNormalItemsBeforeSellDate(Item $gildedRose)
    {
        $gildedRose = new GildedRose([$gildedRose]);
        $gildedRose->updateQuality();

        $this->assertEquals(9, $gildedRose->getItems()[0]->quality);
        $this->assertEquals(4, $gildedRose->getItems()[0]->sellIn);
    }

    public static function providesNormalItems()
    {
        return [
            "Normal item before sell date" => [new Item("normal", 10, 5)],
        ];
    }

    #[Test]
    #[DataProvider('providesNormalItemsOnSellDate')]
    public function itUpdatesNormalItemsOnSellDate(Item $gildedRose)
    {
        $gildedRose = new GildedRose([$gildedRose]);
        $gildedRose->updateQuality();

        $this->assertEquals(8, $gildedRose->getItems()[0]->quality);
        $this->assertEquals(-1, $gildedRose->getItems()[0]->sellIn);
    }

    public static function providesNormalItemsOnSellDate()
    {
        return [
            "Normal item on sell date" => [new Item("normal", 10, 0)],
        ];
    }

    #[Test]
    #[DataProvider('providesNormalItemsAfterSellDate')]
    public function itUpdatesNormalItemsAfterSellDate(Item $gildedRose)
    {
        $gildedRose = new GildedRose([$gildedRose]);
        $gildedRose->updateQuality();

        $this->assertEquals(8, $gildedRose->getItems()[0]->quality);
        $this->assertEquals(-6, $gildedRose->getItems()[0]->sellIn);
    }

    public static function providesNormalItemsAfterSellDate()
    {
        return [
            "Normal item after sell date" => [new Item("normal", 10, -5)],
        ];
    }

    #[Test]
    #[DataProvider('providesNormalItemsWithQualityOfZero')]
    public function itUpdatesNormalItemsWithQualityOfZero(Item $gildedRose)
    {
        $gildedRose = new GildedRose([$gildedRose]);
        $gildedRose->updateQuality();

        $this->assertEquals(0, $gildedRose->getItems()[0]->quality);
        $this->assertEquals(4, $gildedRose->getItems()[0]->sellIn);
    }

    public static function providesNormalItemsWithQualityOfZero()
    {
        return [
            "Normal item, zero quality" => [new Item("normal", 0, 5)],
        ];
    }
}
