<?php


namespace PsWs\Products\Domain;

use PsWs\Manufacturers\Domain\ManufacturerId;
use PsWs\Suppliers\Domain\SupplierId;

/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
interface ProductRepository
{
    public function save(Product $product): ProductId;

    public function delete(ProductId $id): void;

    public function searchById(ProductId $id): ?Product;

    public function searchByEan(Ean13 $ean13): ?Product;

    public function searchBySupplierId(SupplierId $id): ?array;

    public function searchByManufacturersId(ManufacturerId $id): ?array;

}