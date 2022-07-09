<?php

namespace App\AbstractFactory\Factories;

use App\AbstractFactory\Services\Invoices\InvoiceService;
use App\AbstractFactory\Services\Taxes\TaxService;
use App\Domain\Constants\State;

interface InvoiceAbstractFactory
{

    public function getTaxService(): TaxService;

    public function getInvoiceService(): InvoiceService;

    public function getState(): State;

}
