<?php

use App\Controllers\RequestController;

require '../vendor/autoload.php';

try {
    $requestController = new RequestController();
    $request1 = $requestController->create(2, 109.9, 'MG');
    $requestController->approve($request1);

    $request2 = $requestController->create(3, 59.99, 'SP');
    $requestController->cancel($request2);

    $request3 = $requestController->create(4, 273.01, 'BA');

    $requests = $requestController->get();
    
    foreach ($requests as $request) {
        echo "Pedido #" . $request->id . PHP_EOL;
        echo "Items: " . $request->items . PHP_EOL;
        echo "valor: " . $request->value . PHP_EOL;
        echo "Frete: " . $request->freight->value . PHP_EOL;
        echo "UF: " . $request->state->code . PHP_EOL;
        echo "Status: " . $request->status->name . PHP_EOL;
        echo PHP_EOL;
    }

} catch (\Throwable $th) {
    echo $th->getMessage();
}
