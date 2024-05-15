<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Clase;
use App\Models\Teacher;
use App\Models\User;
use App\Models\StudentClase;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(5)->create();
        User::factory(10)->create(); 
        Clase::factory(4)->create();
        StudentClase::factory(10)->create();
    }
}
