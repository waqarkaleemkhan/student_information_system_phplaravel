<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseStatus extends Model
{
    protected $table = 'course_statuses';
    public function courses(){
        return $this->belongsToMany(Courses::class);
    }

    
}
