<?php

namespace App\Http\Controllers\Front;

use App\Model\Categories;
use App\Model\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index()
    {
        // Get latest 6 products
        $products = Products::join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'brands.title as brand', 'brands.slug as brand_slug')
            ->inRandomOrder()
            ->limit(6)
            ->get();

        return view('front.index', [
            'products' => $products
        ]);
    }

}
