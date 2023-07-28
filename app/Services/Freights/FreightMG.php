<?php

namespace App\Services\Freights;

use App\Models\State;
use App\Services\Contracts\FreightInterface;

class FreightMG implements FreightInterface
{
    public function calculate(): float
    {
        return 10;
    }
}
