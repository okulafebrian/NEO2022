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
                'type' => 'Normal',
                'start' => '2021-08-28 00:00:00',
                'end' => '2021-09-01 23:59:59',
                'is_active' => false
            ],
            [
                'type' => 'Early Bird',
                'start' => '2021-08-26 00:00:00',
                'end' => '2021-08-28 23:59:59',
                'is_active' => true
            ]
        ]);
    }
}
