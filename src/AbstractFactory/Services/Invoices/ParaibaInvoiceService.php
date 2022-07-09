<?php

namespace App\AbstractFactory\Services\Invoices;

use App\Domain\Entities\Invoice;

class ParaibaInvoiceService implements InvoiceService
{

    public function registerInvoice(float $taxValue): Invoice
    {
        $invoice = new Invoice();
        $invoice->setId('PB' . random_bytes(5));
        $invoice->setTaxValue($taxValue);
        return $invoice;
    }
}
