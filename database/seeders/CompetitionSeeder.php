<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('competitions')->insert([
            [
                'name' => 'Debate',
                'category' => 'Team (2 persons)',
                'content' => 'Belom Ada',
                'ebooklet' => null,
                'early_price' => 1200,
                'early_quota' => 12,
                'normal_price' => 5000,
                'normal_quota' => 12,
            ],
            [
                'name' => 'Newscasting',
                'category' => 'Peson',
                'content' => 'Belom Ada',
                'ebooklet' => null,
                'early_price' => 1500,
                'early_quota' => 12,
                'normal_price' => 6000,
                'normal_quota' => 12,
            ],
            [
                'name' => 'Speech',
                'category' => 'Person',
                'content' => 'Belom Ada',
                'ebooklet' => null,
                'early_price' => 1000,
                'early_quota' => 12,
                'normal_price' => 4000,
                'normal_quota' => 12,
            ],
            [
                'name' => 'Short Story Writing',
                'category' => 'Person',
                'content' => 'Belom Ada',
                'ebooklet' => null,
                'early_price' => 2100,
                'early_quota' => 12,
                'normal_price' => 7000,
                'normal_quota' => 12,
            ],
            [
                'name' => 'Podcast',
                'category' => 'Person',
                'content' => 'Belom Ada',
                'ebooklet' => null,
                'early_price' => 100,
                'early_quota' => 12,
                'normal_price' => 3100,
                'normal_quota' => 12,
            ],
        ]);
    }
}
