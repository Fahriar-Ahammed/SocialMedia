<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostPhotos;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostPhotosFactory extends Factory
{
    protected $model = PostPhotos::class;

    public function definition(): array
    {
        return [
            'post_id' => Post::get()->random()->id,
            'photo_url' => fake()->imageUrl,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
