<?php

namespace App\Models\PreOrder;

use Illuminate\Database\Eloquent\Model;

class PreorderPage extends Model
{

    protected $fillable =[ 'name_page' , 'bodyhtml' , 'iframe'];

    public function Product(){
        return $this->hasMany(PreorderProduct::class);
    }

}
