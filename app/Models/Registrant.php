<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registrant extends Model
{
    protected $fillable = [
        'name', 'email','phone','password'
    ];
    public function content(){
        return $this->hasOne(ChallengeContent::class);
    }
    protected $table = 'registrants';
}
