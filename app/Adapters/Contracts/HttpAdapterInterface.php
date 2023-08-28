<?php

namespace App\Adapters\Contracts;

interface HttpAdapterInterface
{    
    public function setBaseUrl(string $baseUrl);
    public function get(array $params = []);
    public function post(array $data = []);
}
