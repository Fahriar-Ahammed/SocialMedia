<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostComment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostCommentFactory extends Factory
{
    protected $model = PostComment::class;

    public function definition(): array
    {
        return [
            'post_id' => Post::get()->random()->id,
            'user_id' => User::get()->random()->id,
            'comment' => fake()->paragraph(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
