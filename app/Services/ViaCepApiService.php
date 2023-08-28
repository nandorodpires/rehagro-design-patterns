<?php

namespace App\Services;

use App\Adapters\Contracts\HttpAdapterInterface;
use App\Adapters\FileGetContentsAdapter;

class ViaCepApiService {

    protected ?HttpAdapterInterface $httpAdapter;
    protected string $baseUrl; 

    public function __construct(?HttpAdapterInterface $httpAdapter = null)
    {
        $this->baseUrl = "https://viacep.com.br/ws/";
        if ($httpAdapter) $this->httpAdapter = $httpAdapter;        
        else $this->httpAdapter = new FileGetContentsAdapter();
    }

    public function getAddress(string $cep) {
        $this->baseUrl .= $cep . "/json/";
        $this->httpAdapter->setBaseUrl($this->baseUrl);
        $response = $this->httpAdapter->get();
        return $response;
    }
}