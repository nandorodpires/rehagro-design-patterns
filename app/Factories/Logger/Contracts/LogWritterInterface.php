<?php

namespace App\Factories\Logger\Contracts;

interface LogWritterInterface
{
    public function writte(string $log): void;
}
