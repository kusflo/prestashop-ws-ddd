<?php


namespace PsWs\Products\Application\Find;


use PsWs\Products\Application\Create\CreateProductRequest;

/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class FindProductResponse extends CreateProductRequest
{
    protected string $id;
    protected string $quantity;

    public function __construct(
        string $id, string $price, string $manufacturerId,
        string $supplierId, string $ean13, string $quantity,
        string $active, string $dateAdd, string $dateUpdate,
        string $name, string $description, string $descriptionShort)
    {
        $this->id = $id;
        $this->quantity = $quantity;
        parent::__construct($price, $manufacturerId, $supplierId, $ean13, $active, $dateAdd, $dateUpdate, $name, $description, $descriptionShort);
    }

    public function id(): string
    {
        return $this->id;
    }

    public function quantity(): string
    {
        return $this->id;
    }

}