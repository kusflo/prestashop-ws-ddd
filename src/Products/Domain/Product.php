<?php


namespace PsWs\Products\Domain;


use PsWs\Manufacturers\Domain\ManufacturerId;
use PsWs\Suppliers\Domain\SupplierId;
use PsWs\Shared\Domain\Quantity;

/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class Product
{

    private ?ProductId $productId;
    private ?ManufacturerId $manufacturerId;
    private ?SupplierId $supplierId;
    private ?Quantity $quantity;
    private ?Ean13 $ean13;
    private ?Price $price;
    private ?Active $active;
    private ?\DateTimeImmutable $dateAdd;
    private ?\DateTimeImmutable $dateUpdate;
    private ?Name $name;
    private ?Description $description;
    private ?DescriptionShort $descriptionShort;


    public function __construct(
        Price $price, ?ProductId $productId, ?ManufacturerId $manufacturerId,
        ?SupplierId $supplierId, ?Quantity $quantity, ?Ean13 $ean13,
        ?Active $active, ?\DateTimeImmutable $dateAdd, ?\DateTimeImmutable $dateUpdate,
        ?Name $name, ?Description $description, ?DescriptionShort $descriptionShort
    )
    {
        $this->price = $price;
        $this->productId = $productId;
        $this->manufacturerId = $manufacturerId;
        $this->supplierId = $supplierId;
        $this->quantity = $quantity;
        $this->ean13 = $ean13;
        $this->active = $active;
        $this->dateAdd = $dateAdd;
        $this->dateUpdate = $dateUpdate;
        $this->name = $name;
        $this->description = $description;
        $this->descriptionShort = $descriptionShort;
    }

    public function price(): Price
    {
        return $this->price;
    }

    public function productId(): ?ProductId
    {
        return $this->productId;
    }

    public function manufacturerId(): ?ManufacturerId
    {
        return $this->manufacturerId;
    }

    public function supplierId(): ?SupplierId
    {
        return $this->supplierId;
    }

    public function quantity(): ?Quantity
    {
        return $this->quantity;
    }

    public function ean13(): ?Ean13
    {
        return $this->ean13;
    }

    public function isActive(): ?Active
    {
        return $this->active;
    }

    public function dateAdd(): ?\DateTimeImmutable
    {
        return $this->dateAdd;
    }

    public function dateUpdate(): ?\DateTimeImmutable
    {
        return $this->dateUpdate;
    }

    public function name(): ?Name
    {
        return $this->name;
    }

    public function description(): ?Description
    {
        return $this->description;
    }

    public function descriptionShort(): ?DescriptionShort
    {
        return $this->descriptionShort;
    }




}