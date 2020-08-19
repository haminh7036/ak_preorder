<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //


    public function discount(){
        return $this->belongsTo(Discount::class,'product');
    }
    protected $table = 'eso_shops_rows';
    protected $connection = 'mysql2';
}
