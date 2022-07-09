<?php

namespace App\Strategy\Strategies;

use App\Domain\Constants\State;

interface TaxStrategy
{
    function calculateTaxOnSalePrice(float $salePrice): float;

    function getState(): State;
}
