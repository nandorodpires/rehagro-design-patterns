<?php

namespace App\Adapters;

use App\Adapters\Contracts\HttpAdapterInterface;

class FileGetContentsAdapter implements HttpAdapterInterface
{
    protected string $baseUrl;

    public function __construct()
    {
        
    }

    public function setBaseUrl(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function get(array $params = [])
    {
        if (!empty($params)) {
            $this->baseUrl .= "?";
            foreach ($params as $key => $value) {
                $this->baseUrl .= "{$key}={$value}&";
            }
        }

        try {
            return file_get_contents($this->baseUrl);    
        } catch (\Throwable $th) {
            throw new \Exception("Ops... Houve um erro na sua requisição", 1);               
        }        
    }

    public function post(array $data = [])
    {
    }
}
