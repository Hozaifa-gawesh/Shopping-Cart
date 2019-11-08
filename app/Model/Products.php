<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = ['title', 'image', 'description', 'colors', 'size', 'price', 'discount', 'price_discount',
        'available', 'brand_id', 'category_id', 'slug'];


    public function cart()
    {
        return $this->hasOne('App\Model\Cart', 'product_id', 'id');
    }

}
