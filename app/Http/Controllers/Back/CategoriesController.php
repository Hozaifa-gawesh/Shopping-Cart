<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\UploadFilesTrait;
use App\Http\Requests\Back\Categories\Store;
use App\Http\Requests\Back\Categories\Update;
use App\Model\Brands;
use App\Model\Categories;
use App\Model\Products;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use File;

class CategoriesController extends Controller
{

    use UploadFilesTrait;

    /**
     * Get all Categories
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Categories::orderBy('id', 'DESC')->paginate(10);

        return view('admin.categories.index', ['categories' => $categories]);
    }


    /**
     * View Page add new category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.categories.create');
    }


    /**
     * Store Category in DB
     * @param Store $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Store $request)
    {

        // convert title to lower case and replace spaces to dash mark
        $slug = str_replace(" ", '-', strtolower($request->input('title')));

        $data = $request->all();
        $data['slug'] = $slug;
        // Upload image
        $data['image'] = UploadFilesTrait::storeFile($request->file('image'), 'categories', 'image');

        // Store Data
        Categories::create($data);

        Session::flash('success', 'Category Added Successfully');
        return redirect('admin/categories');
    }


    /**
     * View Details Category
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        // Get data Category
        $category = Categories::find($id);
        // if not get data
        if(!$category)
            abort(503);

        $brands_id = Products::where('category_id', $category->id)
            ->get()
            ->pluck('brand_id')
            ->toArray();

        $brands = Brands::whereIn('id', $brands_id)->withCount('products')->paginate(9);

        return view('admin.categories.view', ['category' => $category, 'brands' => $brands]);
    }


    /**
     * View page edit category
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        // Get data Category
        $category = Categories::find($id);
        // if not get data
        if(!$category)
            abort(503);

        return view('admin.categories.edit', ['category' => $category]);
    }


    /**
     * Update Category in DB
     * @param Update $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Update $request, $id)
    {
        // Get data Category
        $category = Categories::find($id);
        // if not get data
        if(!$category)
            abort(503);

        // convert title to lower case and replace spaces to dash mark
        $slug = str_replace(" ", '-', strtolower($request->input('title')));

        $data = $request->all();
        $data['slug'] = $slug;
        // Upload image
        $data['image'] = UploadFilesTrait::updateFile($request->file('image'), 'categories', 'image', $category->image);

        // Store Data
        $category->update($data);

        Session::flash('success', 'Category Updated Successfully');
        return redirect('admin/categories');
    }


    /**
     * Delete Category from DB
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        // Get data Category
        $category = Categories::find($id);
        // if not get data
        if(!$category)
            abort(503);

        File::Delete('images/categories/'.$category->image);
        // Delete Category
        $category->delete();

        Session::flash('success', 'Category Deleted Successfully');
        return redirect('admin/categories');
    }

}
