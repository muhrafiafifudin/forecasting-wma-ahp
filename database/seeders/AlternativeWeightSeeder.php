<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AlternativeWeightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alternative_weights')->insert([
            [
                'weight' => 5,
                'product_id' => 2,
                'criteria_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'weight' => 5,
                'product_id' => 2,
                'criteria_id' => 2,
                'created_at' => Carbon::now()
            ],
            [
                'weight' => 5,
                'product_id' => 1,
                'criteria_id' => 3,
                'created_at' => Carbon::now()
            ],
            [
                'weight' => 5,
                'product_id' => 2,
                'criteria_id' => 4,
                'created_at' => Carbon::now()
            ],
            [
                'weight' => 4,
                'product_id' => 1,
                'criteria_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'weight' => 4,
                'product_id' => 4,
                'criteria_id' => 2,
                'created_at' => Carbon::now()
            ],
            [
                'weight' => 4,
                'product_id' => 5,
                'criteria_id' => 3,
                'created_at' => Carbon::now()
            ],
            [
                'weight' => 4,
                'product_id' => 4,
                'criteria_id' => 4,
                'created_at' => Carbon::now()
            ],
            [
                'weight' => 3,
                'product_id' => 3,
                'criteria_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'weight' => 3,
                'product_id' => 1,
                'criteria_id' => 2,
                'created_at' => Carbon::now()
            ],
            [
                'weight' => 3,
                'product_id' => 3,
                'criteria_id' => 3,
                'created_at' => Carbon::now()
            ],
            [
                'weight' => 3,
                'product_id' => 5,
                'criteria_id' => 4,
                'created_at' => Carbon::now()
            ],
            [
                'weight' => 2,
                'product_id' => 5,
                'criteria_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'weight' => 2,
                'product_id' => 5,
                'criteria_id' => 2,
                'created_at' => Carbon::now()
            ],
            [
                'weight' => 2,
                'product_id' => 4,
                'criteria_id' => 3,
                'created_at' => Carbon::now()
            ],
            [
                'weight' => 2,
                'product_id' => 1,
                'criteria_id' => 4,
                'created_at' => Carbon::now()
            ],
            [
                'weight' => 1,
                'product_id' => 4,
                'criteria_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'weight' => 1,
                'product_id' => 3,
                'criteria_id' => 2,
                'created_at' => Carbon::now()
            ],
            [
                'weight' => 1,
                'product_id' => 2,
                'criteria_id' => 3,
                'created_at' => Carbon::now()
            ],
            [
                'weight' => 1,
                'product_id' => 3,
                'criteria_id' => 4,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
