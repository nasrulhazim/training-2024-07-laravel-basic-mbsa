<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        app()->isProduction()
            ? $this->seedProduction()
            : $this->seedDevelopment();

    }

    public function seedDevelopment()
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(PostSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(EventSeeder::class);
    }

    private function seedProduction()
    {

    }
}
