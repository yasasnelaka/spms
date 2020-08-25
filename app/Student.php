<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['admission_number','full_name','name_with_initials','dob','blood_group','religion','nationality',
        'address','transport_method','grade','class','user_id','guardian_name','grade_5_scholarship_marks','red_cross_participation',
        'guiding_participation','guardian_tp_number','gender',
        ];
    public $timestamps=false;

    public function users(){
        return $this->belongsTo(User::class);
    }
}
