<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(app()->isProduction()) {
            return;
        }

        \App\Models\User::factory(10)->create();
        \App\Models\Author::factory(5)->create();
        \App\Models\Genre::factory(5)->create();
        \App\Models\Book::factory(20)->create();
        \App\Models\BorrowRecord::factory(50)->create();
    }
}
