<?php

require '../../vendor/autoload.php';

use App\Controllers\RequestController;
use App\Repositories\ItemRepository;
use App\Services\ExportRequestContentService;
use App\Services\ExportRequestXmlService;
use App\Services\ExportRequestZipService;

try {
    $itemRepository = new ItemRepository();
    $item1 = $itemRepository->create('Notebook', 1500.99);
    $item2 = $itemRepository->create('Smartphone', 3500.99);
    $itemRepository->addItem($item1);
    $itemRepository->addItem($item2);

    $requestController = new RequestController();
    $request = $requestController->create($itemRepository->getItems(), 'MG');

    $exportContent = new ExportRequestContentService($request);
    $exportFile = new ExportRequestZipService($exportContent, 'request');
    $exportFile->exportFile();
    
} catch (\Throwable $th) {
    echo $th->getMessage();
}