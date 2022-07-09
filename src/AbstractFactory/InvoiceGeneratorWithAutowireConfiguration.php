<?php

namespace App\AbstractFactory;

use App\AbstractFactory\Factories\InvoiceAbstractFactory;
use App\Domain\Entities\Invoice;
use App\Domain\Entities\Product;

class InvoiceGeneratorWithAutowireConfiguration
{

    private InvoiceAbstractFactory $factory;

    public function __construct(InvoiceAbstractFactory $paraibaInvoiceFactory)
    {
        $this->factory = $paraibaInvoiceFactory;
    }

    public function generate(Product $product): Invoice
    {
        $taxValue = $this->factory->getTaxService()->getTax($product);
        return $this->factory->getInvoiceService()->registerInvoice($taxValue);
    }
}
