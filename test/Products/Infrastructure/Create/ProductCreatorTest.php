<?php


namespace PsWs\Test\Products\Infrastructure\Create;


use PHPUnit\Framework\TestCase;
use PsWs\Products\Application\Create\ProductCreator;
use PsWs\Products\Domain\ProductId;
use PsWs\Products\Infrastructure\PrestaShop\ProductRepository;
use PsWs\Test\Products\Application\Create\CreateProductRequestMother;
use PsWs\Test\Products\Infrastructure\PrestaShop\ProductRepositoryTest;
use Symfony\Component\Dotenv\Dotenv;

/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class ProductCreatorTest extends TestCase
{

    private $repository;
    private ProductId $productId;

    public function setUp()
    {
        parent::setUp();
        $dotenv = new Dotenv();
        $dotenv->loadEnv(__DIR__.'/../../../../.env');
        //$this->repository = new ProductRepository(true); Real Store
        $this->repository = new ProductRepositoryTest(true);

    }

    /** @test */
    public function it_should_create_a_valid_product(): void
    {
        $request = CreateProductRequestMother::createValidRequest();

        $creator = new ProductCreator($this->repository, $request);
        $this->productId = $creator->__invoke();
        $this->assertInstanceOf(ProductId::class, $this->productId);
    }


}