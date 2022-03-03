<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'company_name' => $this->faker->company,
            'contact_name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'province' => $this->faker->state,
            'city' => $this->faker->city,
            'districts' => $this->faker->city,
            'address' => $this->faker->address,
            'postal_code' => $this->faker->postcode,
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
