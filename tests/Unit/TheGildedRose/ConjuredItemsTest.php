<?php

use EdemotsCourses\EsgiDesignPattern\TheGildedRose\GildedRose;
use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Item;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ConjuredItemsTest extends TestCase
{
    #[Test]
    #[DataProvider('providesConjuredCakeItems')]
    public function itUpdatesConjuredCakeItemsBeforeSellDate(Item $gildedRose, $expectedQuality, $expectedSellIn)
    {
        $gildedRose = new GildedRose([$gildedRose]);
        $gildedRose->updateQuality();

        $this->assertEquals($expectedQuality, $gildedRose->getItems()[0]->quality);
        $this->assertEquals($expectedSellIn, $gildedRose->getItems()[0]->sellIn);
    }

    public static function providesConjuredCakeItems()
    {
        return [
            "Conjured Mana Cake before sell date" => [new Item("Conjured Mana Cake", 10, 10), 8, 9],
            "Conjured Mana Cake at zero quality" => [new Item("Conjured Mana Cake", 0, 10), 0, 9],
            "Conjured Mana Cake on sell date" => [new Item("Conjured Mana Cake", 10, 0), 6, -1],
            "Conjured Mana Cake on sell date, zero quality" => [new Item("Conjured Mana Cake", 0, 0), 0, -1],
            "Conjured Mana Cake after sell date" => [new Item("Conjured Mana Cake", 10, -10), 6, -11],
            "Conjured Mana Cake after sell date, zero quality" => [new Item("Conjured Mana Cake", 0, -10), 0, -11],
        ];
    }
}
