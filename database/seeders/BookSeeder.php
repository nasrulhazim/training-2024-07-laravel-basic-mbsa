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

        \App\Models\User::factory(rand(10, 25))->create();
        \App\Models\Author::factory(rand(5, 20))->create();
        \App\Models\Genre::factory(rand(5, 10))->create();
        \App\Models\Book::factory(rand(20, 200))->create();
        \App\Models\BorrowRecord::factory(rand(50, 100))->create();
    }
}
