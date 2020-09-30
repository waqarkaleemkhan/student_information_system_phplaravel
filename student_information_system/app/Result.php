<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public function course_regs(){
        return $this->belongsToMany(CourseReg::class);
    }
}
