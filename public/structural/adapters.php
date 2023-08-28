<?php

use App\Adapters\GuzzleHttpAdapter;
use App\Services\ViaCepApiService;

require '../../vendor/autoload.php';

$cep = "33234166";

try {
    $viaCepApiService = new ViaCepApiService();
    $address = $viaCepApiService->getAddress($cep);
    print_r($address);
} catch (\Throwable $th) {
    echo $th->getMessage();
}
