<?php


namespace PsWs\Products\Domain;


use PsWs\Shared\Domain\DomainError;

/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class ProductNotFound extends DomainError
{

    private ProductId $id;

    public function __construct(ProductId $id)
    {
        $this->id = $id;
        parent::__construct();
    }


    public function errorCode(): string
    {
        return 'product_not_found';
    }

    protected function errorMessage(): string
    {
        return sprintf('The product <%s> has not been found', $this->id->value());
    }

}