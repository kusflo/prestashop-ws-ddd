<?php


namespace PsWs\Test\Products\Infrastructure\PrestaShop;


use PrestaShopWebserviceException;
use PsWs\Products\Infrastructure\PrestaShop\ProductRepository;
use SimpleXMLElement;


/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class ProductRepositoryPrestaShop extends ProductRepository
{
    const MAX_VALID_ID = 1000000;

    protected function blankXml(): SimpleXMLElement
    {
        return new SimpleXMLElement(file_get_contents(__DIR__ . '/product_blank.xml'));
    }


    protected function add(array $options): SimpleXMLElement
    {
        return new SimpleXMLElement(file_get_contents(__DIR__ . '/product_save.xml'));
    }

    protected function get(array $options): SimpleXMLElement
    {
        if($options['id'] > self::MAX_VALID_ID){
            throw new PrestaShopWebserviceException('Test Exception');
        }

        return new SimpleXMLElement(file_get_contents(__DIR__ . '/product_find.xml'));
    }


}