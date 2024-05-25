<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentClase extends Model
{
    use HasFactory,SoftDeletes ;

    protected $table = 'student_clase';

    protected $fillable = [
        'clase_id',
        'user_id'
    ];
}
