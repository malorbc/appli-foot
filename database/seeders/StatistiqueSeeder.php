<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatistiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statistiques')->insert(
            [
                'user_id' => 1,
                'date' => '2021-04-10T08:0000',
                'type' => 1,
                'value' => rand(5, 15)
            ],
            [
                'user_id' => 1,
                'date' => '2021-05-10T08:0000',
                'type' => 1,
                'value' => rand(5, 15)
            ],
            [
                'user_id' => 1,
                'date' => '2021-06-10T08:0000',
                'type' => 1,
                'value' => rand(5, 15)
            ],
            [
                'user_id' => 1,
                'date' => '2021-07-10T08:0000',
                'type' => 1,
                'value' => rand(5, 15)
            ]
        );
    }
}
