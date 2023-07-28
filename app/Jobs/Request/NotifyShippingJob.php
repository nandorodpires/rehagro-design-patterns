<?php

namespace App\Jobs\Request;

use App\Jobs\Contracts\RequestJobInterface;
use App\Models\Request;

class NotifyShippingJob implements RequestJobInterface
{    

    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function execute()
    {
        echo "Notificando a transportadora para retirar o pedido #" . $this->request->id . "\n";
    }
}
