<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    public function programs(){
        return $this->belongsTo(Programs::class);
    }
}
