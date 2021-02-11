<?php

use PsWs\Products\Domain\Product;
use PsWs\Shared\Domain\SimpleXmlElementExtended;


/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/

class ProductTo
{
    const XML_FILE = 'product_template.xml';

    public static function xml(Product $product)
    {
        $simpleXml = new SimpleXmlElementExtended(self::XML_FILE);
        $simpleXml->product->price->addCDATA($product->price()->value());
        $simpleXml->product->id_manufacturer->addCDATA($product->manufacturerId()->value());
        $simpleXml->product->id_supplier->addCDATA($product->supplierId()->value());
        $simpleXml->product->ean13->addCDATA($product->ean13()->value());
        $simpleXml->product->active->addCDATA($product->isActive()->value());
        $simpleXml->product->date_add->addCDATA($product->dateAdd()->format('Y-m-d H:i:s'));
        $simpleXml->product->date_upd->addCDATA($product->dateUpdate()->format('Y-m-d H:i:s'));
        $simpleXml->product->name->language->addCDATA($product->name()->value());
        $simpleXml->product->description->language->addCDATA($product->description()->value());
        $simpleXml->product->description_short->language->addCDATA($product->descriptionShort()->value());

        return $simpleXml->asXML();

    }

}