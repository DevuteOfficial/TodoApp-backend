<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
  protected $guarded = [];

    public function User(){
        return $this->belongsTo(\App\User::class);
    }
    public function Tasks(){
        return $this->hasMany(\App\Task::class);
    }
}
