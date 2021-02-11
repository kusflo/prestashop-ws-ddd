<?php


namespace PsWs\Products\Application\Create;


/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class CreateProductRequest
{

    private string $price;
    private string $manufacturerId;
    private string $supplierId;
    private string $ean13;
    private string $active;
    private string $dateAdd;
    private string $dateUpdate;
    private string $name;
    private string $description;
    private string $descriptionShort;

    public function __construct(
        string $price, string $manufacturerId, string $supplierId,
        string $ean13, string $active, string $dateAdd,
        string $dateUpdate, string $name, string $description,
        string $descriptionShort
    )
    {
        $this->price = $price;
        $this->manufacturerId = $manufacturerId;
        $this->supplierId = $supplierId;
        $this->ean13 = $ean13;
        $this->active = $active;
        $this->dateAdd = $dateAdd;
        $this->dateUpdate = $dateUpdate;
        $this->name = $name;
        $this->description = $description;
        $this->descriptionShort = $descriptionShort;
    }

    public function price(): string
    {
        return $this->price;
    }

    public function manufacturerId(): string
    {
        return $this->manufacturerId;
    }

    public function supplierId(): string
    {
        return $this->supplierId;
    }

    public function ean13(): string
    {
        return $this->ean13;
    }

    public function active(): string
    {
        return $this->active;
    }

    public function dateAdd(): string
    {
        return $this->dateAdd;
    }

    public function dateUpdate(): string
    {
        return $this->dateUpdate;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function descriptionShort(): string
    {
        return $this->descriptionShort;
    }

}