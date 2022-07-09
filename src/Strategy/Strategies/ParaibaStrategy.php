<?php

namespace App\Strategy\Strategies;

use App\Domain\Constants\State;

class ParaibaStrategy implements TaxStrategy
{

    function calculateTaxOnSalePrice(float $salePrice): float
    {
        return $salePrice * 0.1;
    }

    function getState(): State
    {
        return State::PB;
    }
}
