<?php

namespace App\Tests\Strategy;

use App\Strategy\Constants\State;
use App\Strategy\Entities\Product;
use App\Strategy\TaxService;
use InvalidArgumentException;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class TaxServiceTest extends KernelTestCase
{

    private TaxService $taxService;
    private Product $product;

    public function setUp(): void
    {
        self::bootKernel();
        $this->taxService = self::$kernel->getContainer()->get(TaxService::class);
        $this->product = new Product();
        $this->product->setSalePrice(100);
    }

    public function testShouldReturnNinePercentOfTaxCearaState(): void
    {
        $this->product->setState(State::CE);
        $taxValue = $this->taxService->calculateTaxOnProduct($this->product);
        $this->assertEquals(9.0, $taxValue);
    }

    public function testShouldReturnTenPercentOfTaxParaibaState(): void
    {
        $this->product->setState(State::PB);
        $taxValue = $this->taxService->calculateTaxOnProduct($this->product);
        $this->assertEquals(10.0, $taxValue);
    }

    public function testShouldReturnElevenPercentOfTaxPernambucoState(): void
    {
        $this->product->setState(State::PE);
        $taxValue = $this->taxService->calculateTaxOnProduct($this->product);
        $this->assertEquals(11.0, $taxValue);
    }

    public function testShouldThrowErrorOnUnsupportedState(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->product->setState(State::PI);
        $this->taxService->calculateTaxOnProduct($this->product);
    }
}
