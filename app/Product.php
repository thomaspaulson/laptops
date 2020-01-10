<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    //

    protected $fillable = [
        'title',
        'image',
        'price',
        'screen',
        'brand_id',
        'processor_id',
        'touchable',
        'available',
    ];

    use SoftDeletes;    

    public function brand(){
        return $this->belongsTo('App\Brand');
    }

    public function processor(){
        return $this->belongsTo('App\Processor');
    }

}
