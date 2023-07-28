<?php

namespace App\Services\Freights;

use App\Services\Contracts\FreightInterface;

class FreightSP implements FreightInterface
{
    public function calculate(): float
    {
        return 20;
    }
}
