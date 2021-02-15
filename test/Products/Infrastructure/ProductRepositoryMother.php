<?php


namespace PsWs\Test\Products\Infrastructure;


use PsWs\Manufacturers\Domain\ManufacturerId;
use PsWs\Products\Domain\Ean13;
use PsWs\Products\Domain\Product;
use PsWs\Products\Domain\ProductId;
use PsWs\Products\Domain\ProductRepository;
use PsWs\Suppliers\Domain\SupplierId;
use PsWs\Test\Products\Domain\CreateProductRequestMother;
use PsWs\Test\Products\Domain\ProductMother;

/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class ProductRepositoryMother implements ProductRepository
{

    public function save(Product $product) : ProductId
    {
        return new ProductId(1);
    }

    public function searchById(ProductId $id): ?Product
    {
        if($id->value() === 99){
            return null;
        } else {
            return ProductMother::createValid();
        }
    }

    public function searchByEan(Ean13 $ean13): ?Product
    {
        return null;
    }

    public function searchBySupplierId(SupplierId $id): ?array
    {
        return [];
    }

    public function searchByManufacturersId(ManufacturerId $id): ?array
    {
        return [];
    }


    public function delete(ProductId $id): void
    {

    }
}