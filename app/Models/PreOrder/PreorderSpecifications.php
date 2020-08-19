<?php

namespace App\Models\PreOrder;

use Illuminate\Database\Eloquent\Model;

class PreorderSpecifications extends Model
{
    protected $fillable =[ 'Material' , 'Face_diameter' , 'Type' , 'Frame','Case_diameter', 'Wire_Material', 'Wire_Width', 'Waterproof', 'Energy_Sources', 'Battery_life_time', 'User_Object', 'Trademark','preorder_product_id'];

    public function Product()
    {
        return $this->belongsTo(PreorderProduct::class);
    }
}
