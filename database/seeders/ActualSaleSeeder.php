<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActualSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actual_sales')->insert([
            [
                'product_id' => 1,
                'month' => 12,
                'year' => 2022,
                'stock' => 381,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 1,
                'month' => 1,
                'year' => 2023,
                'stock' => 260,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 1,
                'month' => 2,
                'year' => 2023,
                'stock' => 152.5,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 1,
                'month' => 3,
                'year' => 2023,
                'stock' => 218,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 1,
                'month' => 4,
                'year' => 2023,
                'stock' => 336,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 2,
                'month' => 12,
                'year' => 2022,
                'stock' => 271,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 2,
                'month' => 1,
                'year' => 2023,
                'stock' => 221,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 2,
                'month' => 2,
                'year' => 2023,
                'stock' => 185,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 2,
                'month' => 3,
                'year' => 2023,
                'stock' => 327,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 2,
                'month' => 4,
                'year' => 2023,
                'stock' => 295,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 3,
                'month' => 12,
                'year' => 2022,
                'stock' => 35.5,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 3,
                'month' => 1,
                'year' => 2023,
                'stock' => 34.5,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 3,
                'month' => 2,
                'year' => 2023,
                'stock' => 37,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 3,
                'month' => 3,
                'year' => 2023,
                'stock' => 47.5,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 3,
                'month' => 4,
                'year' => 2023,
                'stock' => 38,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 4,
                'month' => 12,
                'year' => 2022,
                'stock' => 28,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 4,
                'month' => 1,
                'year' => 2023,
                'stock' => 22,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 4,
                'month' => 2,
                'year' => 2023,
                'stock' => 18,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 4,
                'month' => 3,
                'year' => 2023,
                'stock' => 29.5,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 4,
                'month' => 4,
                'year' => 2023,
                'stock' => 17,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 5,
                'month' => 12,
                'year' => 2022,
                'stock' => 96,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 5,
                'month' => 1,
                'year' => 2023,
                'stock' => 39.5,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 5,
                'month' => 2,
                'year' => 2023,
                'stock' => 28,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 5,
                'month' => 3,
                'year' => 2023,
                'stock' => 16,
                'created_at' => Carbon::now()
            ],
            [
                'product_id' => 5,
                'month' => 4,
                'year' => 2023,
                'stock' => 29,
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
