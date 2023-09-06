<?php

use App\Builders\Invoices\InvoiceProduct;
use App\Builders\Invoices\InvoiceService;
use App\Models\Item;

require '../../vendor/autoload.php';

$invoiceBuilder = new InvoiceProduct();
$invoiceBuilder->document('12346')
    ->enterprise('stylesheets')
    ->date(new DateTime());

$item1 = new Item();
$item1->setValue(100);
$item2 = clone($item1);
$item2->setValue(200);

$invoiceBuilder->addItem($item1)->addItem($item2);

$invoice = $invoiceBuilder->build();
echo $invoice->totalItems() . PHP_EOL;
echo $invoice->totalTax() . PHP_EOL;
echo $invoice->totalInvoice() . PHP_EOL;
