<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    public function programs(){
        return $this->hasMany(Programs::class);
    }
    
}
