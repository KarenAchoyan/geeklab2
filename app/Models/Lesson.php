<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    function group(){
        return $this->belongsTo('App\Models\Group');
    }
    function homework(){
        return $this->hasMany('App\Models\Homework');
    }
}
