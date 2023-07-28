<?php

namespace App\Models\RequestStatus;

use App\Models\Request;

class RequestStatusApproved extends RequestStatus {
    public $name = 'Pagamento Aprovado';

    public function cancel(Request $request)
    {
        $request->status = new RequestStatusCanceled();
    }
}