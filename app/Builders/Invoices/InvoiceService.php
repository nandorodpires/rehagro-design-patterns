<?php

namespace App\Builders\Invoices;

use App\Models\Invoice;

class InvoiceService extends InvoiceBuilder
{
    public function build() : Invoice
    {
        $this->invoice->tax = $this->invoice->totalItems() * 0.06;
        return $this->invoice;
    }
}
