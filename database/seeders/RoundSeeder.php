<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoundSeeder extends Seeder
{

    public function run()
    {
        DB::table('rounds')->insert([
            [ 'name' => 'Technical Meeting' ],
            [ 'name' => 'Coaching Clinic' ],
            [ 'name' => 'Preliminary' ],
            [ 'name' => 'Semifinal' ],
            [ 'name' => 'Final' ]
        ]);
    }
}
