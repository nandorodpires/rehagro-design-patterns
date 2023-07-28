<?php

namespace App\Repositories;

use App\Models\Freight;
use App\Models\Request;
use App\Models\State;
use App\Services\Freights\FreightBA;
use App\Services\Freights\FreightMG;
use App\Services\Freights\FreightSP;
use App\Services\FreightService;
use DomainException;

class RequestRepository extends AbstractRepository
{
    protected array $collection = [];
    protected $entity = Request::class;

    public function create(int $items, float $value, State $state): Request
    {
        $freight = new Freight();
        $freight->value = $this->getFreightValue($state);
        $freight->days = Freight::DAYS_DEFAULT;

        $request = new Request();
        $request->id = uniqid();
        $request->items = $items;
        $request->value = $value;
        $request->state = $state;
        $request->freight = $freight;

        $this->collectionAdd($request);

        return $request;
    }

    public function approve(Request $request)
    {
        $request->status->approve($request);
    }

    public function disapprove(Request $request)
    {
        $request->status->disapprove($request);
    }

    public function cancel(Request $request)
    {
        $request->status->cancel($request);
    }

    protected function getFreightValue(State $state)
    {
        $freightService = new FreightService();

        switch ($state->code) {
            case 'MG':
                $freight = new FreightMG();
                break;
            case 'SP':
                $freight = new FreightSP();
                break;
            case 'BA':
                $freight = new FreightBA();
                break;
            default:
                throw new DomainException('Não entregamos neste estado!');
                break;
        }

        return $freightService->getFreight($freight);
    }

}
