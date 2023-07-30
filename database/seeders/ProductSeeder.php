<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'variable' => 'A1',
                'code' => 'P001',
                'product' => 'Sosis Ayam',
                'price' => 5000,
                'exp_date' => Carbon::now(),
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'variable' => 'A2',
                'code' => 'P002',
                'product' => 'Bacon Razer',
                'price' => 5000,
                'exp_date' => Carbon::now(),
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'variable' => 'A3',
                'code' => 'P003',
                'product' => 'Bakso Ayam',
                'price' => 5000,
                'exp_date' => Carbon::now(),
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'variable' => 'A4',
                'code' => 'P004',
                'product' => 'Ham Slice',
                'price' => 5000,
                'exp_date' => Carbon::now(),
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'variable' => 'A5',
                'code' => 'P005',
                'product' => 'Sosis Sapi',
                'price' => 5000,
                'exp_date' => Carbon::now(),
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
