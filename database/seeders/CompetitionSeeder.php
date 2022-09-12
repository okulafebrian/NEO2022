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
                'category' => 'Open Category',
                'category_init' => 'OC',
                'content' => null,
                'ebooklet' => null,
                'early_price' => 350000,
                'early_quota' => 30,
                'normal_price' => 450000,
                'normal_quota' => 30,
                'link_group' => null,
            ],
            [
                'name' => 'Newscasting',
                'category' => 'Open Category',
                'category_init' => 'OC',
                'content' => null,
                'ebooklet' => null,
                'early_price' => 250000,
                'early_quota' => 30,
                'normal_price' => 350000,
                'normal_quota' => 30,
                'link_group' => null,
            ],
            [
                'name' => 'Speech',
                'category' => 'Junior High School',
                'category_init' => 'JHS',
                'content' => null,
                'ebooklet' => null,
                'early_price' => 250000,
                'early_quota' => 30,
                'normal_price' => 350000,
                'normal_quota' => 30,
                'link_group' => null,
            ],
            [
                'name' => 'Speech',
                'category' => 'Open Category',
                'category_init' => 'OC',
                'content' => null,
                'ebooklet' => null,
                'early_price' => 250000,
                'early_quota' => 30,
                'normal_price' => 350000,
                'normal_quota' => 30,
                'link_group' => null,
            ],
            [
                'name' => 'Short Story Writing',
                'category' => 'Open Category',
                'category_init' => 'OC',
                'content' => null,
                'ebooklet' => null,
                'early_price' => 250000,
                'early_quota' => 30,
                'normal_price' => 350000,
                'normal_quota' => 30,
                'link_group' => null,
            ],
        ]);
    }
}
