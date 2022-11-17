<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessSeeder extends Seeder
{
    public function run()
    {
        DB::table('accesses')->insert([
            [
                'name' => 'Environment',
            ],
            [
                'name' => 'Access Control',
            ],
            [
                'name' => 'Registration',
            ],
            [
                'name' => 'Participant',
            ],
            [
                'name' => 'Competition',
            ],
             [
                'name' => 'FAQ',
            ],
            [
                'name' => 'Qualification',
            ],
            [
                'name' => 'Re-registration',
            ],
            [
                'name' => 'Attendance',
            ],
            [
                'name' => 'Submission',
            ],
        ]);
    }
}
