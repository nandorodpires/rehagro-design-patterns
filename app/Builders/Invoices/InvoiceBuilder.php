<?php

namespace App\Builders\Invoices;

use App\Models\Invoice;
use App\Models\Item;
use DateTimeInterface;

abstract class InvoiceBuilder
{
    protected Invoice $invoice;

    public function __construct()
    {
        $this->invoice = new Invoice();
    }

    public function document(string $document): self
    {
        $this->invoice->document = $document;
        return $this;
    }

    public function enterprise(string $enterprise): self
    {
        $this->invoice->enterprise = $enterprise;
        return $this;
    }

    public function date(DateTimeInterface $date): self
    {
        $this->invoice->date = $date;
        return $this;
    }

    public function addItem(Item $item): self
    {
        $this->invoice->items[] = $item;
        return $this;
    }

    public abstract function build(): Invoice;
}
