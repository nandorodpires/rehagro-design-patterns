<?php 

namespace App\Models;

use App\Models\RequestStatus\RequestStatus;
use App\Models\RequestStatus\RequestStatusPending;

class Request {
    public string $id;
    public int $items;
    public float $value;    
    public $state;  
    public Freight $freight;    
    public RequestStatus $status;

    public function __construct()
    {
        $this->status = new RequestStatusPending();
    }
}