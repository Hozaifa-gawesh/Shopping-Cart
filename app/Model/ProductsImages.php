<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductsImages extends Model
{
    protected $table = 'products_images';

    protected $fillable = ['title', 'image', 'product_id'];
}
