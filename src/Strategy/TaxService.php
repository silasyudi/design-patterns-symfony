<?php

namespace App\Strategy;

use App\Domain\Constants\State;
use App\Domain\Entities\Product;
use App\Strategy\Strategies\TaxStrategy;
use InvalidArgumentException;
use Traversable;

class TaxService
{
    /**
     * @var TaxStrategy[]
     */
    private array $taxStrategies;

    public function __construct(Traversable $taxStrategies)
    {
        $this->taxStrategies = iterator_to_array($taxStrategies);
    }

    public function calculateTaxOnProduct(Product $product): float
    {
        $strategy = $this->getStrategy($product->getState());
        return $strategy->calculateTaxOnSalePrice($product->getSalePrice());
    }

    private function getStrategy(State $state): TaxStrategy
    {
        foreach ($this->taxStrategies as $strategy) {
            if ($strategy->getState() == $state) {
                return $strategy;
            }
        }

        throw new InvalidArgumentException('State ' . $state->name . ' not supported');
    }
}
