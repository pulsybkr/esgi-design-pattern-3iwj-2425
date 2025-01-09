<?php

declare(strict_types=1);

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose\Strategy;

use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Item;

class StandardItemStrategy extends AbstractItemStrategy
{
    public function updateQuality(Item $item): void
    {
        $this->decreaseQuality($item);
        $this->updateSellIn($item);
        
        if ($item->sellIn < 0) {
            $this->decreaseQuality($item);
        }
        
        $this->ensureQualityInBounds($item);
    }
} 