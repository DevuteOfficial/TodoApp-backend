<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $guarded = [];

    public function Task(){
        return $this->belongsTo(\App\Task::class);
    }
}
