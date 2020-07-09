<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];


    public function Todo(){
        return $this->belongsTo(\App\Todo::class);
    }

       public function Notes(){
        return $this->hasMany(\App\Note::class);
    }
}
