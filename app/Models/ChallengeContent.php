<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChallengeContent extends Model
{
    public function registrant(){
        return $this->belongsTo(Registrant::class);
    }
}
