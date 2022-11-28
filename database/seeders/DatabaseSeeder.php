<?php

namespace Database\Seeders;

use App\Models\Competition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use LevelSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CompetitionSeeder::class,
            PaymentProviderSeeder::class,
            EnvironmentSeeder::class,
            RoundSeeder::class,
            AccessSeeder::class,
        ]);
    }
}
