<?php

namespace App\Models\PreOrder;

use Illuminate\Database\Eloquent\Model;

class PreorderProduct extends Model
{
    protected $fillable =[ 'Product_Name' , 'Product_Code' , 'Price' , 'Reduced_Price', 'Deposit' ,'Quantity', 'Gift', 'status','preorder_page_id'];

    public function Image()
    {
        return $this->belongsToMany(PreorderImage::class);
    }

    public function Specification(){
        return $this->hasOne(PreorderSpecifications::class);
    }

    public function Order(){
        return $this->hasMany(PreorderOrder::class);
    }
    public function Page(){
        return $this->belongsTo(PreorderPage::class);
    }

}
