<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table = 'brands';

    protected $fillable = ['title', 'image', 'slug'];


    public function products()
    {
        return $this->hasMany('App\Model\Products', 'brand_id');
    }
}
