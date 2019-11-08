<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    protected $table = 'districts';

    protected $fillable = ['title', 'city_id'];
}
