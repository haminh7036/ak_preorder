<?php

namespace App\Models\PreOrder;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class PreorderImage extends Model
{
    use Sluggable;

    protected $fillable =[ 'Images'];

    public function Product()
    {
        return $this->belongsToMany(PreorderProduct::class);
    }
    public function sluggable(){
        return [
            'Images' => [
                'source' => 'Images'
            ]
        ];
    }
}
