<?php

declare(strict_types=1);

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose;

final class GildedRose
{
    private ItemFactory $itemFactory;

    /**
     * @param Item[] $items
     */
    public function __construct(
        private array $items
    ) {
        $this->itemFactory = new ItemFactory();
        $this->initializeItems();
    }

    private function initializeItems(): void
    {
        foreach ($this->items as $item) {
            $newItem = $this->itemFactory->createItem($item->name, $item->quality, $item->sellIn);
            $item->setUpdateStrategy($newItem->getUpdateStrategy());
        }
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $item->tick();
        }
    }
}
