<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'schedule',
        'image',
        'description',
        'user_id',
    ];

    public function teacher(){
        return $this->belongsTo('App\Models\User');
    }
    public function students(){
        return $this->belongsToMany('App\Models\User','student_clase');
    }
}
