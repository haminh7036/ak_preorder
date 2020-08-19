<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlideImage extends Model
{
    protected $fillable = [
        'images','landing_page_id'
    ];
    public function landingPageViaImages(){
        return $this->belongsTo(LandingPage::class,'landing_page_id');
    }
    protected $table = 'slide_images';


}
