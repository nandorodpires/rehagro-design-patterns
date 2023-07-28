<?php

namespace App\Services\Freights;

use App\Services\Contracts\FreightInterface;

class FreightBA implements FreightInterface
{
    public function calculate(): float
    {
        return 30;
    }
}
