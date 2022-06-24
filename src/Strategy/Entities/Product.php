<?php

namespace App\Strategy\Entities;

use App\Strategy\Constants\State;

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
