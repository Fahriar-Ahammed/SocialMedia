<?php

namespace Database\Factories;

use App\Models\PostPhotos;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostPhotosFactory extends Factory
{
    protected $model = PostPhotos::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
