<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    use HasFactory;
    function lesson(){
        return $this->belongsTo('App\Models\Lesson');
    }

}
