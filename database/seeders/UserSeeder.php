<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'IT Division',
                'role' => 'ADMIN',
                'email' => 'neo.it',
                'password' => Hash::make('neoIT123'),
                'email_verified_at' => Carbon::now()
            ],
            [
                'name' => 'Steering Committee',
                'role' => 'ADMIN',
                'email' => 'neo.sc',
                'password' => Hash::make('neoSC123'),
                'email_verified_at' => Carbon::now()
            ],
            [
                'name' => 'Debate Division',
                'role' => 'ADMIN',
                'email' => 'neo.debate',
                'password' => Hash::make('neoDB123'),
                'email_verified_at' => Carbon::now()
            ],
            [
                'name' => 'Newscasting Division',
                'role' => 'ADMIN',
                'email' => 'neo.newscasting',
                'password' => Hash::make('neoNC123'),
                'email_verified_at' => Carbon::now()
            ],
            [
                'name' => 'SSW Division',
                'role' => 'ADMIN',
                'email' => 'neo.ssw',
                'password' => Hash::make('neoSSW123'),
                'email_verified_at' => Carbon::now()
            ],
            [
                'name' => 'Speech Division',
                'role' => 'ADMIN',
                'email' => 'neo.speech',
                'password' => Hash::make('neoSP123'),
                'email_verified_at' => Carbon::now()
            ],
            [
                'name' => 'Vincent Febrien',
                'role' => 'USER',
                'email' => 'okulafebrian@gmail.com',
                'password' => Hash::make('abc12345'),
                'email_verified_at' => Carbon::now()
            ]
        ]);
    }
}
