<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\UploadFilesTrait;
use App\Http\Requests\Back\Brands\Store;
use App\Http\Requests\Back\Brands\Update;
use App\Http\Requests\BrandsRequest;
use App\Model\Brands;
use App\Model\Categories;
use App\Model\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use File;

class BrandsController extends Controller
{

    use UploadFilesTrait;

    /**
     * Get all Brands
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $brands = Brands::withCount('products')->paginate(9);

        return view('admin.brands.index', ['brands' => $brands]);
    }


    /**
     * View Page add new Brand
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.brands.create');
    }


    /**
     * Store Brand in DB
     * @param Store $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Store $request)
    {
        $data = $request->all();
        // convert title to lower case and replace spaces to dash mark
        $slug = str_replace(" ", '-', strtolower($request->input('title')));
        $data['slug'] = $slug;
        // Upload image
        $data['image'] = UploadFilesTrait::storeFile($request->file('image'), 'brands', 'image');

        // Store Data
        Brands::create($data);

        Session::flash('success', 'Brand Added Successfully');
        return redirect('admin/brands');
    }


    /**
     * View details brand
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        // Get data Brand
        $brand = Brands::find($id);
        // if not get data
        if(!$brand)
            abort(503);

        $products = Products::where('brand_id', $brand->id)->paginate(9);

        return view('admin.brands.view', ['brand' => $brand, 'products' => $products]);
    }


    /**
     * View page edit brand
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        // Get data Brand
        $brand = Brands::find($id);
        // if not get data
        if(!$brand)
            abort(503);

        return view('admin.brands.edit', ['brand' => $brand]);
    }


    /**
     * Update Brand in DB
     * @param Update $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Update $request, $id)
    {
        // Get data Brand
        $brand = Brands::find($id);
        // if not get data
        if(!$brand)
            abort(503);

        $data = $request->all();
        // convert title to lower case and replace spaces to dash mark
        $slug = str_replace(" ", '-', strtolower($request->input('title')));
        $data['slug'] = $slug;

        // Upload image
        $data['image'] = UploadFilesTrait::updateFile($request->file('image'), 'brands', 'image', $brand->image);

        // Update Data
        $brand->update($data);

        Session::flash('success', 'Brand Updated Successfully');
        return redirect('admin/brands');
    }


    /**
     * Delete Brand from DB
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        // Get data Brand
        $brand = Brands::find($id);
        // if not get data
        if(!$brand)
            abort(503);

        File::Delete('images/brands/'.$brand->image);
        // Delete Brand
        $brand->delete();

        Session::flash('success', 'Brand Deleted Successfully');
        return redirect('admin/brands');
    }
    
}
