<?php

require '../../vendor/autoload.php';

use App\Controllers\RequestController;
use App\Repositories\ItemRepository;

try {
    $itemRepository = new ItemRepository();
    $item1 = $itemRepository->create('Notebook', 1500.99);
    $item2 = $itemRepository->create('Smartphone', 3500.99);
    $itemRepository->addItem($item1);
    $itemRepository->addItem($item2);

    $requestController = new RequestController();
    $request = $requestController->create($itemRepository->getItems(), 'MG');

    echo 'Total do pedido: ' . $request->getTotal() . PHP_EOL;
    
} catch (\Throwable $th) {
    echo $th->getMessage();
}