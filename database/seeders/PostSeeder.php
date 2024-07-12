<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(app()->isProduction()) {
            return;
        }

        \App\Models\User::factory(10)->create()->each(function ($user) {
            $user->posts()->saveMany(\App\Models\Post::factory(5)->make())->each(function ($post) {
                $post->comments()->saveMany(\App\Models\Comment::factory(3)->make());
            });
        });

        \App\Models\Category::factory(5)->create();
    }
}
