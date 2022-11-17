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
                'name' => 'Registration',
                'start_time' => '2022-10-24 00:00:00',
                'end_time' => '2022-11-24 00:00:00',
                'is_shown' => null
            ],
            [
                'name' => 'Early Bird',
                'start_time' => '2022-10-24 00:00:00',
                'end_time' => '2022-10-30 00:00:00',
                'is_shown' => null
            ],
            [
                'name' => 'Re-regis Semifinal',
                'start_time' => null,
                'end_time' => null,
                'is_shown' => 0
            ],
            [
                'name' => 'Submission SSW Preliminary',
                'start_time' => null,
                'end_time' => null,
                'is_shown' => 0
            ],
            [
                'name' => 'Submission SSW Final',
                'start_time' => null,
                'end_time' => null,
                'is_shown' => 0
            ],
            [
                'name' => 'Attendance Preliminary',
                'start_time' => null,
                'end_time' => null,
                'is_shown' => 0
            ],
            [
                'name' => 'Attendance Semifinal',
                'start_time' => null,
                'end_time' => null,
                'is_shown' => 0
            ],
            [
                'name' => 'Attendance Final',
                'start_time' => null,
                'end_time' => null,
                'is_shown' => 0
            ],
        ]);
    }
}
