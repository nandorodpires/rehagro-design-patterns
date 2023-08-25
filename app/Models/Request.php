<?php 

namespace App\Models;

use App\Models\RequestStatus\RequestStatus;
use App\Models\RequestStatus\RequestStatusPending;

class Request {
    public string $id;
    public array $items;
    public $state;  
    public Freight $freight;    
    public RequestStatus $status;

    public function __construct()
    {
        $this->status = new RequestStatusPending();
    }

    public function getTotal() : float {
        return array_reduce($this->items, function (float $value, Item $item) {
            return $item->getValue() + $value;
        }, 0);
    }
}