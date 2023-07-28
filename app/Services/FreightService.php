<?php

namespace App\Services;

use App\Services\Contracts\FreightInterface;

class FreightService
{
    public function getFreight(FreightInterface $freight)
    {
        return $freight->calculate();
    }
}
