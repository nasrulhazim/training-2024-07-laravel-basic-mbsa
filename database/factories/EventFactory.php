<?php

namespace Database\Factories;

use App\Models\Venue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence,
            'description' => fake()->paragraph,
            'venue_id' => Venue::factory(),
            'start_time' => fake()->dateTimeBetween('+1 days', '+1 months'),
            'end_time' => fake()->dateTimeBetween('+1 days', '+1 months'),
        ];
    }
}
