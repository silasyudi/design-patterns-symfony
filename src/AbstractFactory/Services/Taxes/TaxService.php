<?php

namespace App\AbstractFactory\Services\Taxes;

use App\Domain\Entities\Product;

interface TaxService
{

    public function getTax(Product $product): float;
}
