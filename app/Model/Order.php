<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['user_id', 'first_name', 'last_name', 'email', 'phone', 'total', 'address', 'status', 'cancel'];


    public function details()
    {
        return $this->hasMany('App\Model\OrderDetails', 'order_id', 'id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->select('order_details.*', 'products.title', 'products.image', 'products.price_discount');
    }

}
