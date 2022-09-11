<?php

namespace Database\Factories;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => 'PRD-' . Carbon::now()->format('Ym') . $this->faker->numberBetween(1,100),
            'name' => $this->faker->unique->randomElement(['Tiket Pesawat', 'Rental Mobil', 'Bus Pariwisata']),
            'description' => $this->faker->sentence,
            'tax' => $this->faker->numberBetween(10,11),
            'price' => $this->faker->randomFloat(20, 8, 9999999),
            'sale_account' => 50,
            'sales_price' => $this->faker->randomFloat(20, 8, 9999999),
            'purchase_price' => $this->faker->randomFloat(20, 8, 9999999),
            'purchase_account' => $this->faker->numberBetween(1, 10),
        ];
    }
}
