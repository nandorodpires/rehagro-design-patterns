<?php

namespace App\Models\RequestStatus;

use App\Models\Request;

class RequestStatusPending extends RequestStatus
{
    public $name = 'Aguardando pagamento';

    public function approve(Request $request)
    {
        $request->status = new RequestStatusApproved();
    }

    public function disapprove(Request $request)
    {
        $request->status = new RequestStatusDisapproved();
    }

    public function cancel(Request $request)
    {
        $request->status = new RequestStatusCanceled();
    }
}
