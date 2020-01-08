<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Price extends Model
{
    //

    protected $fillable = [
        'min',
        'max'
    ];

    use SoftDeletes;    

}
