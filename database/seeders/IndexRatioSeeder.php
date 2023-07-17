<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IndexRatioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('index_ratios')->insert([
            [
                'index_ratio' => 1,
                'value' => 0,
            ],
            [
                'index_ratio' => 2,
                'value' => 0,
            ],
            [
                'index_ratio' => 3,
                'value' => 0.58,
            ],
            [
                'index_ratio' => 4,
                'value' => 0.9,
            ],
            [
                'index_ratio' => 5,
                'value' => 1.12,
            ],
            [
                'index_ratio' => 6,
                'value' => 1.24,
            ],
            [
                'index_ratio' => 7,
                'value' => 1.32,
            ],
            [
                'index_ratio' => 8,
                'value' => 1.41,
            ],
            [
                'index_ratio' => 9,
                'value' => 1.45,
            ],
            [
                'index_ratio' => 10,
                'value' => 1.49,
            ],
            [
                'index_ratio' => 11,
                'value' => 1.51,
            ],
            [
                'index_ratio' => 12,
                'value' => 1.48,
            ],
            [
                'index_ratio' => 13,
                'value' => 1.56,
            ],
            [
                'index_ratio' => 14,
                'value' => 1.57,
            ],
            [
                'index_ratio' => 15,
                'value' => 1.59,
            ],
        ]);
    }
}
