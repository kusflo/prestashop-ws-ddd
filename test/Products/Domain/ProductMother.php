<?php


namespace PsWs\Test\Products\Domain;


use DateTimeImmutable;
use PsWs\Manufacturers\Domain\ManufacturerId;
use PsWs\Products\Domain\Active;
use PsWs\Products\Domain\Description;
use PsWs\Products\Domain\DescriptionShort;
use PsWs\Products\Domain\Ean13;
use PsWs\Products\Domain\Name;
use PsWs\Products\Domain\Price;
use PsWs\Products\Domain\Product;
use PsWs\Products\Domain\ProductId;
use PsWs\Shared\Domain\Quantity;
use PsWs\Suppliers\Domain\SupplierId;

/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class ProductMother
{

    public static function createValid()
    {
        return new Product(
            new Price(1),
            new ProductId(1),
            new ManufacturerId(1),
            new SupplierId(1),
            new Quantity(1),
            new Ean13(1111111111111),
            new Active(1),
            new DateTimeImmutable(),
            new DateTimeImmutable(),
            new Name('Test Product'),
            new Description('Test Product Description'),
            new DescriptionShort('Test Product Short Description')
        );

    }

}