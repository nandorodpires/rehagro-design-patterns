<?php

namespace App\Services\Cashbacks;

use App\Models\Request;

class CashbackUnder100 extends CashbackAbstract
{
    public function calculate(Request $request)
    {
        if ($request->value <= 100) return 10;
        return $this->nextCashback->calculate($request);
    }
}
