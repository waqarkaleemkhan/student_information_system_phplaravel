<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function profiles(){
        return $this->belongsToMany(Profiles::class);
    }
}
