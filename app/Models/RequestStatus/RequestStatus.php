<?php

namespace App\Models\RequestStatus;

use App\Models\Request;

abstract class RequestStatus
{
    public $name;

    public function approve(Request $request)
    {
        throw new \DomainException('Este pedido não pode ser aprovado');
    }

    public function disapprove(Request $request)
    {
        throw new \DomainException('Este pedido não pode ser reprovado');
    }

    public function cancel(Request $request)
    {
        throw new \DomainException('Este pedido não pode ser cancelado');
    }
}
