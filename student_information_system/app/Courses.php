<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = "courses";
    public function programs(){
        return $this->belongsTo(Programs::class);
    }

    public function crossfaculity(){
        return $this->hasMany(CrossFaculity::class);
    }

    public function profile(){
        return $this->belongsTo(StudentProfile::class);
    }

    public function sessions(){
        return $this->belongsTo(Session::class);
    }

    public function fees(){
        return $this->hasMany(Fee::class);
    }

    

}
