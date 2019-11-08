<?php

namespace App\Http\Controllers\Front;

use App\Model\Brands;
use App\Model\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandsController extends Controller
{


    /**
     * Get all brands with pagination
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $brands = Brands::withCount('products')->paginate(9);
        return view('front.brands.index', ['brands' => $brands]);
    }


    /**
     * View details brand
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($slug)
    {
        // Get data brand by slug
        $brand = Brands::where('slug', $slug)->first();
        // if not get data
        if(!$brand)
            abort(404);

        // Get all products related to brand id with pagination
        $products = Products::where('brand_id', $brand->id)->paginate(9);
        return view('front.brands.view', ['brand' => $brand, 'products' => $products]);

    }

}
