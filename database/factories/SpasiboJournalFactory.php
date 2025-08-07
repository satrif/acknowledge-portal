<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SpasiboJournal>
 */
class SpasiboJournalFactory extends Factory
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
            'uid_send' => fake()->optional(0.5)->randomDigitNotZero(),
            'uid_to' => fake()->randomDigitNotZero(),
            'date_send' => fake()->dateTime(),
//            'active' => fake()->boolean(100),
            'v_id' => fake()->randomDigitNotZero(),
            'n_id' => fake()->optional(0.1)->randomDigitNotZero(),
            'description' => fake()->sentence(4),
            'nom_description' => fake()->optional(0,1)->sentence(4),
        ];
    }
}
