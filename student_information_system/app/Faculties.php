<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculties extends Model
{
    public function departments(){
        return $this->belongsToMany(Departments::class,'faculty_departments');
    }
}
