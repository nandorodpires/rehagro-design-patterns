<?php

namespace App\Services\Cashbacks;

use App\Models\Request;

abstract class CashbackAbstract
{
    protected ?CashbackAbstract $nextCashback;

    public function __construct(?CashbackAbstract $next = null)
    {
        $this->nextCashback = $next;
    }

    abstract public function calculate(Request $request);
}
