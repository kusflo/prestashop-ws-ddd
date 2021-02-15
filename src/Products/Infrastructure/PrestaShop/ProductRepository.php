<?php


namespace PsWs\Products\Infrastructure\PrestaShop;

use PrestaShopWebserviceException;
use PsWs\Manufacturers\Domain\ManufacturerId;
use PsWs\Products\Application\Create\CreateProductRequest;
use PsWs\Products\Application\Find\FindProductResponse;
use PsWs\Products\Domain\Ean13;
use PsWs\Products\Domain\Product;
use PsWs\Products\Domain\ProductFactory;
use PsWs\Products\Domain\ProductId;
use PsWs\Products\Domain\ProductRepository as InterfaceProductRepository;
use PsWs\Shared\Domain\SimpleXmlElementExtended;
use PsWs\Shared\Infrastructure\PrestaShop\PrestaShopRepository;
use PsWs\Suppliers\Domain\SupplierId;
use SimpleXMLElement;


/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class ProductRepository extends PrestaShopRepository implements InterfaceProductRepository
{

    public function __construct(bool $debug)
    {
        parent::__construct($debug);
        $this->options['resource'] = 'products';
    }


    public function save(Product $product): ProductId
    {
        $this->options['postXml'] = $this->productToXml($product);
        $xml = $this->add($this->options);
        $idProduct = intval($xml->product->id);

        return new ProductId($idProduct);
    }

    public function delete(ProductId $id): void
    {

    }

    public function searchById(ProductId $id): ?Product
    {
        try {
            $this->options['id'] = $id->value();
            $xml = $this->get($this->options);
        } catch (PrestaShopWebserviceException $ex) {

            return null;
        }

        return $this->simpleXmlToProduct($xml);

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


    private function productToXml(Product $product)
    {
        $xml = $this->blankXml()->asXML();
        $simpleXml = new SimpleXmlElementExtended($xml);
        $simpleXml->product->price->addCDATA($product->price()->value());
        $simpleXml->product->id_manufacturer->addCDATA($product->manufacturerId()->value());
        $simpleXml->product->id_supplier->addCDATA($product->supplierId()->value());
        $simpleXml->product->ean13->addCDATA($product->ean13()->value());
        $simpleXml->product->active->addCDATA($product->isActive()->value());
        $simpleXml->product->date_add->addCDATA($product->dateAdd()->format('Y-m-d H:i:s'));
        $simpleXml->product->date_upd->addCDATA($product->dateUpdate()->format('Y-m-d H:i:s'));
        $simpleXml->product->name->language->addCDATA($product->name()->value());
        $simpleXml->product->description->language->addCDATA($product->description()->value());
        $simpleXml->product->description_short->language->addCDATA($product->descriptionShort()->value());

        return $simpleXml->asXML();

    }

    private function simpleXmlToProduct(SimpleXMLElement $simpleXml)
    {

        $response = new FindProductResponse(
            (string) $simpleXml->product->id,
            (string) $simpleXml->product->price,
            (string) $simpleXml->product->id_manufacturer,
            (string) $simpleXml->product->id_supplier,
            (string) $simpleXml->product->ean13,
            (string) $simpleXml->product->quantity,
            (string) $simpleXml->product->active,
            (string) $simpleXml->product->date_add,
            (string) $simpleXml->product->date_upd,
            (string) $simpleXml->product->name->language,
            (string) $simpleXml->product->description->language,
            (string) $simpleXml->product->description_short->language
        );

        return ProductFactory::simple($response);

    }


}