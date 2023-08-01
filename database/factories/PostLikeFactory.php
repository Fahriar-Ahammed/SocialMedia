<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostLike;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostLikeFactory extends Factory
{
    protected $model = PostLike::class;

    public function definition(): array
    {
        return [
            'user_id' => User::get()->random()->id,
            'post_id' => Post::get()->random()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
