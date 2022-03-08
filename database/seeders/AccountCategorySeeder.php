<?php

namespace Database\Seeders;

use App\Models\AccountCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $akun = [
            [
                'name' => 'Aktiva',
                'code' => '100000',
            ],
            [
                'name' => 'Hutang',
                'code' => '200000'
            ],
            [
                'name' => 'Modal',
                'code' => '300000'
            ],
            [
                'name' => 'Pendapatan',
                'code' => '400000'
            ],
            [
                'name' => 'Beban',
                'code' => '500000'
            ],
        ];
        AccountCategory::insert($akun);
    }
}
