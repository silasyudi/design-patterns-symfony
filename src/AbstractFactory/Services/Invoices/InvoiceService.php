<?php

namespace App\AbstractFactory\Services\Invoices;

use App\Domain\Entities\Invoice;

interface InvoiceService
{

    public function registerInvoice(float $taxValue): Invoice;
}
