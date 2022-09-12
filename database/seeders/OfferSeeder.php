<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offers')->insert([
            [
                'type' => 'normal',
                'start' => '2022-10-16 00:00:00',
                'end' => '2022-10-31 23:59:59',
                'is_active' => false
            ],
            [
                'type' => 'early',
                'start' => '2022-10-01 00:00:00',
                'end' => '2022-10-15 23:59:59',
                'is_active' => true
            ]
        ]);
    }
}
