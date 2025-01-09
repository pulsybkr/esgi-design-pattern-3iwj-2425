<?php

declare(strict_types=1);

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose\Strategy;

use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Item;

class AgedBrieStrategy implements ItemUpdateStrategy
{
    public function updateQuality(Item $item): void
    {
        if ($item->quality < 50) {
            $item->quality++;
        }
        
        $item->sellIn--;
        
        if ($item->sellIn < 0 && $item->quality < 50) {
            $item->quality++;
        }
    }
} 