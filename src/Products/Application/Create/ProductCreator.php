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

    private ProductRepository $repo;
    private CreateProductRequest $request;

    public function __construct(ProductRepository $repo, CreateProductRequest $request)
    {
        $this->repo = $repo;
        $this->request = $request;
    }

    public function __invoke(): ProductId
    {
        $product = ProductFactory::create($this->request);
        return $this->repo->save($product);
    }

}