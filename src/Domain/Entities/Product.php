<?php

namespace App\Domain\Entities;

use App\Domain\Constants\State;

class Product
{

    private State $state;

    private float $salePrice;

    public function getState(): State
    {
        return $this->state;
    }

    public function setState(State $state): void
    {
        $this->state = $state;
    }

    public function getSalePrice(): float
    {
        return $this->salePrice;
    }

    public function setSalePrice(float $salePrice): void
    {
        $this->salePrice = $salePrice;
    }
}
