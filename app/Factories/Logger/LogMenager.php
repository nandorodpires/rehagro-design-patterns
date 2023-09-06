<?php

namespace App\Factories\Logger;

use App\Factories\Logger\Contracts\LogWritterInterface;

abstract class LogMenager {
    public function log(string $several, string $log) {
        $logWritter = $this->factoryLogWritter();
        $date = date('Y-m-d H:i:s');
        $log = "[$date][$several]: $log";
        $logWritter->writte($log);
    }
    abstract public function factoryLogWritter(): LogWritterInterface;
}