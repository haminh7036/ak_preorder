<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'eso_shops_location';
    protected $connection = 'mysql2';
}
