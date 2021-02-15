<?php


namespace PsWs\Test\Products\Infrastructure\PrestaShop;


use PHPUnit\Framework\TestCase;
use PsWs\Products\Application\Create\ProductCreator;
use PsWs\Products\Application\Find\ProductFinder;
use PsWs\Products\Domain\Product;
use PsWs\Products\Domain\ProductId;
use PsWs\Products\Domain\ProductNotFound;
use PsWs\Products\Domain\ProductRepository as ProductRepositoryInterface;
use PsWs\Products\Infrastructure\PrestaShop\ProductRepository;
use PsWs\Test\Products\Domain\CreateProductRequestMother;
use Symfony\Component\Dotenv\Dotenv;

/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class ProductRepositoryTest extends TestCase
{

    private ProductRepositoryInterface $repository;

    public function setUp()
    {
        parent::setUp();
        $dotenv = new Dotenv();
        $dotenv->loadEnv(__DIR__ . '/../../../../.env');
        $this->repository = new ProductRepositoryPrestaShop(true);
        /**
         * Test with Real Store Repository
         */
        //$this->repository = new ProductRepository(true);

    }

    /** @test */
    public function it_should_save_a_valid_product(): void
    {
        $request = CreateProductRequestMother::createValidRequest();

        $creator = new ProductCreator($this->repository);
        $id = $creator->__invoke($request);

        $this->assertInstanceOf(ProductId::class, $id);
    }

    /** @test */
    public function it_should_get_a_valid_product_by_id(): void
    {

        $id = new ProductId(1);
        $finder = new ProductFinder($this->repository);
        $product = $finder->__invoke($id);

        $this->assertInstanceOf(Product::class, $product);
    }

    /** @test */
    public function it_should_get_a_not_found_product_exception(): void
    {
        $this->expectException(ProductNotFound::class);
        $id = new ProductId(123456789);
        $finder = new ProductFinder($this->repository);
        $product = $finder->__invoke($id);

    }


}