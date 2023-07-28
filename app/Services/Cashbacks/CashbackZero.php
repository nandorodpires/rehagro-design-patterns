<?php

namespace App\Services\Cashbacks;

use App\Models\Request;

class CashbackZero extends CashbackAbstract
{
    public function calculate(Request $request)
    {
        return 0;
    }
}
