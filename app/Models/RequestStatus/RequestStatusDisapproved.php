<?php

namespace App\Models\RequestStatus;

use App\Models\Request;

class RequestStatusDisapproved extends RequestStatus {
    public $name = 'Pagamento não aprovado';

    public function cancel(Request $request)
    {
        $request->status = new RequestStatusCanceled();
    }
}