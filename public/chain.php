<?php

use App\Models\State;
use App\Repositories\RequestRepository;
use App\Services\CashbackService;

require '../vendor/autoload.php';

$state = new State();
$state->code = 'MG';

try {
    $requestRepository = new RequestRepository();
    $request = $requestRepository->create(10, 199, $state);

    $cashbackService = new CashbackService();
    $cashback = $cashbackService->calculate($request);
    echo "Cashback: R$" . number_format($cashback, 2, ',', '.');
} catch (\Throwable $th) {
    echo $th->getMessage();
}                                  