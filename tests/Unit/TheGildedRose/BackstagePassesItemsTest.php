<?php

use EdemotsCourses\EsgiDesignPattern\TheGildedRose\GildedRose;
use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Item;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class BackstagePassesItemsTest extends TestCase
{
    #[Test]
    #[DataProvider('providesBackstagePassesItems')]
    public function itUpdatesBackstagePassesItemsBeforeSellDate(Item $gildedRose, $expectedQuality, $expectedSellIn)
    {
        $gildedRose = new GildedRose([$gildedRose]);
        $gildedRose->updateQuality();

        $this->assertEquals($expectedQuality, $gildedRose->getItems()[0]->quality);
        $this->assertEquals($expectedSellIn, $gildedRose->getItems()[0]->sellIn);
    }

    public static function providesBackstagePassesItems()
    {
        return [
            "Backstage passes long before sell date" => [new Item("Backstage passes to a TAFKAL80ETC concert", 10, 11), 11, 10],
            "Backstage passes close to sell date" => [new Item("Backstage passes to a TAFKAL80ETC concert", 10, 10), 12, 9],
            "Backstage passes close to sell date, max quality" => [new Item("Backstage passes to a TAFKAL80ETC concert", 50, 10), 50, 9],
            "Backstage passes very close to sell date" => [new Item("Backstage passes to a TAFKAL80ETC concert", 10, 5), 13, 4],
            "Backstage passes very close to sell date, max quality" => [new Item("Backstage passes to a TAFKAL80ETC concert", 50, 5), 50, 4],
            "Backstage passes on day left to sell" => [new Item("Backstage passes to a TAFKAL80ETC concert", 50, 1), 50, 0],
            "Backstage passes on sell date" => [new Item("Backstage passes to a TAFKAL80ETC concert", 10, 0), 0, -1],
            "Backstage passes after sell date" => [new Item("Backstage passes to a TAFKAL80ETC concert", 10, -1), 0, -2],
        ];
    }
}
