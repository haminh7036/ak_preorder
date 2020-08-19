<?php

namespace App\Models\PreOrder;

use Illuminate\Database\Eloquent\Model;

class PreorderOrder extends Model
{
    protected $fillable =[ 'Name' , 'Gender' , 'Phone_Number' , 'Other_request' , 'Address', 'Status', 'Gift', 'Payment', 'preorder_product_id'];

    public function Product()
    {
        return $this->belongsTo(PreorderProduct::class, 'preorder_product_id');
    }
}
