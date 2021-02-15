<?php


namespace PsWs\Products\Domain;

use DateTimeImmutable;
use PsWs\Manufacturers\Domain\ManufacturerId;
use PsWs\Products\Application\Create\CreateProductRequest;
use PsWs\Products\Application\Find\FindProductResponse;
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
            new DateTimeImmutable($request->dateAdd()),
            new DateTimeImmutable($request->dateUpdate()),
            new Name($request->name()),
            new Description($request->description()),
            new DescriptionShort($request->description())
        );
    }

    public static function simple(FindProductResponse $response) : Product
    {
        return new Product(
            new Price($response->price()),
            new ProductId($response->id()),
            new ManufacturerId($response->manufacturerId()),
            new SupplierId($response->supplierId()),
            new Quantity($response->quantity()),
            new Ean13($response->ean13()),
            new Active($response->active()),
            new DateTimeImmutable($response->dateAdd()),
            new DateTimeImmutable($response->dateUpdate()),
            new Name($response->name()),
            new Description($response->description()),
            new DescriptionShort($response->descriptionShort())
        );
    }
    
    
    

}