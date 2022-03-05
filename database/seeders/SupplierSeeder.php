<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Artisan::call('migrate:refresh --path=database/migrations/2022_03_03_111557_create_suppliers_table.php');
        Supplier::factory()->count(100)->create();
    }
}
