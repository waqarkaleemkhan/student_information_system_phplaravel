<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentFee extends Model
{
    protected $table = 'student_fees';
    protected $fillable = [
        'id','name','reg','doj','total_fee','paid','remain'
        ];

        public function profiles(){
            return $this->belongsTo(Profiles::class);
        }
}
