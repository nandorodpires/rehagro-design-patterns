<?php

namespace App\Adapters;

use App\Adapters\Contracts\HttpAdapterInterface;
use GuzzleHttp\Client;

class GuzzleHttpAdapter implements HttpAdapterInterface
{
    protected Client $httpClient;
    protected string $baseUrl;

    public function __construct()
    {
        $this->httpClient = new Client();
    }

    public function setBaseUrl(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    public function get(array $params = [])
    {
        try {
            $response = $this->httpClient->request('GET', $this->baseUrl);        
            return $response->getBody()->getContents();    
        } catch (\GuzzleHttp\Exception\ClientException $th) {            
            $error = \GuzzleHttp\Psr7\Message::toString($th->getResponse());
            throw new \Exception($error, 1);             
        }        
    }

    public function post(array $data = [])
    {
    }
}
