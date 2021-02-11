<?php


namespace PsWs\Test\Products\Infrastructure;


use PsWs\Manufacturers\Domain\ManufacturerId;
use PsWs\Products\Domain\Ean13;
use PsWs\Products\Domain\Product;
use PsWs\Products\Domain\ProductId;
use PsWs\Products\Domain\ProductRepository;
use PsWs\Suppliers\Domain\SupplierId;

/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class ProductRepositoryMother implements ProductRepository
{
    const PS_SHOP_PATH = 'http://localhost';
    const PS_WS_AUTH_KEY = 'YJ5F3CQUJTPDXEU1FNCCQVG6NUN6EKZB';


    public function save(Product $product) : ProductId
    {
        return new ProductId(1);
    }

    public function searchById(ProductId $id): ?Product
    {
        return null;
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


}