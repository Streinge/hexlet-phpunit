<?php

namespace Hexlet\Phpunit;

class Cart
{
    private $items = [];

    public function addItem(array $good, int $count): void
    {
        $this->items[] = ['good' => $good, 'count' => $count];
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getCount(): int
    {
        return array_reduce($this->items, fn ($acc, $item) => $acc + $item['count'], 0);
    }

    public function getCost(): int
    {
        return array_reduce($this->items, fn ($acc, $item) => $acc + $item['good']['price'] * $item['count']);
    }
}
