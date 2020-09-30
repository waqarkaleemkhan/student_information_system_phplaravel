<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseReg extends Model
{
    protected $fillable = ['course_title', 'code', 'cr_hrs', 'stud_id','session_name'];

    public function results(){
        return $this->hasMany(Result::class);
    }
}
