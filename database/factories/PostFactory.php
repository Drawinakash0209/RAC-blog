<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category' => fake()->word(),
            'slug' => null,
            'title' => fake()->unique()->sentence(4),
            'description' => fake()->paragraphs(3, true),
            'coverimage' => 'uploads/'.fake()->uuid().'.png',
            'keywords' => fake()->words(3, true),
            'meta_title' => fake()->sentence(4),
            'meta_description' => fake()->sentence(10),
            'meta_keywords' => fake()->words(3, true),
        ];
    }
}
