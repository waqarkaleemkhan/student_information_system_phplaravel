<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeightResult extends Model
{
    public function results(){
        return $this->belongsTo(Result::class);
    }
}
