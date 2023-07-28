<?php

namespace App\Jobs\Request;

use App\Jobs\Contracts\RequestJobInterface;
use App\Models\Request;

class NotifyCustomerApproved implements RequestJobInterface
{    

    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function execute()
    {
        echo "Notificando o cliente que o pedido #" . $this->request->id . " foi aprovado.\n";
    }
}
