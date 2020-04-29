<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                'title' => 'Wake Up',
                'start' => '2020-04-28 06:00:00',
                'end' => '2020-04-29 06:00:00',
                'color' => '#c49233',
                'description' => 'You should to wake up earlier !'
            ],
            [
                'title' => 'Go to Bed',
                'start' => '2020-04-28 23:00:00',
                'end' => '2020-04-29 23:00:00',
                'color' => '#29fdf2',
                'description' => 'You should to sleep now!'
            ]
        ]);
    }
}
