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
                'price' => 350000,
                'quota' => 30,
                'promo_price' => 250000,
                'promo_quota' => 10,
                'logo' => 'Debate_Open Category.png',
                'link_group' => null,
                'content' => null,
                'ebooklet' => null,
                'promotion_id' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Newscasting',
                'category' => 'Open Category',
                'category_init' => 'OC',
                'price' => 250000,
                'quota' => 30,
                'promo_price' => 150000,
                'promo_quota' => 10,
                'logo' => 'Newscasting_Open Category.png',
                'link_group' => null,
                'content' => null,
                'ebooklet' => null,
                'promotion_id' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Short Story Writing',
                'category' => 'Open Category',
                'category_init' => 'OC',
                'price' => 250000,
                'quota' => 30,
                'promo_price' => 150000,
                'promo_quota' => 10,
                'logo' => 'Short Story Writing_Open Category.png',
                'link_group' => null,
                'content' => null,
                'ebooklet' => null,
                'promotion_id' => null,
                'is_active' => 1
            ],
            [
                'name' => 'Speech',
                'category' => 'Junior High School',
                'category_init' => 'JHS',
                'price' => 250000,
                'quota' => 30,
                'promo_price' => 150000,
                'promo_quota' => 10,
                'logo' => 'Speech_Junior High School.png',
                'link_group' => null,
                'content' => null,
                'ebooklet' => null,
                'promotion_id' => null,
                'is_active' => 1
            ],
            [
                'name' => 'Speech',
                'category' => 'Open Category',
                'category_init' => 'OC',
                'price' => 250000,
                'quota' => 30,
                'promo_price' => 150000,
                'promo_quota' => 10,
                'logo' => 'Speech_Open Category.png',
                'link_group' => null,
                'content' => null,
                'ebooklet' => null,
                'promotion_id' => null,
                'is_active' => 1
            ]
        ]);
    }
}
