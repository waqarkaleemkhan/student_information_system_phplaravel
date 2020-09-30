<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Profiles extends Authenticatable
{
    use Notifiable;
    
       protected $table = 'profiles';
    
       /**
        * The attributes that are mass assignable.
        *
        * @var array
        */
       protected $fillable = [
           'image','name','father_name','email','dob','gender','nationality','cnic','domicile','reg','faculity','department','program','batch','semester','address','city','phone', 'password','remember_token','image_size'
       ];

       protected $hidden = [
        'password', 'remember_token','image_size'
    ];


}
