<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrossFaculity extends Model
{
    public function courses(){
        return $this->belongsToMany(Courses::class);
    }
}
