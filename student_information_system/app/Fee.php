<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $table = 'fees';
    
    protected $fillable = [
        'ch_fee','reg_fee','others','session_name'
    ];
}
