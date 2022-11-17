<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetitionSeeder extends Seeder
{
    public function run()
    {
        DB::table('competitions')->insert([
            [
                'name' => 'Debate',
                'category' => 'Open Category',
                'category_init' => 'OC',
                'normal_price' => 350000,
                'total_quota' => 30,
                'early_price' => 250000,
                'early_quota' => 10,
                'logo' => 'Debate_Open Category.png',
            ],
            [
                'name' => 'Newscasting',
                'category' => 'Open Category',
                'category_init' => 'OC',
                'normal_price' => 250000,
                'total_quota' => 30,
                'early_price' => 150000,
                'early_quota' => 10,
                'logo' => 'Newscasting_Open Category.png',
            ],
            [
                'name' => 'Short Story Writing',
                'category' => 'Open Category',
                'category_init' => 'OC',
                'normal_price' => 250000,
                'total_quota' => 30,
                'early_price' => 150000,
                'early_quota' => 10,
                'logo' => 'Short Story Writing_Open Category.png',
            ],
            [
                'name' => 'Speech',
                'category' => 'Junior High',
                'category_init' => 'JHS',
                'normal_price' => 250000,
                'total_quota' => 30,
                'early_price' => 150000,
                'early_quota' => 10,
                'logo' => 'Speech_Junior High.png',
            ],
            [
                'name' => 'Speech',
                'category' => 'Open Category',
                'category_init' => 'OC',
                'normal_price' => 250000,
                'total_quota' => 30,
                'early_price' => 150000,
                'early_quota' => 10,
                'logo' => 'Speech_Open Category.png',
            ]
        ]);
    }
}
