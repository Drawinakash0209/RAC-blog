<?php

namespace Database\Factories;

use App\Models\Avenue;
use App\Models\Director;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Director>
 */
class DirectorFactory extends Factory
{
    protected $model = Director::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'title' => null,
            'image' => 'directors/'.fake()->uuid().'.jpg',
            'about' => fake()->paragraph(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'linkedin' => '',
            'avenue_id' => Avenue::factory(),
            'sort_order' => 0,
        ];
    }
}
