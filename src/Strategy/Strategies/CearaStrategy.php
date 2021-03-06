<?php

namespace App\Strategy\Strategies;

use App\Domain\Constants\State;

class CearaStrategy implements TaxStrategy
{

    function calculateTaxOnSalePrice(float $salePrice): float
    {
        return $salePrice * 0.09;
    }

    function getState(): State
    {
        return State::CE;
    }
}
