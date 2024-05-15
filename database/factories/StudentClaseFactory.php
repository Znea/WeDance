<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Clase;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentClase>
 */
class StudentClaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $clases = Clase::pluck('id')->toArray();
        $students = User::where('rol', 'alumno')->pluck('id')->toArray();

        return [
            'clase_id' => fake()->randomElement($clases),
            'user_id' => fake()->randomElement($students),
        ];
    }
}
