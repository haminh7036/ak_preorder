<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkVideo extends Model
{
    protected $fillable= [
        'url','landing_page_id'
    ];

    public function landingPageViaVideos(){
        return $this->belongsTo(LandingPage::class,'landing_page_id');
    }
}
