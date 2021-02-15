<?php


namespace PsWs\Products\Application\Find;


use PsWs\Products\Domain\ProductFinder as DomainProductFinder;
use PsWs\Products\Domain\Product;
use PsWs\Products\Domain\ProductId;
use PsWs\Products\Domain\ProductRepository;

/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class ProductFinder
{

    private DomainProductFinder $finder;

    public function __construct(ProductRepository $repository)
    {
        $this->finder = new DomainProductFinder($repository);
    }

    public function __invoke(ProductId $productId): Product
    {

        return $this->finder->__invoke($productId);

    }


}