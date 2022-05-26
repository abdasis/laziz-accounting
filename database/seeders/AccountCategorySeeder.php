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
                'name' => 'Akun Piutang',
                'code' => '100000',
            ],
            [
                'name' => 'Aktiva Lancar Lainnya',
                'code' => '100000'
            ],
            [
                'name' => 'Kas & Bank',
                'code' => '100000'
            ],
            [
                'name' => 'Persediaan',
                'code' => '100000'
            ],
            [
                'name' => 'Aktiva Tetap',
                'code' => '100000'
            ],
            [
                'name' => 'Aktiva Lainnya',
                'code' => '100000'
            ],
            [
                'name' => 'Depresiasi & Amortisasi',
                'code' => '100000'
            ],
            [
                'name' => 'Akun Hutang',
                'code' => '200000'
            ],
            [
                'name' => 'Kartu Kredit',
                'code' => '200000'
            ],
            [
                'name' => 'Kewajiban Lancar Lainnya',
                'code' => '200000'
            ],
            [
                'name' => 'Kewajiban Jangka Panjang',
                'code' => '200000'
            ],
            [
                'name' => 'Ekuitas',
                'code' => '300000'
            ],
            [
                'name' => 'Pendapatan',
                'code' => '400000',
            ],
            [
                'name' => 'Harga Pokok Penjualan',
                'code' => '500000'
            ],
            [
                'name' => 'Beban',
                'code' => '600000'
            ],
            [
                'name' => 'Beban Lainnya',
                'code' => '600000'
            ],
            [
                'name' => 'Pendapatan Lainnya',
                'code' => '700000'
            ],

        ];
        AccountCategory::insert($akun);
    }
}
