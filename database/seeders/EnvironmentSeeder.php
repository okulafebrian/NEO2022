<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnvironmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('environments')->insert([
            [
                'name' => 'REGISTRATION',
                'start_time' => '2022-10-24 00:00:00',
                'end_time' => '2022-11-24 00:00:00'
            ],
            [
                'name' => 'EARLY BIRD',
                'start_time' => '2022-10-24 00:00:00',
                'end_time' => '2022-10-30 00:00:00'
            ]
        ]);
    }
}
