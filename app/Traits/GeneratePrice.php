<?php

namespace App\Traits;

trait GeneratePrice
{
    public $total, $price, $discount;
    public $total_price, $total_ppn;



    public function generateTotal($quantity = 0, $price = 0)
    {
        return $this->total =  $quantity * $price;
    }

    public function generateTotalPrice(array $prices)
    {
        return $this->total_price = collect($prices)->sum();
    }

    public function generateTax($tax)
    {
        return $this->total_ppn = collect($this->total_price)->sum() * $tax / 100;
    }

    public function generateDiscount($pph)
    {
        return $this->discount = collect($this->total_price)->sum() * $pph / 100;
    }
}
