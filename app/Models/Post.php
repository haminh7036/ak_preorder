<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;
    protected $fillable = [
        'icon','title','content','img','position','landing_page_id'
    ];

    public function landingPageViaPost(){
        return $this->belongsTo(LandingPage::class,'landing_page_id');
    }

    public const TYPES = [
        'Thông tin'=> 1,
        'Banner 2'=>2,
        'Mang lại những gì'=>3,
        'Thông tin 2'=> 4,
    ];

    public function sluggable(){
        return [
            'img' => [
                'source' => 'title'
            ]
        ];
    }

}
