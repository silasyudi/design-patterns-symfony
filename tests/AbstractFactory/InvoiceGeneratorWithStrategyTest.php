<?php

namespace App\Tests\AbstractFactory;

use App\AbstractFactory\InvoiceGeneratorWithStrategy;
use App\Domain\Constants\State;
use App\Domain\Entities\Product;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class InvoiceGeneratorWithStrategyTest extends KernelTestCase
{

    private InvoiceGeneratorWithStrategy $invoiceGenerator;
    private Product $product;

    public function setUp(): void
    {
        self::bootKernel();
        $this->invoiceGenerator = self::$kernel->getContainer()->get(InvoiceGeneratorWithStrategy::class);
        $this->product = new Product();
        $this->product->setSalePrice(100);
    }

    public function shouldDoGetInvoiceFromParaiba(): void
    {
        $this->product->setState(State::PB);
        $invoice = $this->invoiceGenerator->generate($this->product);
        $this->assertStringStartsWith('PB', $invoice->getId());
        $this->assertEquals(10.0, $invoice->getTaxValue());
    }

    public function testShouldDoGetInvoiceFromCeara(): void
    {
        $this->product->setState(State::CE);
        $invoice = $this->invoiceGenerator->generate($this->product);
        $this->assertStringStartsWith('CE', $invoice->getId());
        $this->assertEquals(9.0, $invoice->getTaxValue());
    }
}
