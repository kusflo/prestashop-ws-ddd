<?php


namespace PsWs\Test\Products\Application\Find;


use PHPUnit\Framework\TestCase;
use PsWs\Products\Application\Find\ProductFinder;
use PsWs\Products\Domain\Product;
use PsWs\Products\Domain\ProductId;
use PsWs\Products\Domain\ProductNotFound;
use PsWs\Test\Products\Infrastructure\ProductRepositoryMother;

/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class ProductFindTest extends TestCase
{

    private $repository;

    public function setUp()
    {
        parent::setUp();
        $this->repository = new ProductRepositoryMother();

    }

    /** @test */
    public function it_should_find_a_valid_product_by_id(): void
    {
        $productId = new ProductId(1);
        $finder = new ProductFinder($this->repository);
        $product = $finder->__invoke($productId);
        $this->assertInstanceOf(Product::class, $product);
    }

    /** @test */
    public function it_should_find_a_null_product(): void
    {
        $this->expectException(ProductNotFound::class);
        $productId = new ProductId(99);
        $finder = new ProductFinder($this->repository);
        $product = $finder->__invoke($productId);
    }


}