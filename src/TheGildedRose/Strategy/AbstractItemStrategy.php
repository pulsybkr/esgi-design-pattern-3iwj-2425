<?php

declare(strict_types=1);

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose\Strategy;

use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Constants\ItemConstants;
use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Item;

abstract class AbstractItemStrategy implements ItemUpdateStrategy
{
    protected function increaseQuality(Item $item): void
    {
        if ($item->quality < ItemConstants::MAX_QUALITY) {
            $item->quality++;
        }
    }

    protected function decreaseQuality(Item $item): void
    {
        if ($item->quality > ItemConstants::MIN_QUALITY) {
            $item->quality--;
        }
    }

    protected function updateSellIn(Item $item): void
    {
        $item->sellIn--;
    }

    protected function ensureQualityInBounds(Item $item): void
    {
        if ($item->quality < ItemConstants::MIN_QUALITY) {
            $item->quality = ItemConstants::MIN_QUALITY;
        }
        if ($item->quality > ItemConstants::MAX_QUALITY) {
            $item->quality = ItemConstants::MAX_QUALITY;
        }
    }
} 