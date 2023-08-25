<?php

use App\Models\State;
use App\Repositories\RequestRepository;

require '../../vendor/autoload.php';

$state = new State();
$state->code = 'MG';

try {
    $requestRepository = new RequestRepository();
    $request = $requestRepository->create([], $state);

    echo "Estado atual: " . $request->status->name . "\n";

    $requestRepository->approve($request);

    echo "Novo estado: " . $request->status->name . "\n";

    $requestRepository->cancel($request);

    echo "Novo estado: " . $request->status->name . "\n";
    
} catch (\Throwable $th) {
    echo $th->getMessage();
}
