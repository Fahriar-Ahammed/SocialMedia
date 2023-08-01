<?php

namespace Database\Factories;

use App\Models\CommentLike;
use App\Models\PostComment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CommentLikeFactory extends Factory
{
    protected $model = CommentLike::class;

    public function definition(): array
    {
        return [
            'user_id' => User::get()->random()->id,
            'comment_id' => PostComment::get()->random()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
