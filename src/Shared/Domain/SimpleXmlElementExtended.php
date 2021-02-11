<?php


namespace PsWs\Shared\Domain;

use SimpleXMLElement;

/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class SimpleXmlElementExtended extends SimpleXMLElement
{

    public function addCDATA($cData)
    {
        $node = dom_import_simplexml($this);
        $no = $node->ownerDocument;
        $defaultNode = $node->childNodes[0];
        $node->replaceChild($no->createCDATASection($cData), $defaultNode);
    }


}