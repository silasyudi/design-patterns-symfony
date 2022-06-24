<?php

namespace App\Strategy\Strategies;

use App\Strategy\Constants\State;

class PernambucoStrategy implements TaxStrategy
{

    function calculateTaxOnSalePrice(float $salePrices): float
    {
        return $salePrices * 0.11;
    }

    function getState(): State
    {
        return State::PE;
    }
}
