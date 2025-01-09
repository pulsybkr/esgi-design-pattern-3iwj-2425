<?php

declare(strict_types=1);

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose;

class Item
{
    public function __construct(
        public string $name,
        public int $quality,
        public int $sellIn
    ) {
    }

    public function tick()
    {
    }
}
