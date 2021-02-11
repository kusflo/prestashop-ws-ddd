<?php


namespace PsWs\Test\Products\Application\Create;


use PHPUnit\Framework\TestCase;
use PsWs\Products\Application\Create\ProductCreator;
use PsWs\Products\Domain\ProductId;
use PsWs\Test\Products\Infrastructure\ProductRepositoryMother;

/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class ProductCreatorTest extends TestCase
{

    private $repository;
    private $errorRequest;
    private $validRequest;

    public function setUp()
    {
        parent::setUp();
        $this->repository = new ProductRepositoryMother();
        $this->errorRequest = CreateProductRequestMother::createErrorRequest();
        $this->validRequest = CreateProductRequestMother::createValidRequest();
    }

    /** @test */
    public function it_should_create_a_valid_product(): void
    {
        $creator = new ProductCreator($this->repository, $this->validRequest);
        $productId = $creator->__invoke();
        $this->assertInstanceOf(ProductId::class, $productId);
    }

    /** @test */
    public function it_should_create_a_invalid_product(): void
    {
        $this->expectException(\Exception::class);
        $creator = new ProductCreator($this->repository, $this->errorRequest);
        $productId = $creator->__invoke();
    }


}