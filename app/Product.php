<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function typeProduct()
    {
        return $this->belongsTo('App\Type_product','id_type','id');
    }

    public function billDetail()
    {
        return $this->hasMany('App\Bill_detail','id_product');
    }
}
