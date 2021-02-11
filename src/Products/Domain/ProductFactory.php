<?php


namespace PsWs\Products\Domain;

use PsWs\Manufacturers\Domain\ManufacturerId;
use PsWs\Products\Application\Create\CreateProductRequest;
use PsWs\Shared\Domain\Quantity;
use PsWs\Suppliers\Domain\SupplierId;

/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class ProductFactory
{

    public static function create(CreateProductRequest $request) : Product
    {
        return new Product(
            new Price($request->price()),
            null,
            new ManufacturerId($request->manufacturerId()),
            new SupplierId($request->supplierId()),
            null,
            new Ean13($request->ean13()),
            new Active($request->active()),
            new \DateTimeImmutable($request->dateAdd()),
            new \DateTimeImmutable($request->dateUpdate()),
            new Name($request->name()),
            new Description($request->name()),
            new DescriptionShort($request->name())
        );
    }

}