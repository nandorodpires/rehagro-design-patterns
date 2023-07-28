<?php

namespace App\Repositories;

use App\Models\State;
use App\Repositories\AbstractRepository;

class StateRepository extends AbstractRepository
{
    public function getStateByCode($code) : State
    {
        $states = State::$codes;
        $key = array_search($code, $states);     

        if ($key === false) return null;   

        $state = new State();
        $state->code = $states[$key];

        return  $state;
    }
}
