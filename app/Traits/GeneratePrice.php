<?php

namespace App\Traits;

trait GeneratePrice
{

    public function TotalPrice($quantity, $price, $day)
    {
        return $quantity * $price * $day;
    }

    public function TotalPpn($price, $ppn)
    {
        return  $price * $ppn / 100;
    }

}
