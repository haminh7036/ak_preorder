<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interviewer extends Model
{
    protected $fillable = [
        'name','address','avatar','content'
    ];

    protected $table = 'interviewers';
}
