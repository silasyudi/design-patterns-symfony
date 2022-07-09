<?php

namespace App\AbstractFactory\Factories;

use App\AbstractFactory\Services\Invoices\ParaibaInvoiceService;
use App\AbstractFactory\Services\Taxes\ParaibaTaxService;
use App\Domain\Constants\State;

class ParaibaInvoiceFactory implements InvoiceAbstractFactory
{

    public function getTaxService(): ParaibaTaxService
    {
        return new ParaibaTaxService();
    }

    public function getInvoiceService(): ParaibaInvoiceService
    {
        return new ParaibaInvoiceService();
    }

    public function getState(): State
    {
        return State::PB;
    }

}
