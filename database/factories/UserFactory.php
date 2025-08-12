<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->name();
        $hiring_date = Carbon::now()
            ->subYears(rand(5, 10))
            ->subMonths(rand(0, 11))
            ->subDays(rand(0, 30));
        $department = $this->getProvidedAttr('department') ?? 'IT';
        $is_manager = $this->getProvidedAttr('is_manager') ?? false;
        return [
            'name' => $name,
            'is_manager' => $is_manager,
            'department' => $department,
            'email_display_name' => $name . ' (' . $department . ')',
            'hiring_date' => $hiring_date,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }
    protected function getProvidedAttr($attr)
    {
        // Проверяем, был ли department передан в атрибутах
        return $this->attributes[$attr] ?? null;
    }
    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
