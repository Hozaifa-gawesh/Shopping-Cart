<?php

namespace App\Http\Controllers\Front;

use App\Model\Brands;
use App\Model\Categories;
use App\Model\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{

    /**
     * // Get all categories with pagination
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Categories::paginate(9);
        return view('front.categories.index', ['categories' => $categories]);
    }


    /**
     * View details category
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($slug)
    {
        // Get data Category by slug
        $category = Categories::where('slug', $slug)->first();
        // if not get data
        if(!$category)
            abort(404);

        // Get all brands ids from related products to category id
        $brands_id = Products::where('category_id', $category->id)
            ->get()
            ->pluck('brand_id')
            ->toArray();

        // Get brands by ids
        $brands = Brands::whereIn('id', $brands_id)->orderBy('id', 'DESC')->withCount('products')->paginate(9);
        return view('front.categories.view', ['category' => $category, 'brands' => $brands]);
    }

}
