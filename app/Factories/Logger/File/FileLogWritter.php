<?php

namespace App\Factories\Logger\File;

use App\Factories\Logger\Contracts\LogWritterInterface;

class FileLogWritter implements LogWritterInterface
{
    private $file;

    public function __construct(string $path)
    {
        $this->file = fopen($path, 'a+');
    }

    public function writte(string $log): void
    {
        fwrite($this->file, $log . PHP_EOL);
    }

    public function __destruct()
    {
        fclose($this->file);
    }
}
