<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dni = '';
        for ($i = 0; $i < 8; $i++) {
            $dni .= mt_rand(0, 9); // Genera un número aleatorio del 0 al 9 y lo concatena al DNI
        }
        $name = fake()->firstName();

        return [
            'dni' => $dni.fake()->randomLetter(),
            'name' => $name,
            'lastname' => fake()->lastName(),
            'address' => fake()->address(),
            'phone' => fake()->phone(),
            'date_of_birth' => fake()->dateOfBirth(),
            'email' => $name.fake()->randomNumber(3).fake()->safeEmailDomain(),
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
