<?php


namespace PsWs\Products\Infrastructure\PrestaShop;


use ProductTo;
use PsWs\Manufacturers\Domain\ManufacturerId;
use PsWs\Products\Domain\Ean13;
use PsWs\Products\Domain\Product;
use PsWs\Products\Domain\ProductId;
use PsWs\Products\Domain\ProductRepository as InterfaceProductRepository;
use PsWs\Shared\Domain\SimpleXmlElementExtended;
use PsWs\Shared\Infrastructure\PrestaShop\PsWs;
use PsWs\Suppliers\Domain\SupplierId;
use SimpleXMLElement;


/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class ProductRepository implements InterfaceProductRepository
{

    private $options = [];


    public function __construct()
    {
        $this->options['resource'] = 'products';
    }


    public function save(Product $product): ProductId
    {
        $xml = ProductTo::xml($product);
        $this->options['body'] = $xml;
        $response = 1;
        return new ProductId($response);
    }

    public function searchById(ProductId $id): ?Product
    {
        // TODO: Implement searchById() method.
    }

    public function searchByEan(Ean13 $ean13): ?Product
    {
        // TODO: Implement searchByEan() method.
    }

    public function searchBySupplierId(SupplierId $id): ?array
    {
        // TODO: Implement searchBySupplierId() method.
    }

    public function searchByManufacturersId(ManufacturerId $id): ?array
    {
        // TODO: Implement searchByManufacturersId() method.
    }





}