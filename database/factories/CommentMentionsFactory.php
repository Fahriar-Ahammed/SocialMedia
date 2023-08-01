<?php

namespace Database\Factories;

use App\Models\CommentMentions;
use App\Models\PostComment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CommentMentionsFactory extends Factory
{
    protected $model = CommentMentions::class;

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
