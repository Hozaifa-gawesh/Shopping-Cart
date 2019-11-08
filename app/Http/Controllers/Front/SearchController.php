<?php

namespace App\Http\Controllers\Front;

use App\Model\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{


    /**
     * Search Products
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Products::where('products.title', 'LIKE', '%' . $search . '%')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'brands.title as brand', 'brands.slug as brand_slug')
            ->paginate(9);

        return view('front.search.index', ['products' => $products, 'search' => $search]);
    }

}
