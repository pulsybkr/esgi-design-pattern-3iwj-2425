<?php

declare(strict_types=1);

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose;

use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Strategy\ItemUpdateStrategy;
use EdemotsCourses\EsgiDesignPattern\TheGildedRose\Strategy\StandardItemStrategy;

class Item
{
    protected ItemUpdateStrategy $updateStrategy;

    public function __construct(
        public string $name,
        public int $quality,
        public int $sellIn
    ) {
        $this->updateStrategy = new StandardItemStrategy();
    }

    public function setUpdateStrategy(ItemUpdateStrategy $strategy): void
    {
        $this->updateStrategy = $strategy;
    }

    public function getUpdateStrategy(): ItemUpdateStrategy
    {
        return $this->updateStrategy;
    }

    public function tick(): void
    {
        $this->updateStrategy->updateQuality($this);
    }
}
