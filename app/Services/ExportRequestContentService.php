<?php

namespace App\Services;

use App\Models\Request;
use App\Services\Contracts\ExportContentInterface;

class ExportRequestContentService implements ExportContentInterface {

    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function content() : array
    {
        return [
            'id' => $this->request->id,
            'state'=> $this->request->state->code,
            'status' => $this->request->status->name,
            'freight' => $this->request->freight->value
        ];
    }
}