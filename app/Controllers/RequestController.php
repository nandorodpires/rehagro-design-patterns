<?php

namespace App\Controllers;

use App\Handlers\RequestHandler;
use App\Jobs\Request\NotifyCustomerApproved;
use App\Jobs\Request\NotifyShippingJob;
use App\Models\Request;
use App\Repositories\StateRepository;
use App\Repositories\RequestRepository;
use DomainException;

class RequestController
{
    protected RequestRepository $requestRepository;
    protected RequestHandler $requesHandler;

    public function __construct()
    {
        $this->requestRepository = new RequestRepository;
        $this->requesHandler = new RequestHandler;
    }

    public function create(int $items, float $value, string $state_code)
    {
        $stateRepository = new StateRepository();
        $state = $stateRepository->getStateByCode($state_code); 
        try {
            $request = $this->requestRepository->create($items, $value, $state);
            return $request;
        } catch (\Throwable $th) {
            throw new DomainException($th->getMessage());
        }        
    }

    public function approve(Request $request) {
        $this->requestRepository->approve($request);
    }

    public function cancel(Request $request) {
        $this->requestRepository->cancel($request);
    }

    public function notify(Request $request) {
        $this->requesHandler = new RequestHandler();
        $this->requesHandler->add(new NotifyShippingJob($request));
        $this->requesHandler->add(new NotifyCustomerApproved($request));
        $this->requesHandler->execute();
    }

    public function get() {
        return $this->requestRepository->getIterator();
    }
}
