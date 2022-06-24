<?php

namespace App\Strategy\Strategies;

use App\Strategy\Constants\State;

class CearaStrategy implements TaxStrategy
{

    function calculateTaxOnSalePrice(float $salePrices): float
    {
        return $salePrices * 0.09;
    }

    function getState(): State
    {
        return State::CE;
    }
}
