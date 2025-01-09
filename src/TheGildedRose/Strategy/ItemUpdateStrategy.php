<?php

declare(strict_types=1);

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose\Strategy;

use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Item;

interface ItemUpdateStrategy
{
    public function updateQuality(Item $item): void;
} 