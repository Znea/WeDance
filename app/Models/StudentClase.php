<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClase extends Model
{
    use HasFactory;

    protected $table = 'student_clase';

    protected $fillable = [
        'clase_id', 
        'user_id'
    ];
}
