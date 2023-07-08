<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('criterias')->insert([
            [
                'variable' => 'K1',
                'criteria' => 'Hasil Peramalan',
                'created_at' => Carbon::now()
            ],
            [
                'variable' => 'K2',
                'criteria' => 'Pengolahan Lama',
                'created_at' => Carbon::now()
            ],
            [
                'variable' => 'K3',
                'criteria' => 'Waktu Simpan Jangka Pendek',
                'created_at' => Carbon::now()
            ],
            [
                'variable' => 'K4',
                'criteria' => 'Modal Pembuatan Mahal',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
