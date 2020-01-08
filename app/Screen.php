<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Screen extends Model
{
    //

    protected $fillable = [
        'min',
        'max'
    ];

    use SoftDeletes;
    //

    

}
