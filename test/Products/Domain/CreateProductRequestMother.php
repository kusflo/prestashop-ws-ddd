<?php


namespace PsWs\Test\Products\Domain;


use PsWs\Products\Application\Create\CreateProductRequest;

/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class CreateProductRequestMother extends CreateProductRequest
{

    public static function createErrorRequest(): CreateProductRequest
    {
        return new CreateProductRequestMother(
            '1', '1', '1',
            'WRONG_EAN', '1', '01-01-2021',
            '01-01-2021', 'Product Name', 'Long Description',
            'Short Description'
        );
    }

    public static function createValidRequest(): CreateProductRequest
    {
        return new CreateProductRequestMother(
            '1', '1', '1',
             '0000000000001', '1','01-01-2021',
            '01-01-2021', 'Product Name', 'Long Description',
            'Short Description'
        );
    }

}