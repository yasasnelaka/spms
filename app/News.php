<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['topic','description','picture',
    ];
    public $timestamps=false;
}
