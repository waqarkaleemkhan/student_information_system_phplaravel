<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{

    public function departments(){
        return $this->belongsTo(Departments::class);
    }

    public function batches(){
        return $this->belongsToMany(Batches::class);
    }

    public function courses(){
        return $this->hasMany(Courses::class);
    }

    public function semester(){
        return $this->hasOne(Semester::class);
    }

}
