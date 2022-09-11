<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $code = Account::pluck('id')->toArray();
        return [
            'nick_name' => $this->faker->name,
            'type_contact' => $this->faker->randomElement(['customer', 'supplier', 'karyawan', 'lainnya']),
            'contact_name' => $this->faker->name,
            'handphone' => $this->faker->phoneNumber,
            'type_identity' => $this->faker->randomElement(['ktp', 'sim', 'paspor', 'lainnya']),
            'identity_number' => $this->faker->randomNumber(8),
            'company_name' => $this->faker->company,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'fax' => $this->faker->phoneNumber,
            'npwp' => $this->faker->randomNumber(8),
            'purchase_address' => $this->faker->address,
            'shipping_address' => $this->faker->address,
            'bank_name' => $this->faker->randomElement(['bca', 'bni', 'bri', 'mandiri', 'lainnya']),
            'bank_account_number' => $this->faker->randomNumber(8),
            'bank_account_name' => $this->faker->name,
            'branch_office' => $this->faker->randomElement(['jakarta', 'surabaya', 'bandung', 'lainnya']),
            'akun_piutang' => $this->faker->randomElement($code),
            'akun_hutang' => $this->faker->randomElement($code),
        ];
    }
}
