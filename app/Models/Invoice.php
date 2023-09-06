<?php

namespace App\Models;

use DateTime;

class Invoice
{
    public string $document;
    public string $enterprise;
    public array $items;
    public DateTime $date;
    public float $tax;

    public function totalItems(): float
    {
        return array_reduce($this->items, function ($total, Item $item) {
            return $total + $item->getValue();
        }, 0);
    }

    public function totalTax(): float
    {
        return $this->tax;
    }

    public function totalInvoice(): float
    {
        return $this->totalItems() + $this->totalTax();
    }
}
