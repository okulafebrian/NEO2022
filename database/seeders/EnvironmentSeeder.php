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
                'code' => 'ENV001',
                'name' => 'Registration',
                'start_time' => '2022-11-21 00:00:00',
                'end_time' => '2022-12-26 23:59:59',
            ],
            [   
                'code' => 'ENV002',
                'name' => 'Early Bird',
                'start_time' => '2022-11-21 00:00:00',
                'end_time' => '2022-12-12 23:59:59',
            ],
            [   
                'code' => 'ENV003',
                'name' => 'Submission SSW Preliminary',
                'start_time' => null,
                'end_time' => null,
            ],
            [   
                'code' => 'ENV004',
                'name' => 'Submission SSW Final',
                'start_time' => null,
                'end_time' => null,
            ],
            [   
                'code' => 'ENV005',
                'name' => 'Submission Speech Preliminary',
                'start_time' => null,
                'end_time' => null,
            ],
            [   
                'code' => 'ENV006',
                'name' => 'Attendance Technical Meeting',
                'start_time' => null,
                'end_time' => null,
            ],
            [   
                'code' => 'ENV007',
                'name' => 'Attendance Coaching Clinic',
                'start_time' => null,
                'end_time' => null,
            ],
            [   
                'code' => 'ENV008',
                'name' => 'Attendance Preliminary',
                'start_time' => null,
                'end_time' => null,
            ],
            [   
                'code' => 'ENV009',
                'name' => 'Attendance Semifinal',
                'start_time' => null,
                'end_time' => null,
            ],
            [   
                'code' => 'ENV010',
                'name' => 'Attendance Final',
                'start_time' => null,
                'end_time' => null,
            ],
        ]);
    }
}
