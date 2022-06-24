<?php

namespace App\Strategy\Strategies;

use App\Strategy\Constants\State;

class PernambucoStrategy implements TaxStrategy
{

    function calculateTaxOnSalePrice(float $salePrice): float
    {
        return $salePrice * 0.11;
    }

    function getState(): State
    {
        return State::PE;
    }
}
