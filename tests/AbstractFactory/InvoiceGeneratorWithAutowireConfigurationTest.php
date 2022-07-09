<?php

namespace App\Tests\AbstractFactory;

use App\AbstractFactory\InvoiceGeneratorWithAutowireConfiguration;
use App\Domain\Constants\State;
use App\Domain\Entities\Product;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class InvoiceGeneratorWithAutowireConfigurationTest extends KernelTestCase
{

    private InvoiceGeneratorWithAutowireConfiguration $invoiceGenerator;
    private Product $product;

    public function setUp(): void
    {
        self::bootKernel();
        $this->invoiceGenerator = self::$kernel->getContainer()->get(InvoiceGeneratorWithAutowireConfiguration::class);
        $this->product = new Product();
        $this->product->setSalePrice(100);
    }

    public function testShouldDoGetInvoiceFromParaiba(): void
    {
        $this->product->setState(State::PB);
        $invoice = $this->invoiceGenerator->generate($this->product);
        $this->assertStringStartsWith('PB', $invoice->getId());
        $this->assertEquals(10.0, $invoice->getTaxValue());
    }
}
