<?php

declare(strict_types=1);

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose;

use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Constants\ItemConstants;
use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Strategy\AgedBrieStrategy;
use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Strategy\BackstagePassStrategy;
use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Strategy\ConjuredItemStrategy;
use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Strategy\StandardItemStrategy;
use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Strategy\SulfurasStrategy;

class ItemFactory
{
    public function createItem(string $name, int $quality, int $sellIn): Item
    {
        $item = new Item($name, $quality, $sellIn);
        
        $strategy = match ($name) {
            ItemConstants::AGED_BRIE => new AgedBrieStrategy(),
            ItemConstants::BACKSTAGE_PASS => new BackstagePassStrategy(),
            ItemConstants::SULFURAS => new SulfurasStrategy(),
            ItemConstants::CONJURED => new ConjuredItemStrategy(),
            default => new StandardItemStrategy(),
        };
        
        $item->setUpdateStrategy($strategy);
        return $item;
    }
} 