<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\UploadFilesTrait;
use App\Http\Requests\Back\Products\Store;
use App\Http\Requests\Back\Products\Update;
use App\Model\Brands;
use App\Model\Categories;
use App\Model\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use File;
use Validator;

class ProductsController extends Controller
{

    use UploadFilesTrait;

    /**
     * Get all Products
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Products::orderBy('products.id', 'DESC')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'brands.title as brand')
            ->paginate(10);

        return view('admin.products.index', ['products' => $products]);
    }


    /**
     * View Page add new Product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // Get all Categories
        $categories = Categories::get();
        // Get all Brands
        $brands = Brands::get();

        return view('admin.products.create', ['categories' => $categories, 'brands' => $brands]);
    }


    /**
     * Store Product in DB
     * @param Store $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Store $request)
    {
        // convert title to lower case and replace spaces to dash mark
        $slug = str_replace(" ", '-', strtolower($request->input('title')));

        $data = $request->all();
        // push slug in data array
        $data['slug'] = $slug;
        // Upload image
        $data['image'] = UploadFilesTrait::storeFile($request->file('image'), 'products', 'image');

        // Store Data
        Products::create($data);

        Session::flash('success', 'Product Added Successfully');
        return redirect('admin/products');
    }


    /**
     * View page Details Product
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        // Get data Product
        $product = Products::where('products.id', $id)
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'brands.title as brand', 'categories.title as category')
            ->first();

        // if not get data
        if(!$product)
            abort(503);

        return view('admin.products.view', ['product' => $product]);
    }

    /**
     * View page edit Product
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        // Get data Product
        $product = Products::find($id);
        // if not get data
        if(!$product)
            abort(503);

        // Get all Categories
        $categories = Categories::get();
        // Get all Brands
        $brands = Brands::get();
        return view('admin.products.edit', ['product' => $product, 'categories' => $categories, 'brands' => $brands]);
    }


    /**
     * Update Product in DB
     * @param Update $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Update $request, $id)
    {
        // Get data Product
        $product = Products::find($id);
        // if not get data
        if(!$product)
            abort(503);

        // convert title to lower case and replace spaces to dash mark
        $slug = str_replace(" ", '-', strtolower($request->input('title')));
        $data = $request->all();
        // push slug in data array
        $data['slug'] = $slug;
        // Upload image
        $data['image'] = UploadFilesTrait::updateFile($request->file('image'), 'products', 'image', $product->image);

        // Update Data
        $product->update($data);

        Session::flash('success', 'Product Updated Successfully');
        return redirect('admin/products');
    }


    /**
     * Delete Product from DB
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        // Get data Product
        $product = Products::find($id);
        // if not get data
        if(!$product)
            abort(503);

        File::Delete('images/products/'.$product->image);
        // Delete Brand
        $product->delete();

        Session::flash('success', 'Product Deleted Successfully');
        return redirect('admin/products');
    }


    /**
     * Get all brands related to category
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getBrands(Request $request)
    {
        if($request->ajax()) {

            // validation data Grade
            $validator = Validator::make($request->all(), [
                'category' => 'required|numeric',
            ]);

            // if get errors validations
            if ($validator->fails()) {
                return response(['status' => false, 'message' => $validator->errors()]);

            } else {

                // Get Category by ID
                $category = Categories::find($request->input('category'));
                // if Category return true
                if($category) {
                    // get Brands related to city id
                    $brands = Brands::where('category_id',  $category->id)
                        ->select('brands.id as brand_id', 'brands.title as brand')
                        ->get();

                    return response(['status' => true, 'brands' => $brands]);
                } else {

                    return response(['status' => false]);
                }
            }
        }

    }


}
