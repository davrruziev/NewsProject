<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id'=>rand(1,5),
            'title_uz'=>fake()->sentence,
            'title_ru'=>fake()->sentence,
            'body_uz'=>fake()->text,
            'body_ru'=>fake()->text,
            'img'=>'/site/images/posts/bottom2.png',
            'view'=>rand(0,30),
             'is_spicial'=>rand(0,1),
        ];
    }
}
