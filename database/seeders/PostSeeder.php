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

        // create 10 users
        \App\Models\User::factory(rand(10, 25))->create()->each(function ($user) {
            // each user has 5 posts
            $user->posts()->saveMany(\App\Models\Post::factory(rand(5, 15))->make())->each(function ($post) {
                // each user's post has 3 comments.
                $post->comments()->saveMany(\App\Models\Comment::factory(rand(3, 25))->make());
            });
        });

        // create 5 categories
        \App\Models\Category::factory(5)->create();
    }
}
