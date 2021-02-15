<?php


namespace PsWs\Products\Domain;


/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class ProductFinder
{
    private ProductRepository $repository;


    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(ProductId $productId): Product
    {
        $product = $this->repository->searchById($productId);

        $this->ensureValidProduct($product, $productId);

        return $product;

    }

    private function ensureValidProduct(?Product $product, ProductId $productId)
    {
        if(null === $product) {
            throw new ProductNotFound($productId);
        }
    }


}