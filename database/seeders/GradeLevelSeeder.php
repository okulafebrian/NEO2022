<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grade_levels')->insert([
            [ 'name' => 'Grade 7', 'category' => 'Junior High School' ],
            [ 'name' => 'Grade 8', 'category' => 'Junior High School' ],
            [ 'name' => 'Grade 9', 'category' => 'Junior High School' ],
            [ 'name' => 'Grade 10', 'category' => 'Senior High School' ],
            [ 'name' => 'Grade 11', 'category' => 'Senior High School' ],
            [ 'name' => 'Grade 12', 'category' => 'Senior High School' ],
            [ 'name' => 'Year 1', 'category' => 'University' ],
            [ 'name' => 'Year 2', 'category' => 'University' ],
            [ 'name' => 'Year 3', 'category' => 'University' ],
            [ 'name' => 'Year 4', 'category' => 'University' ]
        ]);
    }
}
