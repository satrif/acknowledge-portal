<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SpasiboItem>
 */
class SpasiboItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'a_type' => fake()->randomElement(['s', 'v', 'n']),
            'name' => fake()->sentence(3),
            'description' => fake()->sentence(4),
            'active' => fake()->boolean(100),
            'name_en' => fake()->sentence(3),
            'description_en' => fake()->sentence(4),
            'questions' => fake()->paragraphs(6, true),
            'questions_en' => fake()->paragraphs(6, true),
        ];
    }
}
