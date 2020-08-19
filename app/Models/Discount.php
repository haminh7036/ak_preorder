<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    //
    protected $fillable = [
        'did'
    ];
    protected $primaryKey = 'did';
    public function discountVal(){
        return $this->hasOne(LandingPage::class);
    }

    protected $table = 'eso_shops_discounts';
    protected $connection = 'mysql2';
}
