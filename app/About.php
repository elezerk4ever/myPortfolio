<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $guarded = [];

    //relations 
    public function user(){
        return $this->belongsTo(User::class);
    }
}
