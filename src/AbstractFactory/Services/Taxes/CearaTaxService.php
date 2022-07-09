<?php

namespace App\AbstractFactory\Services\Taxes;

use App\Domain\Entities\Product;

class CearaTaxService implements TaxService
{

    public function getTax(Product $product): float
    {
        return $product->getSalePrice() * '0.09';
    }
}
