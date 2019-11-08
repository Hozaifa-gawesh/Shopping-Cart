<?php

namespace App\Http\Controllers\Back;
use App\Http\Controllers\UploadFilesTrait;
use App\Model\About;
use App\Http\Requests\Back\About\Store;
use App\Http\Requests\Back\About\Update;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use File;
use Validator;
class AboutController extends Controller
{

    use UploadFilesTrait;

    /**
     * Get all Products
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // get about from db
        $about = About::first();

        return view('admin.about.index', ['about' => $about]);
    }

    /**
     * Update About Data in DB
     * @param Update $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Update $request)
    {
        // Get data about
        $about = About::first();
        // if not get admin data => return page not found
        if(!$about)
            abort(404);

        $data = $request->all();
        // Update image about
        $data['image'] = UploadFilesTrait::updateFile($request->file('image'), 'about', 'image', $about->image);

        $about->update($data);

        Session::flash('success', 'About Updated Successfully');
        return redirect('admin/about');
    }


}
