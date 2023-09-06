<?php

namespace App\Builders\Invoices;

use App\Models\Invoice;

class InvoiceProduct extends InvoiceBuilder
{
    public function build() : Invoice
    {
        $this->invoice->tax = $this->invoice->totalItems() * 0.15;
        return $this->invoice;
    }
}
