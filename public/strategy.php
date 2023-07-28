<?php

use App\Models\State;
use App\Repositories\RequestRepository;

require '../vendor/autoload.php';

$state = new State();
$state->code = 'RJ';

try {
    $requestRepository = new RequestRepository();
    $request = $requestRepository->create(10, 50.99, $state);

    echo "Frete: R$" . number_format($request->freight->value, 2, ',', '.');
    echo "\nPrazo: " . $request->freight->days . ' dias';
} catch (\Throwable $th) {
    echo $th->getMessage();
}
