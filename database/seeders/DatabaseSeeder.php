<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            CustomerSeeder::class,
            SupplierSeeder::class,
            AccountCategorySeeder::class,
        ]);
        User::create([
            'name' => 'Abdul Aziz',
            'email' => 'id.abdasis@gmail.com',
            'password' => \Hash::make('rahasia123'),
        ]);
    }
}
