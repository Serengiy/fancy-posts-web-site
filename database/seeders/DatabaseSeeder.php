<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Post::factory(15)
            ->has(Comment::factory(rand(1,5)))
            ->has(Like::factory(rand(3,7))->for(User::factory()))
            ->create();


        echo 'admin: ' . User::query()->where('role', 0)->first()->email
            . "\n"
            . 'editor: ' . User::query()->where('role', 1)->first()->email
            . "\n"
            . 'regular user: ' . User::query()->where('role', 2)->first()->email
            . "\n";

    }
}
