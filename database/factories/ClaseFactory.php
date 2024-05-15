<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clase>
 */
class ClaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->randomElement(['Hip Hop', 'Popping', 'House', 'Breaking']);
        // Obtener las dos primeras letras del nombre seleccionado
        $code = strtoupper(substr($name, 0, 2));
        $teachers = User::where('rol', 'profesor')->pluck('id')->toArray();
        return [
            'code' => $code,
            'name' => $name,
            'description' => fake()->sentence(),
            'user_id' => fake()->randomElement($teachers),
            'schedule' =>  "Lunes a Viernes de 16:30 a 18:00"
        ];
    }
}
