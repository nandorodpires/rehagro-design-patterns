<?php

namespace App\Services;

use App\Models\Request;
use App\Services\Cashbacks\CashbackOver100Under199;
use App\Services\Cashbacks\CashbackUnder100;
use App\Services\Cashbacks\CashbackZero;

class CashbackService
{
    public function calculate(Request $request)
    {
        $cashbacks = new CashbackUnder100(
            new CashbackOver100Under199(                
                new CashbackZero()                
            )
        );

        return $cashbacks->calculate($request);
    }
}
