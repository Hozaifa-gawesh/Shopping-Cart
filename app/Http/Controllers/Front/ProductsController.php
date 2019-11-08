<?php

namespace App\Http\Controllers\Front;

use App\Model\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{

    /**
     * Get all products with pagination
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Products::join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'brands.title as brand', 'brands.slug as brand_slug')
            ->inRandomOrder()
            ->paginate(9);

        return view('front.products.index', ['products' => $products]);
    }


    /**
     * View details product
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($slug)
    {
        // Get data product
        $product = Products::where('products.slug', $slug)
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'brands.title as brand', 'brands.slug as brand_slug')
            ->first();
        // if not get data
        if(!$product)
            abort(404);

        // Similar products
        $products = Products::where('products.category_id', $product->category_id)
            ->where('products.id', '!=', $product->id)
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'brands.title as brand', 'brands.slug as brand_slug')
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('front.products.view', ['product' => $product, 'products' => $products]);
    }

}
