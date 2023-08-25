<?php

use App\Controllers\RequestController;

require '../../vendor/autoload.php';

try {
    $requestController = new RequestController();
    $request = $requestController->create([], 'MG');
    $requestController->approve($request);
    $requestController->notify($request);
} catch (\Throwable $th) {
    echo $th->getMessage();
}
