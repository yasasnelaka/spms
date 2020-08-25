<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher_subject extends Model
{
    protected $fillable = ['subject_id ','teacher_id ','grade','class','staff_id'
    ];
    public $timestamps=false;
}
