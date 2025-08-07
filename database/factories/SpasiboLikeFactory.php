<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SpasiboLike>
 */
class SpasiboLikeFactory extends Factory
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
            'a_id' => fake()->randomDigitNotZero(),
            'uid_send' => fake()->randomDigitNotZero(),
            'date_send' => fake()->dateTime(),
        ];
    }
}
