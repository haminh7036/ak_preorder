<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{

    protected $fillable = [
        'big_banner','discount_id'
    ];

    public function images(){
        return $this->hasMany(SlideImage::class);
    }

    public function videos(){
        return $this->hasMany(LinkVideo::class);
    }

    public function discount(){
        return $this->belongsTo(Discount::class,'did');
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

}
