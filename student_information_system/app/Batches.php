<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batches extends Model
{
    public function programs(){
        return $this->belongsToMany(Programs::class);
    }
}
