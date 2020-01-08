<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Processor extends Model
{
    //

    protected $fillable = [
        'title'        
    ];

    use SoftDeletes;    

}
