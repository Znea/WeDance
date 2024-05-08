<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Clase;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create()->each(function ($user) {
            $user->teacher()->save(Teacher::factory()->make());
        });
        Category::factory(5)->create();
        Clase::factory(4)->create();
        User::factory(5)->create()->each(function ($user) {
            $user->student()->save(Student::factory()->make());
        });

    }
}
