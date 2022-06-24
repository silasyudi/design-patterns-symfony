<?php

namespace App\Strategy\Strategies;

use App\Strategy\Constants\State;

class ParaibaStrategy implements TaxStrategy
{

    function calculateTaxOnSalePrice(float $salePrices): float
    {
        return $salePrices * 0.1;
    }

    function getState(): State
    {
        return State::PB;
    }
}
