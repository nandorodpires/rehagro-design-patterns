<?php

namespace App\Repositories;

use App\Models\Item;

class ItemRepository {

    protected array $collection = [];

    public function create($name, $value) {
        $item = new Item();
        $item->setName($name);
        $item->setValue($value);
        return $item;
    }

    public function addItem(Item $item) {
        $this->collection[] = $item;
        return $this;
    }

    public function getItems() {
        return $this->collection;
    }

}