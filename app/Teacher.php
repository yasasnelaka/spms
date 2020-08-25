<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['staff_id','full_name','name_with_initials','dob','tp_number','email',
        'address','user_id',
    ];
    public $timestamps=false;
}
