<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::insert([
            [
                'id' => Str::uuid(),
                'title' => 'Evenement 1',
                'start' => '2021-04-10T08:0000',
                'end' => null
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Evenement 2',
                'start' => '2021-09-17T08:0000',
                'end' => '2021-09-17T09:3000'
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Evenement 3',
                'start' => '2021-09-19T08:0000',
                'end' => '2021-09-17T09:3000'
            ]
        ]);
    }
}
