<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CommentLike;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\PostLike;
use App\Models\PostPhotos;
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
        Post::factory(20)->create();
        PostPhotos::factory(20)->create();
        PostComment::factory(20)->create();
        PostLike::factory(20)->create();
        CommentLike::factory(20)->create();
    }
}
