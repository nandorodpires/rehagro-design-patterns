<?php

namespace App\Services;

use App\Services\Contracts\ExportContentInterface;
use App\Services\Contracts\ExportFileInterface;
use ZipArchive;

class ExportRequestZipService implements ExportFileInterface {

    protected ExportContentInterface $exportContent;

    public function __construct(ExportContentInterface $exportContent)
    {
        $this->exportContent = $exportContent;
    }

    public function exportFile()
    {
        $content = $this->exportContent->content();        
        $name = 'request_' .  $content['id'] . '.zip';
        $path = '../../storage/requests/' . $name;
        $zip = new ZipArchive();
        $zip->open($path, ZIPARCHIVE::CREATE);
        $zip->addFromString($name, serialize($content));
        $zip->close();
    }

}