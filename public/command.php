<?php

use App\Controllers\RequestController;

require '../vendor/autoload.php';

try {
    $requestController = new RequestController();
    $request = $requestController->create(2, 109.9, 'MG');
    $requestController->approve($request);
    $requestController->notify($request);
} catch (\Throwable $th) {
    echo $th->getMessage();
}
