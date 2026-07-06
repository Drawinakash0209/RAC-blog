<?php

namespace Database\Factories;

use App\Models\Avenue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Avenue>
 */
class AvenueFactory extends Factory
{
    protected $model = Avenue::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->company(),
            'slug' => null,
            'logo' => 'avenues/'.fake()->uuid().'.png',
            'description' => fake()->paragraph(),
            'cover_image' => 'avenue_cover/'.fake()->uuid().'.png',
        ];
    }
}
