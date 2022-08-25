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
                'start' => '2021-12-14 00:00:00',
                'end' => '2021-12-14 00:00:00',
                'is_active' => false
            ],
            [
                'type' => 'Early Bird',
                'start' => '2021-12-14 00:00:00',
                'end' => '2021-12-14 00:00:00',
                'is_active' => true
            ]
        ]);
    }
}
