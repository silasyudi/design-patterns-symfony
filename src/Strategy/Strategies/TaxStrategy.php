<?php

namespace App\Strategy\Strategies;

use App\Strategy\Constants\State;

interface TaxStrategy
{
    function calculateTaxOnSalePrice(float $salePrice): float;

    function getState(): State;
}
