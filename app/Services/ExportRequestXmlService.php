<?php

namespace App\Services;

use App\Services\Contracts\ExportContentInterface;
use App\Services\Contracts\ExportFileInterface;
use SimpleXMLElement;

class ExportRequestXmlService implements ExportFileInterface {

    protected ExportContentInterface $exportContent;
    protected string $element;
    protected SimpleXMLElement $xml;

    public function __construct(ExportContentInterface $exportContent, string $element)
    {
        $this->exportContent = $exportContent;
        $this->element = $element;
        $this->xml = new SimpleXMLElement("<{$this->element} />");
    }

    public function exportFile()
    {
        $content = $this->exportContent->content();        
        $name = 'request_' .  $content['id'] . '.xml';
        $path = '../../storage/requests/' . $name;
        foreach ($content as $item => $value) {
            $this->xml->addChild($item, $value);
        }        
        return $this->xml->asXML($path);
    }
}