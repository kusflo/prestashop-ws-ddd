<?php


namespace PsWs\Test\Products\Infrastructure\PrestaShop;


use PsWs\Products\Infrastructure\PrestaShop\ProductRepository;
use SimpleXMLElement;


/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class ProductRepositoryTest extends ProductRepository
{

    protected function blankXml(): SimpleXMLElement
    {
        return new SimpleXMLElement(file_get_contents(__DIR__ . '/product_blank.xml'));
    }


    protected function add(array $options): SimpleXMLElement
    {
        return new SimpleXMLElement(file_get_contents(__DIR__ . '/product_save.xml'));
    }


}