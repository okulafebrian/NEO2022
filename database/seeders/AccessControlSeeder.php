<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessControlSeeder extends Seeder
{

    public function run()
    {
        DB::table('access_controls')->insert([
            [
                'access_id' => 1,
                'user_id' => 1
            ],
            [
                'access_id' => 2,
                'user_id' => 1
            ],
            [
                'access_id' => 3,
                'user_id' => 1
            ],
            [
                'access_id' => 4,
                'user_id' => 1
            ],
            [
                'access_id' => 5,
                'user_id' => 1
            ],
            [
                'access_id' => 6,
                'user_id' => 1
            ],
            [
                'access_id' => 7,
                'user_id' => 1
            ],
            [
                'access_id' => 8,
                'user_id' => 1
            ],
            [
                'access_id' => 9,
                'user_id' => 1
            ],
            [
                'access_id' => 10,
                'user_id' => 1
            ],
        ]);
    }
}
