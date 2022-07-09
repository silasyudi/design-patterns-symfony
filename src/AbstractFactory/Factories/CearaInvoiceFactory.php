<?php

namespace App\AbstractFactory\Factories;

use App\AbstractFactory\Services\Invoices\CearaInvoiceService;
use App\AbstractFactory\Services\Taxes\CearaTaxService;
use App\Domain\Constants\State;

class CearaInvoiceFactory implements InvoiceAbstractFactory
{

    public function getTaxService(): CearaTaxService
    {
        return new CearaTaxService();
    }

    public function getInvoiceService(): CearaInvoiceService
    {
        return new CearaInvoiceService();
    }

    public function getState(): State
    {
        return State::CE;
    }

}
