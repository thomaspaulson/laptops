<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Brand extends Model
{
    //

    protected $fillable = [
        'title'        
    ];

    use SoftDeletes;    

}
