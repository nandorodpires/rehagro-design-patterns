<?php

namespace App\Services\Contracts;

interface FreightInterface {
    public function calculate() : float;
}