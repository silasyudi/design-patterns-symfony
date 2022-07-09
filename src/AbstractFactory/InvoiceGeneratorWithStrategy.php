<?php

namespace App\AbstractFactory;

use App\AbstractFactory\Factories\InvoiceAbstractFactory;
use App\Domain\Constants\State;
use App\Domain\Entities\Invoice;
use App\Domain\Entities\Product;
use InvalidArgumentException;
use Traversable;

class InvoiceGeneratorWithStrategy
{

    /**
     * @var InvoiceAbstractFactory[]
     */
    private array $factories;

    public function __construct(Traversable $factories)
    {
        $this->factories = iterator_to_array($factories);
    }

    public function generate(Product $product): Invoice
    {
        $factory = $this->getFactory($product->getState());
        $taxValue = $factory->getTaxService()->getTax($product);
        return $factory->getInvoiceService()->registerInvoice($taxValue);
    }

    private function getFactory(State $state): InvoiceAbstractFactory
    {
        foreach ($this->factories as $factory) {
            if ($factory->getState() == $state) {
                return $factory;
            }
        }

        throw new InvalidArgumentException('State ' . $state->name . ' not supported');
    }
}
