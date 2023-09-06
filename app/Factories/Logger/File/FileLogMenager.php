<?php

namespace App\Factories\Logger\File;

use App\Factories\Logger\Contracts\LogWritterInterface;
use App\Factories\Logger\LogMenager;

class FileLogMenager extends LogMenager
{
    protected string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function factoryLogWritter(): LogWritterInterface
    {
        return new FileLogWritter($this->path);
    }
}
