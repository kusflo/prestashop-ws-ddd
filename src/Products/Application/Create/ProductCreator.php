<?php


namespace PsWs\Products\Application\Create;

use PsWs\Products\Domain\ProductFactory;
use PsWs\Products\Domain\ProductId;
use PsWs\Products\Domain\ProductRepository;


/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class ProductCreator
{

    private ProductRepository $repository;


    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateProductRequest $request): ProductId
    {
        $product = ProductFactory::create($request);
        return $this->repository->save($product);
    }

}