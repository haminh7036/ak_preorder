<?php

namespace App\Models\PreOrder;

use Illuminate\Database\Eloquent\Model;

class PreorderPage extends Model
{

    protected $fillable =[ 'name_page' , 'bodyhtml' , 'iframe', 'title1', 'title2', 'title3', 'title4', 'big_banner'];

    public function Product(){
        return $this->hasMany(PreorderProduct::class);
    }

}
