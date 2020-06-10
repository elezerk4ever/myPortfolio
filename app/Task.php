<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function experience(){
        return $this->belongsTo(Experience::class);
    }
}
