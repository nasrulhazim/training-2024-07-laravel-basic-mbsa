<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(app()->isProduction()) {
            return;
        }

        \App\Models\User::factory(rand(10, 20))->create();
        \App\Models\Venue::factory(5)->create();
        \App\Models\Event::factory(rand(4, 48))->create();
        \App\Models\Attendee::factory(50)->create()->each(function ($attendee) {
            $events = \App\Models\Event::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $attendee->events()->attach($events);
        });
    }
}
