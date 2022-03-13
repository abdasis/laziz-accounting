<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'ktp' => $this->faker->numberBetween(100000000, 999999999),
            'phone' => $this->faker->phoneNumber,
            'gender' => $this->faker->randomElement(['laki-laki', 'perempuan']),
            'marital_status' => $this->faker->randomElement(['sudah menikah', 'belum menikah']),
            'date_birthday' => $this->faker->date,
            'place_of_birth' => $this->faker->city,
            'address' => $this->faker->address,
        ];
    }
}
