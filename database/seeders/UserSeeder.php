<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'IT DIVISION',
                'role' => 'ADMIN',
                'email' => 'NEOITDIV',
                'password' => Hash::make('abc12345'),
            ],
            [
                'name' => 'Vincent Febrien',
                'role' => 'USER',
                'email' => 'okulafebrian@gmail.com',
                'password' => Hash::make('abc12345'),
            ]
        ]);
    }
}
