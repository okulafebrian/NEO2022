<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnvironmentSeeder extends Seeder
{
    public function run()
    {
        DB::table('environments')->insert([
            [
                'name' => 'REGISTRATION',
                'start_time' => '2022-10-24 00:00:00',
                'end_time' => '2022-11-24 00:00:00',
                'is_shown' => null
            ],
            [
                'name' => 'EARLY BIRD',
                'start_time' => '2022-10-24 00:00:00',
                'end_time' => '2022-10-30 00:00:00',
                'is_shown' => null
            ],
            [
                'name' => 'RE-REGIS SEMIFINAL',
                'start_time' => null,
                'end_time' => null,
                'is_shown' => 0
            ],
            [
                'name' => 'SUBMISSION SSW PRELIMINARY',
                'start_time' => null,
                'end_time' => null,
                'is_shown' => 0
            ],
            [
                'name' => 'SUBMISSION SSW FINAL',
                'start_time' => null,
                'end_time' => null,
                'is_shown' => 0
            ],
            [
                'name' => 'ATTENDANCE PRELIMINARY',
                'start_time' => null,
                'end_time' => null,
                'is_shown' => 0
            ],
            [
                'name' => 'ATTENDANCE SEMIFINAL',
                'start_time' => null,
                'end_time' => null,
                'is_shown' => 0
            ],
            [
                'name' => 'ATTENDANCE FINAL',
                'start_time' => null,
                'end_time' => null,
                'is_shown' => 0
            ],
        ]);
    }
}
