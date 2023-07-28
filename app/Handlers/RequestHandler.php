<?php 

namespace App\Handlers;

use App\Jobs\Contracts\RequestJobInterface;

class RequestHandler {
    
    /**
     * @var RequestJobInterface
     */
    private array $actions = [];

    public function add(RequestJobInterface $action) {
        $this->actions[] = $action;
    }

    public function execute() {
        foreach ($this->actions as $action) {
            $action->execute();
        }
    }
}