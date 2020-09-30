<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    public function courses(){
            return $this->hasMany(Courses::class);
    } 
    
}
