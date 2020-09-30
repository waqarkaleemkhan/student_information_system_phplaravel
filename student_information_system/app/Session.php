<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = "sessions";
    public function courses(){
        return $this->hasMany(Courses::class);
    }
}
