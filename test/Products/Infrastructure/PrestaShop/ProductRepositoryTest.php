<?php


namespace PsWs\Test\Products\Infrastructure\PrestaShop;


use PHPUnit\Framework\TestCase;
use PsWs\Products\Application\Create\ProductCreator;
use PsWs\Products\Domain\ProductId;
use PsWs\Test\Products\Domain\CreateProductRequestMother;
use Symfony\Component\Dotenv\Dotenv;

/**
 *
 * @author Marcos Redondo <kusflo at gmail.com>
 *
 **/
class ProductRepositoryTest extends TestCase
{

    private $repository;
    private ProductId $productId;

    public function setUp()
    {
        parent::setUp();
        $dotenv = new Dotenv();
        $dotenv->loadEnv(__DIR__ . '/../../../../.env');
        //$this->repository = new ProductRepository(true); Real Store
        $this->repository = new ProductRepositoryPrestaShop(true);

    }

    /** @test */
    public function it_should_save_a_valid_product(): void
    {
        $request = CreateProductRequestMother::createValidRequest();

        $creator = new ProductCreator($this->repository, $request);
        $this->productId = $creator->__invoke();
        $this->assertInstanceOf(ProductId::class, $this->productId);
    }


}