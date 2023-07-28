<?php

namespace App\Services\Cashbacks;

use App\Models\Request;

class CashbackOver100Under199 extends CashbackAbstract
{
    public function calculate(Request $request)
    {
        if ($request->value > 100 && $request->value <= 199) return 20;
        return $this->nextCashback->calculate($request);
    }
}
